<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('mitras')->onDelete('cascade');
            $table->string('nama_proyek');
            $table->integer('nominal');
            $table->text('deskripsi');
            $table->date('tgl_dibuka');
            $table->date('tgl_ditutup');
            $table->date('tgl_kembali');
            $table->enum('status',['diproses','rilis','selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyeks');
    }
}
