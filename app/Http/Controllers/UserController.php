<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        //mengambil data darri database menggunakan db::table() dan disimpan ke dalam $data
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array

        //diakhir first() jika hanya satu data yang diambil

        $data = DB::table('Users')
                ->get();

        //tampilkan view barang dan kirim datanya ke view tersebut
        return view('Admin.index')->with('data', $data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create (){

        return view('Admin.create');

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'role' => 'required'
        ]);

        DB::table('Users')->insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'remember_token' => Str::random(60),
        ]);

        return redirect()->route('users.index');

    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $data = User::findOrFail($id);
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('Admin.edit',['data' => $data]);

    }


public function update(Request $request, $id){

    $data = User::findOrFail($id);
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username,'.$data->id,
        'password' => 'nullable',
        'role' => 'required'
    ]);
    if ($request->password != null) {
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
    }else{
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ]);
    }


    return redirect()->route('users.index');

}

    public function destroy($id){
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('Users')->where('id',$id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect()->route('users.index');
    }

}
