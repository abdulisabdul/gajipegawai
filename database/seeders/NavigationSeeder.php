<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $konfigurasi = Navigation::create([
            'name' => 'konfigurasi',
            'url' => 'konfigurasi',
            'icon' => 'ti-settings',
            'main_menu' => null,
        ]);
        $konfigurasi->subMenus()->create([
            'name' => 'Roles',
            'url' => 'konfigurasi/roles',
            'icon' => '',
            'main_menu' => 1,

        ]);
      
        $konfigurasi->subMenus()->create([
            'name' => 'Permissions',
            'url' => 'konfigurasi/permissions',
            'icon' => '',
            'main_menu' => 1,
        ]);

        $transaksi = Navigation::create([
            'name' => 'Transaksi',
            'url' => 'transaksi',
            'icon' => 'ti-book',
            'main_menu' => null,
        ]);
        $transaksi->subMenus()->create([
            'name' => 'Tes',
            'url' => 'transaksi/tes',
            'icon' => '',
            'main_menu' => 1,
        ]);
       
    }
}
