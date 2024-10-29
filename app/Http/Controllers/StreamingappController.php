<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;


class StreamingappController extends Controller
{
    public function create()
    {
        
        return view('template.c.streaming-app', [
            'kategori' => Kategori::where('status', 'active')->get(),
            'banner' => Berita::where('tipe', 'streaming-app')->get(),
            'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first(),
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
