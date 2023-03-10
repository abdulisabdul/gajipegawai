<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try{


        $it = User::create(array_merge([
            'name' => 'it',
             'email' => 'it@gmail.com',

        ], $default_user_value));

        $staff = User::create(array_merge([
            'name' => 'staff',
            'email' => 'staff@gmail.com',

        ], $default_user_value));

        $spv = User::create(array_merge([
            'name' => 'spv',
             'email' => 'spv@gmail.com',

        ], $default_user_value));

        $manager = User::create(array_merge([
            'name' => 'manager',
            'email' => 'manager@gmail.com',

        ], $default_user_value));

        $role_staff = Role::create(['name' => 'staff']);
        $role_spv = Role::create(['name' => 'spv']);
        $role_manager = Role::create(['name' => 'manager']);
        $role_it = Role::create(['name' => 'it']);

        $permission= Permission::create(['name' => 'read konfigurasi/roles']);
        $permission= Permission::create(['name' => 'create konfigurasi/roles']);
        $permission= Permission::create(['name' => 'update konfigurasi/roles']);
        $permission= Permission::create(['name' => 'delete konfigurasi/roles']);
        $permission= Permission::create(['name' => 'read konfigurasi/permissions']);
        //$permission= Permission::create(['name' => 'read transaksi/tes']);
        Permission::create((['name' => 'read konfigurasi']));

        $role_it->givePermissionTo('read konfigurasi/roles');
        $role_it->givePermissionTo('create konfigurasi/roles');
        $role_it->givePermissionTo('update konfigurasi/roles');
        $role_it->givePermissionTo('delete konfigurasi/roles', 'read konfigurasi' );


        $role_it->givePermissionTo('read konfigurasi/permissions');

        //$role_it->givePermissionTo('read transaksi/tes');


        $staff->assignRole('staff');
        $spv->assignRole('spv');
        $manager->assignRole('manager');
        $it->assignRole('it');

        DB::commit();
    }
    catch(\Throwable $th)
    {
        dd($th);
        DB::rollBack();

   }


    }
}
