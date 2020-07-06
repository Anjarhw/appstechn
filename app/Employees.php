<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    // protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['nip', 'name', 'status', 'tanggal_lahir', 'email', 'photo', 'jenis_kelamin', 'alamat', 'tugas_id', 'user_id'];
    protected $dates = ['tanggal_lahir', 'created_at', 'update_at'];

    public function getPhoto()
    {
        if (!$this->photo) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->photo);
    }

    public function task()
    {
        return $this->hasMany(Tasks::class);
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }
}
