<?php

namespace Database\Seeders;

use App\Models\MasterJabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterJabatan::insert([
            [
                'kode_jabatan' => 'DIR',
                'nama_jabatan' => 'DIREKTUR',
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            [
                'kode_jabatan' => 'DIRUT',
                'nama_jabatan' => 'DIREKTUR UTAMA',
                'created_at' =>now(),
                'updated_at' =>now(),
            ]
        ]);
    }
}
