<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();

        return view("index", ["kendaraan" => $kendaraan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKendaraanRequest $request)
    {
        $request->validate([
            "merk_motor" => "required",
            "nama_motor" => "required",
            "harga" => "required"
        ]);
        Kendaraan::create($request->all());
        return redirect("/kendaraan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view("edit", compact("kendaraan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKendaraanRequest $request, $id_motor)
    {
        $request->validate(
            [
                "merk_motor" => "required",
                "nama_motor" => "required",
                "harga" => "required"
            ]
        );
        $kendaraan = Kendaraan::find($id_motor);
        $kendaraan->update($request->all());

        return redirect("/kendaraan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();

        return redirect("/kendaraan");
    }
}
