<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function create()
    {
        return view('components.admin.kategori', ['data' => Kategori::orderBy('nama', 'asc')->get()]);
    }

    public function store(Request $request)
    {
        
        
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpg,png,webp,jpeg',
            'banner' => 'required|image|mimes:jpg,png,webp,jpeg',
            'petunjuk' => 'required|file|mimes:jpg,png,webp,jpeg',
            'nama' => 'required',
            'sub_nama' => 'required',
            'brand' => 'required',
            'kode' => 'required|unique:kategoris,kode',
            'serverOption' => 'required',
            'tipe' => 'required',
            'placeholder_1' => 'required',
            'placeholder_2' => 'required'
        ]);

        $file = $request->file('thumbnail');
        $folder = 'assets/thumbnail';
        $file->move($folder, $file->getClientOriginalName());    
        
        $file2 = $request->file('banner');
        $folder2 = 'assets/banner_game';
        $file2->move($folder2, $file2->getClientOriginalName());
        
        $petunjuk = $request->file('petunjuk');
        $folderPetunjuk = 'assets/petunjuk';
        $petunjuk->move($folderPetunjuk, $petunjuk->getClientOriginalName());
        
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->sub_nama = $request->sub_nama;
        $kategori->brand = $request->brand;
        $kategori->kode = $request->kode;
        $kategori->server_id = $request->serverOption == 'ya' ? 1 : 0;
        $kategori->tipe = $request->tipe;
        $kategori->kategori = $request->kategori;
        $kategori->placeholder_1 = $request->placeholder_1;
        $kategori->placeholder_2 = $request->placeholder_2;
        $kategori->thumbnail = "/".$folder."/".$file->getClientOriginalName();
        $kategori->banner = "/".$folder2."/".$file2->getClientOriginalName();
        $kategori->petunjuk = "/".$folderPetunjuk."/".$petunjuk->getClientOriginalName();
        $kategori->deskripsi_game = str_replace("\r\n","<br>",$request->deskripsi_game);
        $kategori->deskripsi_field = str_replace("\r\n","<br>",$request->deskripsi_field);
        $kategori->format_pemisah = $request->format_pemisah;
        $kategori->save();

        return back()->with('success', 'Berhasil menambahkan kategori');
    }

    public function delete($id)
    {
        try{
            $data = Kategori::where('id', $id)->select('thumbnail')->first();
            unlink(public_path($data->thumbnail));
            Kategori::where('id', $id)->delete();
            return back()->with('success', 'Berhasil hapus!');
        }catch(\Exception $e){
            Kategori::where('id', $id)->delete();
            return back()->with('success', 'Berhasil hapus!');
        }
    }

    public function update($id, $status)
    {
        $data = Kategori::where('id', $id)->update([
            'status' => $status
        ]);

        return back()->with('success', 'Berhasil update!');
    }

