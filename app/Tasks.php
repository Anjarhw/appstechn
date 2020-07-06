<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    protected $table = 'tasks';
    protected $fillable = ['kode', 'nama_tugas', 'status_pekerjaan', 'tanggal_mulai', 'tanggal_akhir', 'pic_karyawan', 'keterangan'];
    protected $dates = ['tanggal_mulai', 'tanggal_akhir', 'created_at', 'update_at'];

    public function employees()
    {
        //1 tasks Dimiliki 1 employees 
        return $this->hasOne(Employees::class);
    }
}
