<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produit::create([
            'designation' => 'Sac à main',
            'description' => 'decs sac à main',
            'prix' => 45000
        ]);

        Produit::create([
            'designation' => 'Ordinateur',
            'description' => 'desc ordi',
            'prix' => 350000
        ]);

        Produit::create([
            'designation' => 'Dounkounou',
            'description' => 'desc donkounou',
            'prix' => 50
        ]);
    }
}
