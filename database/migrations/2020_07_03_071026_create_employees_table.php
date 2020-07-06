<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nip')->unique();
            $table->string('name', 100);
            $table->string('status', 50);
            $table->datetime('tanggal_lahir');
            $table->string('email');
            $table->string('photo', 100)->nullable()->constrained();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat', 200)->nullable()->constrained();
            $table->unsignedInteger('tugas_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Schema::table('employees', function ($table) {
        //     $table->foreign('id_user')->references('id')->on('users');
        //     $table->foreign('id_tugas')->references('id_tugas')->on('tasks');
        // });
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
