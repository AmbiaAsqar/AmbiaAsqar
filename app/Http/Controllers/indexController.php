<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Layanan;

class indexController extends Controller
{
    public function create()
    {
        $datas = Layanan::join('kategoris', 'layanans.kategori_id', 'kategoris.id')->where('kategoris.status', 'active')->orderBy('created_at', 'desc')
                ->select('layanans.*', 'kategoris.nama AS nama_kategori','kategoris.kode AS kode_kategori','kategoris.thumbnail AS thumbnail_kategori')->get();

        $kategori = Kategori::get();
  
        return view('template.index', [
            'kategori' => Kategori::where('status', 'active')->get(),
            'layanan' => $datas, 'kategoris' => $kategori,
            'banner' => Berita::where('tipe', 'home')->where('status',1)->get(),
            'logoheader' => Berita::where('tipe', 'logoheader')->where('status',1)->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->where('status',1)->latest()->first(),
            'popup' => Berita::where('tipe', 'popup')->latest()->first(),
            'pay_method' => \App\Models\Method::all()
        ]);
    }
    
    public function cariIndex(Request $request)
    {
        if($request->ajax()){
            
            $data = Kategori::where('nama','LIKE','%'.$request->data.'%')->where('status','active')->limit(6)->get();
            
            
            $res = '';
            
           
            foreach($data as $d){
                
                $res .= '
                
                            <div class="col-4">
                            <a href="'.url('/order').'/'.$d->kode.'" class="box">
                                <img src="'.$d->thumbnail.'" alt="">
                                <span>Otomatis</span>
                                <p class="mb-0">'.$d->nama.'</p>
                            </a>
                        </div>
                ';
                
            }
            
            return $res;
            
            
        }
    }
}
