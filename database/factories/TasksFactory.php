<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;

$factory->define(\App\Tasks::class, function (Faker $faker) {
    return [
        'nama_tugas' => $faker->randomElement(['Front End', 'Desainer', 'Back end', 'IT Support', 'Sales']),
        'status_pekerjaan' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
        'tanggal_mulai' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'tanggal_akhir' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'pic_karyawan' => $faker->name,
        'keterangan' => $faker->randomElement(['Pemerintah', 'Non pemerintah']),
    ];
});
