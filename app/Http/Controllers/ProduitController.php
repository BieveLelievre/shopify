<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFormRequest;
use App\Mail\ProduitAjout;
use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use App\Notifications\ModificationProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produit::orderByDesc('id')->paginate(10);
        // dump($produits);
        // $produit = new Produit();
        // dump($produit);
        // $produit->designation = 'Livre';
        // $produit->description = 'Son imperial Bieve Lelievre';
        // $produit->prix = 1000;
        // $produit->save();
        // dump($produit);
        /* $produits500 = Produit::where('prix', '>', 500)->get();
        $produit1 = Produit::findOrFail(20);
        dump($produits500);
        dump($produit1); */
        return view("frontend.produits.index", [
            "produits" => $produits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $produit = new Produit;
        return view(('frontend.produits.create'), [
            'categories' => $categories,
            'produit' => $produit,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {
       /*  $request->validate([
            'designation' => 'required|min:5|max:25|unique:produits',
            'prix' => 'required|numeric|between:500,1000000',
            'description' => 'required|min:2|max:200',
            'category_id' => 'required|numeric'
        ]); */

        // dd($request);
        $imageName = null;

        if ($request->file('image')) {
            $imageName = time().'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/uploads/produits', $imageName);
        }

        // creation de session
        $request->session()->put('imageName', $imageName);

        $produit = Produit::create([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        $user = User::first();
        // dd($user);
        Mail::to($user)->send(new ProduitAjout);
        return redirect()->route('produits.index')->with('status', 'Votre produit ' . ($produit->designation) . ' a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($produit)
    {
        $prod = Produit::find($produit);
        return view('frontend.produits.detail', [
            'produit' => $prod
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Category::all();
        return view('frontend.produits.edit', [
            'produit' => $produit,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        /* $request->validate([
            'designation' => 'required|min:5|max:25|unique:produits,designation,'.$id,
            'prix' => 'required|numeric|between:500,1000000',
            'description' => 'required|min:2|max:200',
            'category_id' => 'required|numeric'
        ]); */
        Produit::where('id', $id)->update([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        $user = User::first();
        $user->notify(new ModificationProduit);

        return redirect()->route('produits.index')->with('status', 'Votre produit avec le id ' . ($id) . ' a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);
        return redirect()->route('produits.index')->with('status', 'Votre produit avec le id ' . ($id) . ' a bien été supprimé');
    }

    public function delete($id)
    {
        $produit = Produit::find($id);

        return view('frontend.produits.delete', compact('produit'));
    }
}
