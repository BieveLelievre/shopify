<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /*  $this->call([
           CategorySeeder::class,
       ]); */

       // User::factory(5)->create();
       Category::factory(5)->has(Produit::factory(2))->create();
       $this->call([
        RoleSeeder::class,
    ]);
    }
}
