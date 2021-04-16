<x-master-layout>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Modifier un produit</h1>
        </div>
        <hr/>
    </div>
    <div class="container">
        <form method="post" action="{{ route('produits.update', $produit ) }}">
            @csrf
            @method('PUT')
            @include('frontend.partials._produit-form')
            
        </form>
    </div>
</x-master-layout>