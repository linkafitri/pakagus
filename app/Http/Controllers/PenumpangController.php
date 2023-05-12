<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penumpangs = Penumpang::paginate(10);
        return response()->json([
            'data'=> $penumpangs
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penumpang = Penumpang::create([
            'NIKPenumpang' => $request->NIKPenumpang,
            'namaPenumpang' => $request->namaPenumpang,
            'alamatPenumpang' => $request->alamatPenumpang,
        ]);

        return response()->json([
            'data' => $penumpang
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function show(Penumpang $penumpang)
    {
        return response()->json([
            'data' => $penumpang
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penumpang $penumpang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penumpang $penumpang)
    {
        $penumpang->delete();
        return response()->json([
            'message' => 'penumpang deleted'
        ], 204);
    }
}
