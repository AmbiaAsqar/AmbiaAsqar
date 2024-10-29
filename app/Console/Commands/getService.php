<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\LayananPpob;
use App\Http\Controllers\digiFlazzController;
use Str;

class getService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Service';

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
        
        $digiFlazz = new digiFlazzController;
        
        //for testing purpose only ===============
        //$uid = "123123123";
        //$zone = "1234";
        //$z = $digiFlazz->order($uid, $zone, 'GI60GC', 1234);
        //dd($z);
        
        $res = $digiFlazz->harga();
        
        foreach(Kategori::get() as $kategori){
            //dd($res['data']);
            $p = 5;
            $m = 5;
            $pl = 3;
            $g = 2;
            foreach($res['data'] as $data){
                if(Str::upper($data['brand']) == Str::upper($kategori->brand)){
                    if($data['category'] == "Games"){
                        
                        $cekgame = Layanan::where('provider_id',$data['buyer_sku_code'])->first();
                        
                        if(!$cekgame){
                            $layanan = new Layanan();
                            $layanan->layanan = $data['product_name'];
                            $layanan->kategori_id = $kategori->id;
                            $layanan->provider_id = $data['buyer_sku_code'];
                            $layanan->harga_awal = $data['price'];
                            $layanan->harga = $data['price'];
                            $layanan->harga_member = $data['price'];
                            $layanan->harga_platinum = $data['price'];
                            $layanan->harga_gold = $data['price'];
                            $layanan->profit = $p;
                            $layanan->profit_member = $m;
                            $layanan->profit_platinum = $pl;
                            $layanan->profit_gold = $g;
                            $layanan->catatan = $data['desc'];
                            $layanan->status = ($data['seller_product_status'] === true ? "available" : "unavailable");
                            $layanan->provider = "digiflazz";
                            $x = $layanan->save();
                            if($x){
                                echo "sukses<br>";
                            }
                            
                        }else{
                            
                          $y = $cekgame->update([
                             'harga_awal' => $data['price'],
                             'harga' => $data['price'] + ($data['price'] * $cekgame->profit / 100),
                             'harga_member' => $data['price'] + ($data['price'] * $cekgame->profit_member / 100),
                             'harga_platinum' => $data['price'] + ($data['price'] * $cekgame->profit_platinum / 100),
                             'harga_gold' => $data['price'] + ($data['price'] * $cekgame->profit_gold / 100),
                             'status' => ($data['seller_product_status'] === true ? "available" : "unavailable")
                              
                          ]);
                          if($y){
                            echo "sukses update(".$data['product_name'].")<br>";
                          }
                            
                        }
                        
                       
                    }else if($data['category'] == "Pulsa"){
                        
                        $cekpulsa = Layanan::where('provider_id',$data['buyer_sku_code'])->first();
                        
                        
                        if(!$cekpulsa){
                            
                            $layanan = new Layanan();
                            $layanan->layanan = $data['product_name'];
                            $layanan->kategori_id = $kategori->id;
                            $layanan->provider_id = $data['buyer_sku_code'];
                            $layanan->harga_awal = $data['price'];
                            $layanan->harga = $data['price'];
                            $layanan->harga_member = $data['price'];
                            $layanan->harga_platinum = $data['price'];
                            $layanan->harga_gold = $data['price'];
                            $layanan->profit = $p;
                            $layanan->profit_member = $m;
                            $layanan->profit_platinum = $pl;
                            $layanan->profit_gold = $g;
                            $layanan->catatan = $data['desc'];
                            $layanan->status = ($data['seller_product_status'] === true ? "available" : "unavailable");
                            $layanan->provider = "digiflazz";
                            $layanan->save();
                            
                            
                        }else{
                            
                            $cekpulsa->update([
                             'harga_awal' => $data['price'],
                             'harga' => $data['price'] + ($data['price'] * $cekpulsa->profit / 100),
                             'harga_member' => $data['price'] + ($data['price'] * $cekpulsa->profit_member / 100),
                             'harga_platinum' => $data['price'] + ($data['price'] * $cekpulsa->profit_platinum / 100),
                             'harga_gold' => $data['price'] + ($data['price'] * $cekpulsa->profit_gold / 100),
                             'status' => ($data['seller_product_status'] === true ? "available" : "unavailable")
                              
                          ]);
                            
                        }
                        
                        
                    }else if($data['category'] == "E-Money"){
                        
                        $cekemoney = Layanan::where('provider_id',$data['buyer_sku_code'])->first();
                        
                        
                        if(!$cekemoney){
                            
                            $layanan = new Layanan();
                            $layanan->layanan = $data['product_name'];
                            $layanan->kategori_id = $kategori->id;
                            $layanan->provider_id = $data['buyer_sku_code'];
                            $layanan->harga_awal = $data['price'];
                            $layanan->harga = $data['price'];
                            $layanan->harga_member = $data['price'];
                            $layanan->harga_platinum = $data['price'];
                            $layanan->harga_gold = $data['price'];
                            $layanan->profit = $p;
                            $layanan->profit_member = $m;
                            $layanan->profit_platinum = $pl;
                            $layanan->profit_gold = $g;
                            $layanan->catatan = $data['desc'];
                            $layanan->status = ($data['seller_product_status'] === true ? "available" : "unavailable");
                            $layanan->provider = "digiflazz";
                            $layanan->save();
                            
                            
                        }else{
                            
                            $cekpulsa->update([
                             'harga_awal' => $data['price'],
                             'harga' => $data['price'] + ($data['price'] * $cekemoney->profit / 100),
                             'harga_member' => $data['price'] + ($data['price'] * $cekemoney->profit_member / 100),
                             'harga_platinum' => $data['price'] + ($data['price'] * $cekemoney->profit_platinum / 100),
                             'harga_gold' => $data['price'] + ($data['price'] * $cekemoney->profit_gold / 100),
                             'status' => ($data['seller_product_status'] === true ? "available" : "unavailable")
                              
                          ]);
                            
                        }
                        
                        
                    }
                }
            }
        }
        
    }
}
