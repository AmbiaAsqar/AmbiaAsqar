<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Berita;

class CariController extends Controller
{
    
    public function create()
    {
        
        $data = \App\Models\Pembayaran::join('pembelians','pembelians.order_id','=','pembayarans.order_id')
                                      ->select('pembelians.*','pembayarans.status as status_bayar','pembelians.status as status_beli','pembayarans.created_at as tanggal_trx')
                                      ->orderBy('pembayarans.id','DESC')
                                      ->limit(10)
                                      ->get();
         $beb = \App\Models\Pembayaran::join('pembelians','pembelians.order_id','=','pembayarans.order_id')
                                      ->select('pembelians.*','pembayarans.status as status_bayar','pembayarans.created_at as tanggal_trx')
                                      ->orderBy('pembayarans.id','DESC')
                                      ->limit(10)
                                      ->get();                               
                                        
        // return view('components.cari', [
        //     'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
        //     'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first(),
        // ]);
        
        return view('template.history', [
            'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first(),
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $pembelian = Pembelian::where('order_id', $request->id)->first();
        if($pembelian){
            return redirect(route('pembelian', ['order' => $request->id]));
        }

        return back()->with('error', 'Pesanan tidak ditemukan');
    }
}
