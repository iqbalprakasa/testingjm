<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('namapasien');
            $table->string('jeniskelamin')->nullable();
            $table->timestamp('tanggal_lahir')->nullable();
            $table->string('nohp')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('beratbadan')->nullable();
            $table->string('tekanandarah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
       ;
    }
};
