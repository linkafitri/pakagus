<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class xss1controller extends Controller
{
    public function XssView(){
        //$allDataUser=User::all();
        $data['allDataMhs']=Mahasiswa::all();
        return view('backend.xss1.view_xss1', $data);
    }
    public function XssAdd(){
        //$allDataMhs=User::all();
        //$data['allDataMhs']=Mahasiswa::all();
        return view('backend.xss1.add_xss1');
    }
    public function XssStore(Request $request){
        
        // $validateData=$request->validate([
        //     'email' =>'required|unique:users',
        //     'textNama' =>'required'
        // ]);
        //dd($request);
        // $data=new Mahasiswa();

        // $sementara1= preg_replace('/<(.*)s(.*)c(.*)p(.*)p(.*)t/i','',$request->nama);
        // $sementara2= preg_replace('/<(.*)s(.*)c(.*)p(.*)p(.*)t/i','',$request->alamat);
        // $sementara3= strip_tags($sementara1,'<p>,<ul>,<li>');
        // $sementara4= strip_tags($sementara2,'<p>,<ul>,<li>');

        // $data->nim=$request->nim;
        // $data->nama=$sementara3;
        // $data->alamat=$sementara4;
        // $data->tanggal_lahir=$request->tanggal_lahir;
        // $data->save();

        $data=new Mahasiswa();
        $data->nim=$request->nim;
        $data->nama=$request->nama;
        $data->alamat=$request->alamat;
        $data->tanggal_lahir=$request->tanggal_lahir;
        $data->save();

        return redirect()->route('xss1.view')->with('info','Tambah Mahasiswa berhasil');
    }

    public function XssEdit($id){
        //dd('berhasil masuk controller user edit');
        $editData= Mahasiswa::find($id);
        return view('backend.xss1.edit_xss1', compact('editData'));

    }

    public function XssUpdate(Request $request, $id){
        
        // $validateData=$request->validate([
        //     'email' =>'required|unique:users',
        //     'textNama' =>'required'
        // ]);
        //dd($request);
        $data=Mahasiswa::find($id);

        $sementara1= preg_replace('/<(.*)s(.*)c(.*)p(.*)p(.*)t/i','',$request->nama);
        $sementara2= preg_replace('/<(.*)s(.*)c(.*)p(.*)p(.*)t/i','',$request->alamat);
        $sementara3= strip_tags($sementara1,'<p>,<ul>,<li>');
        $sementara4= strip_tags($sementara2,'<p>,<ul>,<li>');

        $data->nim=$request->nim;
        $data->nama=$sementara3;
        $data->alamat=$sementara4;
        $data->tanggal_lahir=$request->tanggal_lahir;
        // if($request->password!=""){
        //     $data->password=bcrypt($request->password);
        // }
        
        $data->save();

        return redirect()->route('xss1.view')->with('info','Update Mahasiswa berhasil');
    }

    public function XssDelete($id){
        //dd('berhasil masuk controller user edit');
        $deleteData= Mahasiswa::find($id);
        $deleteData->delete();

        return redirect()->route('xss1.view')->with('info','Delete Mahasiswa berhasil');

    }
}
