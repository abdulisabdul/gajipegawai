<?php

namespace Database\Seeders;

use App\Models\MasterDivisi;
use App\Models\MasterKantor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterKantor::create([
            'kode_kantor' => 'kode_kantor',
            'nama_kantor' => 'nama_kantor'
        ]);

        MasterDivisi::create([
            'kode_divisi' => 'IT',
            'nama_divisi' => 'IT'
        ])->listPegawai()->create([
            'nip' => '123',
            'nama_pegawai' => 'Fatimah',
            'jenis_kelamin' => 'L',
            'jabatan_id' => 1,
            'kantor_id' => 1

        ]);
    }
}
