<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profil1 = Role::create([
            'profil' => 'user'
        ]);

        $profil2 = Role::create([
            'profil' => 'admin'
        ]);

        $profil3 = Role::create([
            'profil' => 'root'
        ]);

        $adminUser = User::create([
            'name' => 'User', 
            'email' => 'user@shopify.com',
            'password' => Hash::make('admin123'),
            'role_id' => $profil1->id
        ]);

        $adminUser = User::create([
            'name' => 'Admin', 
            'email' => 'admin@shopify.com',
            'password' => Hash::make('admin123'),
            'role_id' => $profil2->id
        ]);

        $rootUser = User::create([
            'name' => 'Root', 
            'email' => 'root@shopify.com',
            'password' => Hash::make('admin123'),
            'role_id' => $profil3->id
        ]);
    }
}
