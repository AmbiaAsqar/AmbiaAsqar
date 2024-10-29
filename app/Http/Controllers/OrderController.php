<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\Pembayaran;
use App\Models\Voucher;
use App\Models\Pembelian;
use App\Models\User;
use App\Models\Berita;
use App\Models\Method;
use Illuminate\Support\Str;
use App\Http\Controllers\digiFlazzController;
use App\Http\Controllers\VipResellerController;
use App\Http\Controllers\VipResellerGameController;
use App\Http\Controllers\ApiCheckController;
use App\Http\Controllers\ApiGamesController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\TriPayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function create(Kategori $kategori)
    {
        $data = Kategori::where('kode', $kategori->kode)->select('nama', 'sub_nama', 'server_id', 'thumbnail', 'id', 'kode', 'petunjuk','deskripsi_game','deskripsi_field','banner','tipe','placeholder_1','placeholder_2')->first();
        if($data == null) return back();
        
        if(Auth::check()){
            if(Auth::user()->role == "Member"){
                $layanan = Layanan::where('kategori_id', $data->id)->where('status', 'available')->select('id', 'harga_awal', 'product_logo', 'event', 'layanan', 'harga_member AS harga')->orderBy('harga', 'asc')->get();
            }else if(Auth::user()->role == "Platinum"){
                $layanan = Layanan::where('kategori_id', $data->id)->where('status', 'available')->select('id', 'product_logo', 'harga_awal', 'event', 'layanan', 'harga_platinum AS harga')->orderBy('harga', 'asc')->get();
            }else if(Auth::user()->role == "Gold" || Auth::user()->role == "Admin"){
                $layanan = Layanan::where('kategori_id', $data->id)->where('status', 'available')->select('id', 'product_logo', 'harga_awal', 'event', 'layanan', 'harga_gold AS harga')->orderBy('harga','asc')->get();
            }
        }else{
            $layanan = Layanan::where('kategori_id', $data->id)->where('status', 'available')->select('id', 'sisa',  'event','harga_awal', 'layanan','product_logo','harga')->orderBy('harga', 'asc')->get();
        }

        return view('template.order', [
            'title' => $data->nama,
            'kategori' => $data,
            'nominal' => $layanan,
            'harga' => $layanan,
            'pay_method' => \App\Models\Method::all()
        ]);
    }

    public function price(Request $request)
    {
        $qty = $request->qty;
        if(Auth::check()){
            if(Auth::user()->role == "Member"){
                $data = Layanan::where('id', $request->nominal)->select('harga_member AS harga')->first();    
            }else if(Auth::user()->role == "Platinum"){
                $data = Layanan::where('id', $request->nominal)->select('harga_platinum AS harga')->first();
            }else if(Auth::user()->role == "Gold" || Auth::user()->role == "Admin"){
                $data = Layanan::where('id', $request->nominal)->select('harga_gold AS harga')->first();
            }
        }else{
            $data = Layanan::where('id', $request->nominal)->select('harga AS harga')->first();
        }  
        
        if(isset($request->voucher)){
            $voucher = Voucher::where('kode', $request->voucher)->first();
            
            if(!$voucher){
                $data->harga = $data->harga;
            }else{
                if($voucher->stock == 0){
                    $data->harga = $data->harga;
                }else{
                    $potongan = $data->harga * ($voucher->promo / 100);
                    if($potongan > $voucher->max_potongan){
                        $potongan = $voucher->max_potongan;
                    }

                    $data->harga = $data->harga - $potongan;
                }
            }
        }

        return response()->json([
            'status' => true,
            'harga' => "Rp. ".number_format(($data->harga) * $qty, 0, '.', ',')
        ]);
    }

    public function confirm(Request $request)
    {
        if($request->ktg_tipe !== 'joki'){
            $request->validate([
                'uid' => 'required',
                'service' => 'required|numeric',
                'payment_method' => 'required',
                'nomor' => 'required|numeric',
                'qty' => 'required|min:1|max:200|numeric'
            ]);
        }else{
            $request->validate([
                'email_joki' => 'required',
                'password_joki' => 'required',
                'loginvia_joki' => 'required',
                'nickname_joki' => 'required',
                'request_joki' => 'required',
                'catatan_joki' => 'required',
                'service' => 'required|numeric',
                'payment_method' => 'required',
                'nomor' => 'required|numeric'
            ]);
        }
        $item = Layanan::where('id',$request->service)->first();
        $produk = Kategori::where('id',$item->kategori_id)->first();

        $apicheck = new ApiCheckController();
            
        if(Auth::check()){
            if(Auth::user()->role == "Member"){
                $dataLayanan = Layanan::where('id', $request->service)->select('harga_member AS harga', 'kategori_id')->first();
            }else if(Auth::user()->role == "Platinum"){
                $dataLayanan = Layanan::where('id', $request->service)->select('harga_platinum AS harga', 'kategori_id')->first();
            }else if(Auth::user()->role == "Gold" || Auth::user()->role == "Admin"){
                $dataLayanan = Layanan::where('id', $request->service)->select('harga_gold AS harga', 'kategori_id')->first();
            }
        }else{
            $dataLayanan = Layanan::where('id', $request->service)->select('harga AS harga', 'kategori_id')->first();
        }
        
        if(isset($request->voucher)){
            $voucher = Voucher::where('kode', $request->voucher)->first();

            if(!$voucher){
                $dataLayanan->harga = $dataLayanan->harga;
            }else{
                if($voucher->stock == 0){
                    $dataLayanan->harga = $dataLayanan->harga;
                }else{
                    $potongan = $dataLayanan->harga * ($voucher->promo / 100);
                    if($potongan > $voucher->max_potongan){
                        $potongan = $voucher->max_potongan;
                    }
                    $dataLayanan->harga = $dataLayanan->harga - $potongan;
                }
            }
        }

        $dataKategori = Kategori::where('id', $dataLayanan->kategori_id)->select('kode')->first();

        $daftarGameValidasi = ['8-ball-pool', 'arena-of-valor', 'apex-legends', 'call-of-duty', 'dragon-city', 'free-fire', 'genshin-impact', 'higgs-domino', 'honkai-impact', 'lords-mobile', 'marvel-super-war', 'mobile-legend', 'mobile-legends', 'mobile-legends-adventure', 'point-blank', 'ragnarok-m', 'tom-jerry-chase', 'top-eleven'];

        if(in_array($dataKategori->kode, $daftarGameValidasi)){
            if ($dataKategori->kode == '8-ball-pool') {
                $data = $apicheck->check($request->uid, null, '8-ball-pool');
            } else if ($dataKategori->kode == 'mobile-legends') {
                $data = $apicheck->check($request->uid, $request->zone, 'mobile-legends');
            } else if($dataKategori->kode == "free-fire"){
                $data = $apicheck->check($request->uid, null, 'free-fire');
            } else if($dataKategori->kode == "point-blank"){
                $data = $apicheck->check($request->uid, null, 'point-blank');
            } else if($dataKategori->kode == "higgs-domino"){
                $data = $apicheck->check($request->uid, null, 'higgs-domino');
            } else if($dataKategori->kode == "arena-of-valor"){
                $data = $apicheck->check($request->uid, null, 'arena-of-valor');
            } else if($dataKategori->kode == 'apex-legends'){
                $data = $apicheck->check($request->uid, null, 'Apex Legends');
            } else if($dataKategori->kode == "lords-mobile"){
                $data = $apicheck->check($request->uid, null, 'lords-mobile');
            } else if($dataKategori->kode == "tom-jerry-chase"){
                $data = $apicheck->check($request->uid, null, 'tom-and-jerry-chase');
            } else if($dataKategori->kode == "dragon-raja"){
                $data = $apicheck->check($request->uid, null, 'dragon-raja');
            } else if($dataKategori->kode == "ragnarok-m"){
                $data = $apicheck->check($request->uid, $request->zone, 'ragnarok-m-eternal-love-big-cat-coin');
            } else if($dataKategori->kode == "marvel-super-war"){
                $data = $apicheck->check($request->uid, null, 'marvel-super-war');
            } else if($dataKategori->kode == "genshin-impact"){
                $data = $apicheck->check($request->uid, $request->zone, 'genshin-impact');
            } elseif ($dataKategori->kode == "call-of-duty") {
                  $data = $apicheck->check($request->uid, null , 'call-of-duty');
            }
            if($data['status']['code'] == 1){
                return response()->json([
                    'status' => false,
                    'data' => isset($data['data']['msg']) ? $data['data']['msg'] : 'Username tidak ditemukan atau coba lagi nanti'
                ]);
            }
            $username = $data['data']['userNameGame'];

            $sendData = "<b>".$produk->nama."</b><br>".
                        "Nickname : <span id='nick'>".urldecode($username)."</span><br>
                        ID : $request->uid $request->zone<br>
                        Layanan : ".$item->layanan."<br>
                        Harga : Rp. ".number_format($dataLayanan->harga*$request->qty, 0, '.', ',').
                        "<br />Metode Pembayaran : ".strtoupper($request->payment_method).
                        "<br />Qty: ".$request->qty.
                        "<br /><br />Catatan : Harga diatas belum termasuk biaya admin";

            return response()->json([
                'status' => true,
                'data' => $sendData
            ]);
        }else{
            if($request->ktg_tipe !== 'joki'){
                $sendData = "<b>".$produk->nama."</b><br>".
                            "ID : <span id='nick'>$request->uid</span><br>
                            Layanan : ".$item->layanan."<br>
                            Harga : Rp. ".number_format($dataLayanan->harga*$request->qty, 0, '.', ',').
                            "<br>Metode Pembayaran : ".strtoupper($request->payment_method).
                            "<br />Qty: ".$request->qty.
                            "<br><br>Catatan : Harga diatas belum termasuk biaya admin";
            }else{
                $sendData = "<b>".$produk->nama."</b><br>".
                            "Email : $request->email_joki<br>
                            Password : $request->password_joki<br>
                            Login Via : $request->loginvia_joki<br>
                            Nickname : $request->nickname_joki<br>
                            Request : $request->request_joki<br>
                            Catatan : $request->catatan_joki<br>
                            Layanan : ".$item->layanan."<br>
                            Harga : Rp. ".number_format($dataLayanan->harga, 0, '.', ',').
                            "<br>Metode Pembayaran : ".strtoupper($request->payment_method).
                            "<br><br>Catatan : Harga diatas belum termasuk biaya admin";
            }

            return response()->json([
                'status' => true,
                'data' => $sendData
            ]);
        }
    }

    public function store(Request $request)
    {
        if($request->ktg_tipe !== 'joki'){
            $request->validate([
                'uid' => 'required',
                'nickname' => 'required',
                'service' => 'required|numeric',
                'payment_method' => 'required',
                'nomor' => 'required|numeric',
                'qty' => 'required|min:1|max:200|numeric'
            ]);
        }else{
            $request->validate([
                'email_joki' => 'required',
                'password_joki' => 'required',
                'loginvia_joki' => 'required',
                'nickname_joki' => 'required',
                'request_joki' => 'required',
                'catatan_joki' => 'required',
                'service' => 'required|numeric',
                'payment_method' => 'required',
                'nomor' => 'required|numeric',
            ]);
        }

        if(Auth::check()){
            if(Auth::user()->role == "Member"){
                $dataLayanan = Layanan::where('id', $request->service)->select('layanan','harga_member AS harga','kategori_id', 'provider_id', 'provider', 'sisa', 'event', 'profit_member AS profit')->first();
            }else if(Auth::user()->role == "Platinum"){
                $dataLayanan = Layanan::where('id', $request->service)->select('layanan','harga_platinum AS harga','kategori_id', 'provider_id', 'provider', 'sisa', 'event', 'profit_platinum AS profit')->first();
            }else if(Auth::user()->role == "Gold" || Auth::user()->role == "Admin"){
                $dataLayanan = Layanan::where('id', $request->service)->select('layanan','harga_gold AS harga','kategori_id', 'provider_id', 'provider', 'sisa', 'event', 'profit_gold AS profit')->first();
            }
        }else{
            $dataLayanan = Layanan::where('id', $request->service)->select('layanan', 'harga AS harga', 'kategori_id', 'provider_id', 'provider', 'profit', 'sisa', 'event')->first();
        }

        if(isset($request->voucher)){
            $voucher = Voucher::where('kode', $request->voucher)->first();

            if(!$voucher){
                $dataLayanan->harga = $dataLayanan->harga;
            }else{
                if($voucher->stock == 0){
                    $dataLayanan->harga = $dataLayanan->harga;
                }else{
                    $potongan = $dataLayanan->harga * ($voucher->promo / 100);
                    if($potongan > $voucher->max_potongan){
                        $potongan = $voucher->max_potongan;
                    }
                    $dataLayanan->harga = round($dataLayanan->harga - $potongan);
                    $voucher->decrement('stock');
                }
            }
        }

        $kategori = Kategori::where('id', $dataLayanan->kategori_id)->select('kode')->first();

        $unik = date('Hs');
        $kode_unik = substr(str_shuffle(1234567890),0,3);
        $order_id = 'INV'.$unik.$kode_unik.'KG';
        $tripay = new TriPayController();

        $rand = rand(10,100);
        $no_pembayaran = '';
        $amount = '';
        $reference = '';
        
        if($dataLayanan->sisa == 'habis'){
            return response()->json(['status' => false, 'data' => 'Stok Habis']);
        }
        
        $api = \DB::table('setting_webs')->where('id',1)->first();

        if($request->payment_method == "SALDO"){
            $amount = $dataLayanan->harga*$request->qty;
        }else if($request->payment_method == "OVO1" || $request->payment_method == "GOPAY" || $request->payment_method == "QRIS1" || $request->payment_method == "DANA"){
            $amount = ($dataLayanan->harga*$request->qty) + $rand;
            $reference = '';
            if($request->payment_method == "OVO1"){
                $no_pembayaran = $api->ovo_admin;

                if($amount < 10000){
                    return response()->json(['status' => false, 'data' => 'Minimum jumlah pembayaran ovo nya Rp 10.000 yaa.']);
                }
            }
            if($request->payment_method == "GOPAY"){
                $no_pembayaran = $api->gopay_admin;

                if($amount < 1000){
                    return response()->json(['status' => false, 'data' => 'Minimum jumlah pembayaran gopay Rp 1.000 yaa.']);
                }
            }
            if($request->payment_method == "DANA"){
                $no_pembayaran = $api->dana_admin;

                if($amount < 1000){
                    return response()->json(['status' => false, 'data' => 'Minimum jumlah pembayaran dana Rp 1.000 yaa.']);
                }
            }
            if($request->payment_method == "QRIS1"){
                $no_pembayaran = $api->bca_admin;
                $amount = ($dataLayanan->harga * $request->qty) + 500;

                if($amount < 1000){
                    return response()->json(['status' => false, 'data' => 'Minimum jumlah pembayaran QRIS Rp 1.000 yaa.']);
                }
            }
        } else {
            $listchannel = [];

            foreach($tripay->channel()->data as $channel){
                array_push($listchannel,$channel->code);
            }

            unset($listchannel['OVO1']);

            if(!in_array($request->payment_method,$listchannel)){
                return response()->json([
                    'status'     => false,
                    'data'    => "Tipe pembayaran tidak sah"
                ]);
            }

            $tripayres = $tripay->request($order_id, $dataLayanan->harga, $request->payment_method, $order_id.'@email.com', $request->nomor, $request->qty);

            if($tripayres['success'] != true) return response()->json(['status' => false, 'data' => $tripayres['msg']]);

            $no_pembayaran = $tripayres['no_pembayaran'];
            $reference = $tripayres['reference'];
            $amount = $tripayres['amount'];
        }

        if ($request->payment_method == "SALDO") {
            //PESAN JOKI CUSTOM  

            // if($request->ktg_tipe !== 'joki'){

            //  $pesan = 
            // "*Pembayaran Berhasil*\n\n" .
            // "No Invoice: *$order_id*\n" .
            // "Layanan: *$dataLayanan->layanan*\n" .
            // "ID : *$request->uid*\n" .
            // "Server : *$request->zone*\n" .
            // "Nickname : *$request->nickname*\n" .
            // "Harga: *Rp. " . number_format($amount, 0, '.', ',') . "*\n" .
            // "Status Pembayaran: *Dibayar*\n" .
            // "Metode Pembayaran: *$request->payment_method*\n\n" .
            // "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
            // "INI ADALAH PESAN OTOMATIS";
            // }else{
            //     $pesan = '';
            // }

            $pesan = 
            "*Pembayaran Berhasil*\n\n" .
            "No Invoice: *$order_id*\n" .
            "Layanan: *$dataLayanan->layanan*\n" .
            "ID : *$request->uid*\n" .
            "Server : *$request->zone*\n" .
            "Nickname : *$request->nickname*\n" .
            "Harga: *Rp. " . number_format(($amount*$request->qty), 0, '.', ',') . "*\n" .
            "Status Pembayaran: *Dibayar*\n" .
            "Metode Pembayaran: *$request->payment_method*\n\n" .
            "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
            "INI ADALAH PESAN OTOMATIS";
        } else {
            
            //PESAN JOKI CUSTOM  
            
            // if($request->ktg_tipe !== 'joki'){
                
            // $pesan = 
            // "*Menunggu Pembayaran*\n\n" .
            // "No Invoice: *$order_id*\n" .
            // "Layanan: *$dataLayanan->layanan*\n" .
            // "ID : *$request->uid*\n" .
            // "Server : *$request->zone*\n" .
            // "Nickname : *$request->nickname*\n" .
            // "Harga: *Rp. " . number_format($amount, 0, '.', ',') . "*\n" .
            // "Status: *Menunggu Pembayaran*\n" .
            // "Metode Pembayaran: *$request->payment_method*\n" .
            // "Kode Bayar / Nomor VA : *".$no_pembayaran."*\n\n" .
            
            // "*Harap Dibayar Sebelum 3 Jam!* Segera lakukan pembayaran sesuai dengan kode bayar / nomor VA yang tercantum. Pastikan nominal pembayaran juga sesuai dengan total bayar.\n\n" .
            // "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
            //  "INI ADALAH PESAN OTOMATIS";
                
            // }else{
                
                
                
            //     $pesan = '';
                
                
            // }
            
            $pesan = 
            "*Menunggu Pembayaran*\n\n" .
            "No Invoice: *$order_id*\n" .
            "Layanan: *$dataLayanan->layanan*\n" .
            "ID : *$request->uid*\n" .
            "Server : *$request->zone*\n" .
            "Nickname : *$request->nickname*\n" .
            "Harga: *Rp. " . number_format(($amount*$request->qty), 0, '.', ',') . "*\n" .
            "Status: *Menunggu Pembayaran*\n" .
            "Metode Pembayaran: *$request->payment_method*\n" .
            "Kode Bayar / Nomor VA : *".$no_pembayaran."*\n\n" .
            
            "*Harap Dibayar Sebelum 3 Jam!* Segera lakukan pembayaran sesuai dengan kode bayar / nomor VA yang tercantum. Pastikan nominal pembayaran juga sesuai dengan total bayar.\n\n" .
            "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
            "INI ADALAH PESAN OTOMATIS";
        }

        if($request->payment_method != "SALDO"){
            $requestPesan = $this->msg($request->nomor,$pesan);

            $pembelian = new Pembelian();
            $pembelian->order_id = $order_id;
            $pembelian->user_id = $request->ktg_tipe !== 'joki' ? $request->uid : '-';
            $pembelian->zone = $request->ktg_tipe !== 'joki' ? $request->zone : '-';
            $pembelian->nickname = $request->ktg_tipe !== 'joki' ? $request->nickname : '-';
            $pembelian->layanan = $dataLayanan->layanan;
            $pembelian->harga = $amount;
            $pembelian->note = 'Pesanan Pending';
            $pembelian->qty = $request->qty;
            $pembelian->profit = ($amount*$request->qty) * ($dataLayanan->profit / 100);
            $pembelian->status = $request->ktg_tipe !== 'joki' ? 'Pending' : '-';
            $pembelian->tipe_transaksi = $request->ktg_tipe !== 'joki' ? 'game' : 'joki';
            $pembelian->save();

            $pembayaran = new Pembayaran();
            $pembayaran->order_id = $order_id;
            $pembayaran->harga = $amount;
            $pembayaran->no_pembayaran = $no_pembayaran;
            $pembayaran->no_pembeli = $request->nomor;
            $pembayaran->status = 'Belum Lunas';
            $pembayaran->metode = $request->payment_method;
            $pembayaran->reference = $reference;
            $pembayaran->save();

            if($request->ktg_tipe == 'joki'){
                $jokian = \DB::table('data_joki')->insert([
                    'order_id' => $order_id,
                    'email_joki' => $request->email_joki,
                    'password_joki' => $request->password_joki,
                    'loginvia_joki' => $request->loginvia_joki,
                    'nickname_joki' => $request->nickname_joki,
                    'request_joki' => $request->request_joki,
                    'catatan_joki' => $request->catatan_joki,
                    'status_joki' => 'Proses',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        } else if($request->payment_method == "SALDO") {
            $user = User::where('username', Auth::user()->username)->first();
            $sisa = $dataLayanan->sisa - 1;
            if($dataLayanan->sisa == 1){
                $sisa = "habis";
            }

            if($dataLayanan->harga > $user->balance) return response()->json(['status' => false, 'data' => 'Saldo anda tidak cukup']);
            
            if($dataLayanan->provider == "digiflazz"){
                $digi = new digiFlazzController;
                $provider_order_id = rand(1, 100000);
                $order['status'] = false;
                $totalSukses = 0;
                if($request->qty >= 1) {
                    for($i=1; $i <= $request->qty; $i++) {
                        $order = $digi->order($request->uid, $request->zone, $dataLayanan->provider_id, $provider_order_id);
                        if ($order['data']['status'] == "Pending" || $order['data']['status'] == "Sukses") {
                            $totalSukses = $totalSukses+1;
                            //]]$order['status'] = true;
                        } else {
                            //$order['status'] = false;
                        }
                        if($request->qty > 1){
                            //sleep(2);
                            //print_r($order);
                            $provider_order_id = rand(1, 100000);
                        }
                    }
                }else{
                    return response()->json(['status' => false, 'data' => 'Saldo anda tidak cukup']);
                }
                if($request->qty >= 1 && $totalSukses==$request->qty){
                        $order['status'] = true;
                }
            }else if($dataLayanan->provider == "vip"){
                $vip = new VipResellerController;
                
                if($request->qty > 1) {
                    for($i=1; $i <= $request->qty; $i++) {
                        $order = $vip->order($request->uid, $request->zone, $dataLayanan->provider_id);

                        if($order['result']){
                            $order['status'] = true;
                            $provider_order_id = $order['data']['trxid'];
                        }else{
                            $order['status'] = false;
                        }
                    }
                }
            }else if($dataLayanan->provider == "vip-game"){
                $vip = new VipResellerGameController;

                if($request->qty > 1) {
                    for($i=1; $i <= $request->qty; $i++) {
                        $order = $vip->order($request->uid, $request->zone, $dataLayanan->provider_id);

                        if($order['result']){
                            $order['status'] = true;
                            $provider_order_id = $order['data']['trxid'];
                        }else{
                            $order['status'] = false;
                        }
                    }
                }
            }else if($dataLayanan->provider == "apigames"){
                $apigames = new ApiGamesController;
                if($request->qty > 1) {
                    for($i=1; $i <= $request->qty; $i++) {
                        $provider_order_id = rand(1, 10000);
                        $order = $apigames->order($request->uid, $request->zone, $dataLayanan->provider_id, $provider_order_id);

                        if ($order['data']['status'] == "Sukses") {
                            $order['transactionId'] = $provider_order_id;
                            $order['status'] = true;
                        } else {
                            $order['status'] = false;
                        }
                    }
                }
            }else if($dataLayanan->provider == "joki"){
                $provider_order_id = '';
                $order['status'] = true;
            }else if($dataLayanan->provider == "mix_digiflazz"){
                $digi = new digiFlazzController;
                $provider_order_id = '';
                $providers_id = explode(',',$dataLayanan->provider_id);
                $order['status'] = '';

                foreach($providers_id as $pi){
                    $provider_order_id .= rand(1, 100000).',';
                    $order = $digi->order($request->uid, $request->zone, $dataLayanan->provider_id, $provider_order_id);

                    if ($order['data']['status'] == "Pending" || $order['data']['status'] == "Sukses") {
                        $order['status'] = true;
                    } else {
                        $order['status'] = false;
                    }
                }
            }
            if($order['status']){

            // PESAN JOKI CUSTOM
                
            //   if($request->ktg_tipe !== 'joki'){
                  
            //         $pesanSukses = 
            //         "*Pembelian Sukses*\n\n" .
            //         "No Invoice: *$order_id*\n" .
            //         "Layanan: *$dataLayanan->layanan*\n" .
            //         "ID : *$request->uid*\n" .
            //         "Server : *$request->zone*\n" .
            //         "Nickname : *$request->nickname*\n" .
            //         "Harga: *Rp. " . number_format($dataLayanan->harga, 0, '.', ',') . "*\n" .
            //         "Status Pembelian: *Sukses*\n" .
            //       "Metode Pembayaran: *$request->payment_method*\n\n" .
            //       "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
            //       "INI ADALAH PESAN OTOMATIS";

            //       $pesanSuksesAdmin = 
            //         "*Pembelian Sukses*\n\n" .
            //         "No Invoice: *$order_id*\n" .
            //         "Layanan: *$dataLayanan->layanan*\n" .
            //         "ID : *$request->uid*\n" .
            //         "Server : *$request->zone*\n" .
            //         "Nickname : *$request->nickname*\n" .
            //         "Harga: *Rp. " . number_format($dataLayanan->harga, 0, '.', ',') . "*\n" .
            //         "Status Pembelian: *Sukses*\n" .
            //       "Metode Pembayaran: *$request->payment_method*\n\n" .
                   
            //       "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
            //       "INI ADALAH PESAN OTOMATIS";
                  
            //   }else{
                  
            //       $pesanSukses = '';
            //       $pesanSuksesAdmin = '';
                  
            //   }

                $pesanSukses = 
                "*Pembelian Proses*\n\n" .
                "No Invoice: *$order_id*\n" .
                "Layanan: *$dataLayanan->layanan*\n" .
                "ID : *$request->uid*\n" .
                "Server : *$request->zone*\n" .
                "Nickname : *$request->nickname*\n" .
                "Harga: *Rp. " . number_format(($dataLayanan->harga * $request->qty), 0, '.', ',') . "*\n" .
                "Status Pembelian: *Proses*\n" .
                "Metode Pembayaran: *$request->payment_method*\n\n" .
                "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
                "INI ADALAH PESAN OTOMATIS";
               
               $pesanSuksesAdmin = 
                "*Pembelian Proses*\n\n" .
                "No Invoice: *$order_id*\n" .
                "Layanan: *$dataLayanan->layanan*\n" .
                "ID : *$request->uid*\n" .
                "Server : *$request->zone*\n" .
                "Nickname : *$request->nickname*\n" .
                "Harga: *Rp. " . number_format(($dataLayanan->harga * $request->qty), 0, '.', ',') . "*\n" .
                "Status Pembelian: *Pending*\n" .
                "Metode Pembayaran: *$request->payment_method*\n\n" .

                "*Invoice* : " . env("APP_URL") . "/pembelian/invoice/$order_id\n\n" .
                "INI ADALAH PESAN OTOMATIS";
                
                $requestPesanSukses = $this->msg($request->nomor, $pesanSukses);
                $requestPesanSuksesAdmin = $this->msg($api->nomor_admin, $pesanSuksesAdmin);
            
                $user->update([
                    //'balance' => $user->balance - $dataLayanan->harga
                    'balance' => $user->balance - ($dataLayanan->harga * $request->qty)
                ]);
                
                if($dataLayanan->event == '1'){
                    $updatesisa = Layanan::where('id', $request->service)->update(['sisa' => $sisa]);
                }
                if($request->qty < 1) {
                    $request->qty = 1;
                }

                $pembelian = new Pembelian();
                $pembelian->username = Auth::user()->username;
                $pembelian->order_id = $order_id;
                $pembelian->user_id = $request->ktg_tipe !== 'joki' ? $request->uid : '-';
                $pembelian->zone = $request->ktg_tipe !== 'joki' ? $request->zone : '-';
                $pembelian->nickname = $request->ktg_tipe !== 'joki' ? $request->nickname : '-';
                $pembelian->layanan = $dataLayanan->layanan;
                $pembelian->harga = $dataLayanan->harga;
                $pembelian->note = 'Pesanan Sedang Di Proses';
                $pembelian->profit = ($dataLayanan->harga * $request->qty) * ($dataLayanan->profit / 100);
                $pembelian->qty = $request->qty;
                $pembelian->status = $request->ktg_tipe !== 'joki' ? 'Proses' : '-';
                $pembelian->provider_order_id = $provider_order_id ? rtrim($provider_order_id,',') : "";
                $pembelian->log = $request->ktg_tipe !== 'joki' ? json_encode($order) : '';
                $pembelian->tipe_transaksi = $request->ktg_tipe !== 'joki' ? 'game' : 'joki';
                $pembelian->save();

                $pembayaran = new Pembayaran();
                $pembayaran->order_id = $order_id;
                $pembayaran->harga = $dataLayanan->harga*$request->qty;
                $pembayaran->no_pembayaran = "Saldo";
                $pembayaran->no_pembeli = $request->nomor;
                $pembayaran->status = 'Paid';
                $pembayaran->metode = $request->payment_method;
                $pembayaran->reference = $reference;
                $pembayaran->save();

                if($request->ktg_tipe == 'joki'){
                    $jokian = \DB::table('data_joki')->insert([
                        'order_id' => $order_id,
                        'email_joki' => $request->email_joki,
                        'password_joki' => $request->password_joki,
                        'loginvia_joki' => $request->loginvia_joki,
                        'nickname_joki' => $request->nickname_joki,
                        'request_joki' => $request->request_joki,
                        'catatan_joki' => $request->catatan_joki,
                        'status_joki' => 'Proses',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'data' => 'Server Error'
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'order_id' => $order_id
        ]);
    }
    
    public function msg($nomor, $msg)
    {
        $api = \DB::table('setting_webs')->where('id',1)->first();
        
        $data = [
            'target'  => "$nomor",
            'message' => "$msg"
        ];
        
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
