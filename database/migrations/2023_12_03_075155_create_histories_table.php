<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // Aksi
            $table->string('table_name'); // Nama Tabel
            $table->unsignedBigInteger('user_id'); // ID Pengguna
            $table->unsignedBigInteger('data_id'); // ID Data
            $table->timestamp('action_time'); // Waktu Aksi
            $table->timestamps();

            // Define foreign key relationships
            $table->foreign('user_id')->references('id')->on('users');
            // Jika Anda memiliki tabel data terkait, Anda dapat menambahkan foreign key untuk data_id juga.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
