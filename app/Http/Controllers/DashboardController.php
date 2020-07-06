<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Employees;
use App;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $employees = \App\Employees::all();
        // for data pegawai aktif dan tugas aktif
        $employeestasks = DB::table('employees')
            ->select('employees.name', 'status', 'tasks.nama_tugas', 'keterangan')
            ->join('tasks', 'tasks.id', '=', 'employees.tugas_id')
            ->where('employees.status', 'Aktif')
            ->limit(5)
            ->get();
        // dd($employeestasks);
        // for data pegawai aktif saja
        $employees = DB::table('employees')
            ->select('name', 'status')
            ->where('employees.status', 'Aktif')
            ->get();
        // for chart
        $tasksaktif = DB::table('tasks')
            ->select('nama_tugas', 'status_pekerjaan')
            ->where('status_pekerjaan', 'Aktif')
            ->get();

        $status[0] = $employees->count();
        $status[1] = $tasksaktif->count();
        // dd($status);
        // dd($tasksaktif);

        $tasksaktifbar = DB::table('tasks')
            ->select('nama_tugas')
            ->where('status_pekerjaan', 'Aktif')
            ->groupby('nama_tugas')
            ->get();

        return view('Dashboard.index', compact(['employeestasks', 'employees', 'status', 'tasksaktifbar']));
    }
}
