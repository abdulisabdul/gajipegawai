<?php

use App\Models\MasterDivisi;
use App\Models\MasterJabatan;
use App\Models\MasterKantor;
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
        Schema::create((new MasterKantor())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('kode_kantor')->unique();
            $table->string('nama_kantor');
            $table->timestamps();
        });
        
        Schema::create('master_divisi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_divisi')->unique();
            $table->string('nama_divisi');
            $table->timestamps();
        });

        Schema::create('master_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama_pegawai');
            $table->string('jenis_kelamin');
            $table->foreignId('jabatan_id')->constrained((new MasterJabatan())->getTable());
            $table->foreignId('divisi_id')->constrained((new MasterDivisi())->getTable());
            $table->foreignId('kantor_id')->constrained((new MasterKantor())->getTable());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pegawai');
        Schema::dropIfExists('master_divisi');
    }
};
