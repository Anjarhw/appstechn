<?php

use App\Employees;

function jumlahTotalPegawai()
{
    // $employees = Employees::count();
    return Employees::count();;
}
