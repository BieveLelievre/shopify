<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory(5)->has(Produit::factory(2))->create();
        Category::create([
            'libelle' => 'Sac',
            'description' => 'sac à main'
        ]);

        Category::create([
            'libelle' => 'Vetement',
            'description' => 'vetements',
        ]);

        Category::create([
            'libelle' => 'Mobilier',
            'description' => 'desc donkounou',
        ]);
    }
}