public function detail($id)
    {
        $data = Kategori::where('id', $id)->first();
        
        $send = "
                <form action='".route("kategori.detail.update", [$id])."' method='POST' enctype='multipart/form-data'>
                    <input type='hidden' name='_token' value='".csrf_token()."'>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Nama</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='".$data->nama. "' name='nama'>
                        </div>
                    </div>    
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Url</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->kode . "' name='kode'>
                        </div>
                    </div> 
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Sub Nama</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->sub_nama . "' name='sub_nama'>
                        </div>
                    </div> 
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Brand</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->brand . "' name='brand'>
                        </div>
                    </div> 
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Deskripsi Game</label>
                        <div class='col-lg-10'>
                            <textarea class='form-control' name='deskripsi_game'>".$data->deskripsi_game."</textarea>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Placeholder ID</label>
                        <div class='col-lg-10'>
                            <textarea class='form-control' name='placeholder_1'>".$data->placeholder_1."</textarea>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Placeholder Zone/Server</label>
                        <div class='col-lg-10'>
                            <textarea class='form-control' name='placeholder_2'>".$data->placeholder_2."</textarea>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Deskripsi Field User ID & Zone ID</label>
                        <div class='col-lg-10'>
                            <textarea class='form-control' name='deskripsi_field'>".$data->deskripsi_field."</textarea>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Thumbnail</label>
                        <div class='col-lg-10'>
                            <input type='file' class='form-control' value='" . $data->thumbnail . "' name='thumbnail'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Banner</label>
                        <div class='col-lg-10'>
                            <input type='file' class='form-control' value='" . $data->banner . "' name='banner'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Petunjuk</label>
                        <div class='col-lg-10'>
                            <input type='file' class='form-control' value='" . $data->petunjuk . "' name='petunjuk'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Sistem Target</label>
                        <div class='col-lg-10'>
                            <select class='form-select' id='customRadio1' name='serverOption' value='".$data->server_id ."'>
                                <option value='".$data->server_id."'>". $data->server_id ." (current)</option>
                                <option value='tidak'>1. Target (User ID)</option>
                                <option value='ya'>2. Target (User ID / Server ID</option>
                            </select>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Tipe</label>
                        <div class='col-lg-10'>
                            <select class='form-select' value='" . $data->tipe . "' name='tipe'>
                                <option value='".$data->tipe."'>". $data->tipe ." (current)</option>
                                <option value='game'>Topup</option>
                                <option value='pulsa'>Pulsa</option>
                                <option value='streaming-app'>Streaming App</option>
                                <option value='e-wallet'>E-Wallet</option>
                                <option value='joki'>Joki</option>
                            </select>
                        </div>
                    </div>    
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Kategori</label>
                        <div class='col-lg-10'>
                            <select class='form-select' value='" . $data->kategori . "' name='kategori'>
                                <option value='".$data->kategori."'>". $data->kategori ." (current)</option>
                                <option value='mobile-game'>Mobile Game</option>
                                <option value='pc-game'>PC Game</option>
                                <option value='streaming-app'>Streaming App</option>
                                <option value='pulsa-utilitas'>Pulsa & Utilitas</option>
                                <option value='e-wallet'>E-Wallet</option>
                                <option value='jasa-joki'>Jasa Joki</option>
                            </select>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Format Pemisah</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->format_pemisah . "' name='format_pemisah'>
                        </div>
                    </div> 
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Status</label>
                        <div class='col-lg-10'>
                            <select class='form-control' name='status'>
                                <option value='active'>Active</option>
                                <option value='unactive'>Unactive</option>
                            </select>
                        </div>
                    </div>                    
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                    </div>
                </form>
        ";

        return $send;        
    }  
    
    public function patch(Request $request, $id)
    {
        if($request->file('thumbnail')){
            $file = $request->file('thumbnail');
            $folder = 'assets/thumbnail';
            $file->move($folder, $file->getClientOriginalName());      
            Kategori::where('id', $id)->update([
                'thumbnail' => "/".$folder."/".$file->getClientOriginalName()
            ]);
        }
        
        if($request->file('banner')){
            $file2 = $request->file('banner');
            $folder2 = 'assets/banner_game';
            $file2->move($folder2, $file2->getClientOriginalName());      
            Kategori::where('id', $id)->update([
                'banner' => "/".$folder2."/".$file2->getClientOriginalName()
            ]);
        }
        
        if($request->file('petunjuk')){
            $file = $request->file('petunjuk');
            $folder = 'assets/petunjuk';
            $file->move($folder, $file->getClientOriginalName());      
            Kategori::where('id', $id)->update([
                'petunjuk' => "/".$folder."/".$file->getClientOriginalName()
            ]);
        }
        
        $pembayaran = Kategori::where('id', $id)->update([
            'nama' => $request->nama,
            'sub_nama' => $request->sub_nama,
            'kode' => $request->kode,
            'brand' => $request->brand,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'placeholder_1' => $request->placeholder_1,
            'placeholder_2' => $request->placeholder_2,
            'status' => $request->status,
            'server_id' => $request->serverOption == 'ya' ? 1 : 0,
            'deskripsi_game' => str_replace("\r\n","<br>",$request->deskripsi_game),
            'deskripsi_field' => str_replace("\r\n","<br>",$request->deskripsi_field),
            'format_pemisah' => $request->format_pemisah
        ]);
           
        return back()->with('success', 'Berhasil update kategori');        
    }        
}
