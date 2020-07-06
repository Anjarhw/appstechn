<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;

$factory->define(\App\Employees::class, function (Faker $faker) {
    return [
        'nip' => $faker->numerify('NIP###'),
        'name' => $faker->name,
        'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
        'tanggal_lahir' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'email' => $faker->email,
        'photo' => '',
        'jenis_kelamin' => $faker->randomElement(['L', 'P']),
        'alamat' => $faker->address,
        'tugas_id' => 1,
        'user_id' => 1,
    ];
});
