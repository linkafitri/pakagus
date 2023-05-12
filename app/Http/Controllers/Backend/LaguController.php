<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lagu;
use Illuminate\Support\Facades\DB;

class LaguController extends Controller
{
    public function index()
    {
        $lagus = Lagu::paginate(10);
        return response()->json([
            'data' => $lagus
        ]);
    }
    //
    // public function LaguView(){
    //     //$allDataUser=User::all();
    //     $data['allDataLagu']=Lagu::all();
    //     return view('backend.lagu.view_lagu', $data);
    // }
    // public function LaguAdd(){
    //     //$allDataMhs=User::all();
    //     //$data['allDataMhs']=Mahasiswa::all();
    //     return view('backend.lagu.add_lagu');
    // }
    public function Store(Request $request){

        $lagu = Lagu::create([
            'kode_lagu' => $request->kode_lagu,
            'judul_lagu' => $request->judul_lagu,
            'nama_penyanyi' => $request->nama_penyanyi
        ]);
        return response()->json([
            'data' => $lagu
        ]);
        
        // $validateData=$request->validate([
        //     'id' => 'required',
        //     'kode_lagu' =>'required',
        //     'judul_lagu' =>'required',
        //     'nama_penyanyi' => 'required',
        // ]);

        // $data=new Lagu();
        // $data->id = $request->id;
        // $data->kode_lagu=$request->kode_lagu;
        // $data->judul_lagu=$request->judul_lagu;
        // $data->nama_penyanyi=$request->nama_penyanyi;
        // $data->save();

        // return response()->json($data, 201);

    }

    public function show(Lagu $lagu)
    {
        return response()->json([
            'data' => $lagu
        ]);
    }

    public function Update(Request $request, Lagu $lagu){
        
        // $validateData=$request->validate([
        //     'id' => 'required',
        //     'kode_lagu' =>'required',
        //     'judul_lagu' =>'required',
        //     'nama_penyanyi' => 'required',
        // ]);

        // $data=Lagu::where('id','=',$request->id)->first();
        // $data->id = $request->id;
        $lagu->kode_lagu=$request->kode_lagu;
        $lagu->judul_lagu=$request->judul_lagu;
        $lagu->nama_penyanyi=$request->nama_penyanyi;
        $lagu->save();

        return response()->json([
            'data' => $lagu
        ]);
    }

    public function destroy(Lagu $lagu)
    {
        $lagu->delete();
        return response()->json([
            'message' => 'lagu deleted'
        ], 204);
    }
}
