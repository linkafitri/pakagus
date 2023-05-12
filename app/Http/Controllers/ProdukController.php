<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::paginate(10);
        return response()->json([
            'data' => $produks
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
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'foto' => $request->foto
        ]);
        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->foto = $request->foto;
        $produk->save();

        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json([
            'message' => 'Produk deleted'
        ], 204);
    }

    // crud paket web

    public function ProdukView(){
        //$allDataUser=User::all();
        $data['allDataProduk']=Produk::all();
        return view('backend.produk.view_produk', $data);
    }
    public function ProdukAdd(){
        //$allDataMhs=User::all();
        //$data['allDataMhs']=Mahasiswa::all();
        return view('backend.produk.add_produk');
    }
    public function ProdukStore(Request $request){
        
        // $validateData=$request->validate([
        //     'email' =>'required|unique:users',
        //     'textNama' =>'required'
        // ]);
        //dd($request);
        $data=new Produk();
        $data->nama_produk = $request->nama_produk;
        $data->harga_produk = $request->harga_produk;
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $file->move('uploads/produks/', $filename);
            $data->foto = $request->foto = $filename;
        }
        // $data->foto = $request->foto;
        $data->save();

        return redirect()->route('produk.view')->with('info','Tambah Produk berhasil');
    }

    public function ProdukEdit($id){
        //dd('berhasil masuk controller user edit');
        $editData= Produk::find($id);
        return view('backend.Produk.edit_produk', compact('editData'));

    }

    public function ProdukUpdate(Request $request, $id){
        
        $data=Produk::find($id);
        $data->nama_produk = $request->nama_produk;
        $data->harga_produk = $request->harga_produk;

        if($request->hasfile('foto'))
        {
            $destination = 'uploads/produks/'.$data->foto = $request->foto;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $file->move('uploads/produks/', $filename);
            $data->foto = $request->foto = $filename;
        }
        $data->save();

        return redirect()->route('produk.view')->with('info','Update Produk berhasil');
    }

    public function ProdukDelete($id){
        //dd('berhasil masuk controller user edit');
        $deleteData= Produk::find($id);
        $deleteData->delete();

        return redirect()->route('produk.view')->with('info','Delete Produk berhasil');

    }

}
