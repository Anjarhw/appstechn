<?php

use App\Employees;
use App\User;
use Illuminate\Support\Facades\DB;

function jumlahTotalPegawai()
{
    // $employees = Employees::count();
    return Employees::count();
}
