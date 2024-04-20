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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('roleId');
            $table->string('nip');
            $table->string('password');
            $table->string('nama');
            $table->string('ttl');
            $table->timestamps();
        });

        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->integer('roleId');
            $table->string('role');
            $table->timestamps();
        });

        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('satuanKerja');
            $table->string('golonganPangkat');
            $table->date('tmtGolongan');
            $table->date('tmtJabatan');
            $table->string('statusPegawai');
            $table->date('tmtPegawai');
            $table->integer('masaKerjaTahun');
            $table->integer('masaKerjaBulan');
            $table->timestamps();
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('role');
        Schema::dropIfExists('user_data');
        Schema::dropIfExists('sessions');
    }
    
};
