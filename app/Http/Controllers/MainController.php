<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function ajouterProduit() {
      $produit = Produit::create([
          'designation'=> 'Cahier',
          'description'=> 'Bieve Lelievre',
          'prix'=> 2000,
      ]);
      dump($produit);
    }

    public function updateProduit(Produit $produit) {
        // $produit = Produit::findOrFail($produit);
        dump($produit);
        $produit->designation = "Chemise";
        $produit->save();
        dd($produit);
    }

    public function upProd(int $id) {
        // $produit = Produit::findOrFail(2);
        // dump($produit);
        $res = Produit::where('id', $id)->update([
            'designation'=> 'Tricot'
        ]);

        dd($res);
    }

    public function delete(int $id) {
       $prod = Produit::destroy($id);
       dd($prod);
    }

    public function ajouterCategory() {
        $category = Category::create([
            'libelle'=> 'Vetement',
            'description'=> 'Bieve Lelievre'
        ]);

        $produit = Produit::create([
            'designation'=> 'Jupe',
            'description'=> 'Bieve Lelievre',
            'prix'=> 2000,
            'category_id' => $category->id
        ]);

        dump($category);
        dump($produit);
      }

    public function getProduit(Produit $produit) {

        $category = Category::first();
        dd($category, $category->produits);
        //dump($produit->category);

    }

    public function commandeProduit() {

        // $user = User::create([
        //     'name' => 'Bieve',
        //     'email' => 'bb@ghh.df',
        //     'password' => Hash::make('donkounou')
        // ]);

        $user = User::first();
        $produit1 = Produit::first();
        $produit2 = Produit::findOrFail(2);

        $user->produits()->sync($produit2);
        dd($user->produits);
        // $user->produits()->attach($produit2);


    }

    public function accueil() {
        $produits = Produit::orderByDesc('id')->take(9)->get();
        return view('welcome', ['produits' => $produits]);
    }

    public function createCollection() {
        $collection = collect([

        ]);

        dd($collection);
    }
}
