<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Operator;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBarang()
    {
        $kategori = Kategori::get();

        $countArr = $kategori->count();
        $json = [];
        for($i = 0; $i < $countArr; $i++) {
            $json[$i] = json_encode([
                "id" => $kategori[$i]->kategori_barang_id,
                "desc" => $kategori[$i]->deskripsi,
                "nama" => $kategori[$i]->nama_kategori_barang,
                "icon" => mb_convert_encoding(base64_encode($kategori[$i]->icon), "UTF-8", "UTF-8")
            ]);
        }
        return $json;
    }

    public function indexOperator(Request $request)
    {
        $id = $request->id;
        $operator = Operator::where("kategori_barang_id", $id)->get();

        $countArr = $operator->count();
        $json = [];
        for($i = 0; $i < $countArr; $i++) {
            $json[$i] = json_encode([
                "id" => $operator[$i]->operator_id,
                "nama" => $operator[$i]->nama,
                "description" => $operator[$i]->description,
                "input" => $operator[$i]->input_box,
                "thumbnail" => mb_convert_encoding(base64_encode($operator[$i]->thumbnail), "UTF-8", "UTF-8"),
                "banner" => mb_convert_encoding(base64_encode($operator[$i]->banner), "UTF-8", "UTF-8")
            ]);
        }

        return $json;
    }

    public function getOperator($id)
    {
        $operator = Operator::where("operator_id", $id)->first();

        $json = json_encode([
            "id" => $operator->operator_id,
            "nama" => $operator->nama,
            "descrition" => $operator->description,
            "input" => $operator->input_box,
            "thumbnail" => mb_convert_encoding(base64_encode($operator->thumbnail), "UTF-8", "UTF-8"),
            "banner" => mb_convert_encoding(base64_encode($operator->banner), "UTF-8", "UTF-8")
        ]);

        return json_decode($json);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        //
    }
}
