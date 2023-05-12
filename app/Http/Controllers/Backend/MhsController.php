<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    //
    public function MhsView(){
        //$allDataUser=User::all();
        $data['allDataMhs']=Mahasiswa::all();
        return view('backend.mhs.view_mhs', $data);
    }
    public function MhsAdd(){
        //$allDataMhs=User::all();
        //$data['allDataMhs']=Mahasiswa::all();
        return view('backend.mhs.add_mhs');
    }
    public function MhsStore(Request $request){
        
        // $validateData=$request->validate([
        //     'email' =>'required|unique:users',
        //     'textNama' =>'required'
        // ]);
        //dd($request);
        $data=new Mahasiswa();
        $data->nim=$request->nim;
        $data->nama=$request->nama;
        $data->alamat=$request->alamat;
        $data->tanggal_lahir=$request->tanggal_lahir;
        $data->save();

        return redirect()->route('mhs.view')->with('info','Tambah Mahasiswa berhasil');
    }

    public function MhsEdit($id){
        //dd('berhasil masuk controller user edit');
        $editData= Mahasiswa::find($id);
        return view('backend.mhs.edit_mhs', compact('editData'));

    }

    public function MhsUpdate(Request $request, $id){
        
        // $validateData=$request->validate([
        //     'email' =>'required|unique:users',
        //     'textNama' =>'required'
        // ]);
        //dd($request);
        $data=Mahasiswa::find($id);
        $data->nim=$request->nim;
        $data->nama=$request->nama;
        $data->alamat=$request->alamat;
        $data->tanggal_lahir=$request->tanggal_lahir;
        // if($request->password!=""){
        //     $data->password=bcrypt($request->password);
        // }
        
        $data->save();

        return redirect()->route('mhs.view')->with('info','Update Mahasiswa berhasil');
    }

    public function MhsDelete($id){
        //dd('berhasil masuk controller user edit');
        $deleteData= Mahasiswa::find($id);
        $deleteData->delete();

        return redirect()->route('mhs.view')->with('info','Delete Mahasiswa berhasil');

    }
}
