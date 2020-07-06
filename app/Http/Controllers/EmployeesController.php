<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Employees;
use App\User;
use App\Tasks;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        // $dataemployees = \App\Employees::all();
        $dataemployees = DB::table('employees')
            ->select('employees.id', 'employees.nip', 'employees.name', 'employees.status', 'employees.tanggal_lahir', 'employees.email', 'employees.photo', 'employees.jenis_kelamin', 'employees.alamat', 'tasks.nama_tugas')
            ->join('tasks', 'tasks.id', '=', 'employees.tugas_id')
            ->get();

        $tasks = DB::table('tasks')
            ->select('tasks.id', 'tasks.nama_tugas')
            ->get();
        $selectedIdTasks = \App\Tasks::first()->id_tugas;

        return view('employees.index', compact(['dataemployees', 'tasks', 'selectedIdTasks']));
    }

    public function create(Request $request, Employees $employees)
    {
        // dd($request->all());

        $user = new \App\User;
        $user->role = 'pegawai';
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        // dd($user);
        $user->save();

        // $request->request->add(['user_id' => $user->id])
        // dd($user);
        $requestid = $user->id;

        $request->nip = 'NIP' . $request->nip;
        $employees->user_id = $requestid;
        $employees->nip = $request->nip;
        $employees->name = $request->name;
        $employees->status = $request->status;
        $employees->tanggal_lahir = $request->tanggal_lahir;
        $employees->email = $request->email;
        $employees->jenis_kelamin = $request->jenis_kelamin;
        $employees->alamat = $request->alamat;
        $employees->tugas_id = $request->tugas_id;

        $employees->save();
        // dd('NIP' . $request->nip);
        // dd($employees);
        if ($request->hasFile('photo')) {
            $request->file('photo')->move('images/', $request->file('photo')->getClientOriginalName());
            $employees->photo = $request->file('photo')->getClientOriginalName();
            $employees->save();
        }
        return redirect('/employees')->with('sukses', 'Data berhasil diinput');
    }
    public function edit(Employees $employees, User $user)
    {
        // return view('employees.edit', compact(['Employees']));
        // dd($employees);
        // dd($employees->alamat);
        // dd($employees);
        $date = $employees->tanggal_lahir->format('Y-m-d');
        $tasks = DB::table('tasks')
            ->select('tasks.id', 'tasks.nama_tugas')
            ->get();
        $selectedIdTasks = \App\Tasks::first()->id;
        $takerole = DB::table('users')
            ->select('users.role', 'users.username')
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->where('users.id', $employees->user_id)
            ->first();
        // $takerole = $user->role;
        return view('employees/edit', compact(['employees', 'date', 'tasks', 'selectedIdTasks', 'takerole']));
    }
    public function update(Request $request, Employees $employees, User $user)
    {
        // dd($request);
        $employees->nip = $request->nip;
        $employees->name = $request->name;
        $employees->status = $request->status;
        $employees->tanggal_lahir = $request->tanggal_lahir;
        $employees->email = $request->email;
        $employees->jenis_kelamin = $request->jenis_kelamin;
        $employees->alamat = $request->alamat;
        $employees->tugas_id = $request->tugas_id;
        // dd($request->tugas_id);
        if ($request->hasFile('photo')) {
            $request->file('photo')->move('images/', $request->file('photo')->getClientOriginalName());
            $employees->photo = $request->file('photo')->getClientOriginalName();
            $employees->save();
        }
        $employees->update();
        // dd($employees);

        $user->id = $employees->user_id;
        // dd($user->id, $request->role);
        $user = DB::table('users')
            ->where('id', $user->id)
            ->update(['role' => $request->role]);
        // dd($user);
        return redirect('/employees')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete(Employees $employees)
    {
        // dd($employees);
        $employees->delete($employees);
        return redirect('/employees')->with('sukses', 'Data berhasil dihapus');
    }
}
