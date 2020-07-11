<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Tasks;
use App\Employees;
use App;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $datatasks = \App\Tasks::all();
        return view('tasks.index', compact(['datatasks']));
    }

    public function create(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'nama_tugas'    => 'required|min:5',
            'status_pekerjaan' => 'required|min:5',
        ]);
        $tasks = \App\Tasks::create($request->all());
        return redirect('/tasks')->with('sukses', 'Data berhasil diinput');
    }
    public function edit(Tasks $tasks)
    {
        // dd($tasks);
        $date = $tasks->tanggal_mulai;
        $date1 = $tasks->tanggal_akhir;
        // dd($date);
        // dd($date1);
        // ->format('Y-m-d');

        // Carbon\Carbon::parse($employees->tanggal_lahir)->format('d-m-Y')
        return view('tasks/edit', compact(['tasks', 'date', 'date1']));
    }
    public function update(Request $request, Tasks $tasks)
    {
        // dd($tasks);
        $tasks->update($request->all());
        return redirect('/tasks')->with('sukses', 'Data berhasil diupdate');
    }
    public function delete(Tasks $tasks)
    {
        $tasks->delete($tasks);
        return redirect('/tasks')->with('sukses', 'Data berhasil dihapus');
    }
    public function mytasks()
    {
        $datatasks = DB::table('employees')
            ->select('tasks.id', 'tasks.nama_tugas', 'tasks.status_pekerjaan', 'tasks.tanggal_mulai', 'tasks.tanggal_akhir', 'tasks.pic_karyawan', 'tasks.keterangan')
            ->join('tasks', 'tasks.id', '=', 'employees.tugas_id')
            ->where('employees.user_id', auth()->user()->id)
            ->get();
        // dd($datatasks);
        return view('tasks.my.index', compact(['datatasks']));
    }
}
