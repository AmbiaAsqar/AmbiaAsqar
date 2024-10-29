<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita as BeritaModel;

class Berita extends Controller
{
    public function create()
    {
        return view('components.admin.berita', ['berita' => BeritaModel::all()]);
    }

    public function post(Request $request)
    {
//dd($request->deskripsi);
        $request->validate([
            'banner' => 'required|file|mimes:jpg,png,webp,jpeg',
            'tipe' => 'required'
        ]);

        $file = $request->file('banner');
        $folder = 'assets/banner';
        $file->move($folder, $file->getClientOriginalName());
        
        $berita = new BeritaModel();
        $berita->path = "/".$folder."/".$file->getClientOriginalName();
        $berita->deskripsi = $request->deskripsi;
        $berita->tipe = $request->tipe;
        $berita->save();

        return back()->with('success', 'Berhasil upload!');
    }

    public function delete($id)
    {
        $data = BeritaModel::where('id', $id)->select('path')->first();
        BeritaModel::where('id', $id)->delete();

        return back()->with('success', 'Berhasil hapus!');
    }

    public function inactive($id) {
        $data = BeritaModel::find($id);
        if($data) {
            $data->status = 0;
            $data->save();
            return redirect()->back()->with('success', 'Banner berhasil di non-aktifkan');
        }
        return redirect()->back()->with('error', 'Banner tidak dapat dinonaktifkan');
    }

    public function activate($id) {
        $data = BeritaModel::find($id);
        if($data) {
            $data->status = 1;
            $data->save();
            return redirect()->back()->with('success', 'Banner berhasil di aktifkan');
        }
        return redirect()->back()->with('error', 'Banner tidak dapat aktifkan');
    }
}