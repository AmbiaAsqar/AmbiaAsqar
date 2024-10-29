<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pembelian;
use App\Models\Layanan;
use App\Models\LayananPpob;
use App\Http\Controllers\digiFlazzController;
use App\Http\Controllers\VipResellerController;
use App\Http\Controllers\ApiGamesController;
use App\Http\Controllers\JulyhyusController;
use App\Http\Controllers\iPaymuController;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccess;


class updatePesanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatePesanan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pesanan = Pembelian::Where('status', 'Processing')
                             ->orWhere('status', 'Proses')
                             ->get();

        $digiFlazz = new digiFlazzController;
        $vip = new VipResellerController;
        $apigames = new ApiGamesController;
        $july = new JulyhyusController;
        foreach($pesanan as $data)
        {
            $pembayaran = Pembayaran::where('order_id', $data->order_id)->first();

            if ($data->tipe_transaksi == "game") {
                $layanan = Layanan::where('layanan', $data->layanan)->first();
            } else if ($data->tipe_transaksi == "pulsa") {
                $layanan = Layanan::where('layanan', $data->layanan)->first();
            }
            try{
                $providerId = $layanan->provider_id;
                $provider_order_id = $data->provider_order_id;
                $uid = $data->user_id;
                $zone = $data->zone;

                $provider_order_id = $data->provider_order_id;

                if($layanan->provider == "digiflazz"){
                    $checking = $digiFlazz->status($provider_order_id, $providerId, $uid, $zone);
                    $note = $checking['data']['sn'];
                    // Whatsapp
                    if ($checking['data']['status'] == "Menunggu" || $checking['data']['status'] == "success" || $checking['data']['status'] == "Sukses" || $checking['data']['status'] == "Pending") {
                        $pesan = "Pembelian *$data->layanan* x *$data->qty* Telah Berhasil Dikirim, Silahkan Cek Akun Anda, Terima kasih Sudah Order\n\n".
                        "Ket: *$note* \n\n".
                        "Jika Pesanan Anda Belum Masuk Harap Hubungi Admin\n".
                        "Whatsapp : ".env('NOMOR_ADMIN');
                    }
                }else if($layanan->provider == "apigames"){
                    $checking = json_decode($apigames->status($provider_order_id),true);
                }else if($layanan->provider == "vip"){
                    $checking = $vip->status($provider_order_id);
                    $checking['data']['status'] = $checking['data'][0]['status'];
                    $note = $checking['data']['note'] = $checking['data'][0]['note'];
                    $pesan = "Pembelian *$data->layanan* x *$data->qty* Telah Berhasil Dikirim, Silahkan Cek Akun Anda, Terima kasih Sudah Order\n\n".
                    "Ket: *$note* \n\n".
                    "Jika Pesanan Anda Belum Masuk Harap Hubungi Admin\n".
                    "Whatsapp : ".env('NOMOR_ADMIN');
                }
                // dd($checking['data']);
                $status_pembelian = '';
                $status_check = false;
                if ($checking['data']['status'] == "Menunggu" || $checking['data']['status'] == "success" || $checking['data']['status'] == "Sukses" || $checking['data']['status'] == "Pending") {
                    // dd($checking);
                    $status_check = true;
                    $status_pembelian = "Sukses";
                }else if($checking['data']['status'] == "Batal" || $checking['data']['status'] == "Error" || $checking['data']['status'] == "error" || $checking['data']['status'] == "Gagal"){
                    $status_check = true;
                    $status_pembelian = "Batal";
                }

                if($status_check){
                    if($status_pembelian == "Success"||"Sukses"){
                        if(date('Y-m-d',strtotime($data->created_at)) == date('Y-m-d')){
                            $requestPesan = $this->msg($pembayaran->no_pembeli,$pesan);
                        }
                        Pembelian::where('provider_order_id', $provider_order_id)
                            ->update(['status' => $status_pembelian]);
                        Pembelian::where('provider_order_id', $provider_order_id)
                            ->update(['note' => $note]);
                    }else{
                        Pembelian::where('provider_order_id', $provider_order_id)
                            ->update(['status' => $status_pembelian, 'log' => json_encode($checking)]);
                    }
                }
            }catch (\Exception $e){
                continue;
                // throw $e;
            }
        }
    }
    
    public function msg($nomor, $msg)
    {
        $api = \DB::table('setting_webs')->where('id',1)->first();
        
        $data = [
            'number'  => "$nomor",
            'message' => "$msg"
        ];
        
        // Whatsapp
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.fonnte.com/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('target' => "$nomor",'message' => "$msg"),
          CURLOPT_HTTPHEADER => array('Authorization: '.$api->wa_key),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }
     
}