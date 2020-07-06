<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\NotifRegistrasi;

use App\Employees;
use App\User;

class SiteController extends Controller
{
    public function home()
    {
        return view('sites.home');
    }
    public function register()
    {
        return view('sites.register');
    }
    public function postregister(Request $request, User $user)
    {
        //validasi dahulu 
        // $this->validate($request, [
        //     'nama'    => 'required|min:5',
        //     'username' => 'required|min:5',
        //     'email'         => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);
        // dd($request);

        $user = new \App\User;
        $user->role = 'pegawai';
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        \Mail::to($user->email)->send(new NotifRegistrasi);
        // dd($mhsiswa);
        // insert to table Siswa
        // $request->request->add(['user_id' => $user->id]);
        // $employees = \App\Employees::create($request->all());


        $employees = new \App\Employees;
        $employees->nip = $user->id;
        $employees->name = $request->name;
        $employees->status = 'Tidak Aktif';
        $employees->tanggal_lahir = now();
        $employees->email = $request->email;
        $employees->photo = '';
        $employees->jenis_kelamin = 'L';
        $employees->alamat = 'alamat';
        $employees->tugas_id = 0;
        $employees->user_id = $user->id;
        $employees->save();

        // dd($mhsiswa);
        return redirect('/login')->with('sukses', 'Data pendaftaran berhasil dikirim');
    }
}
