<x-master-layout>
    <div id="title" class="row mt-4">
        @if ($produit)
        <div class="col-md-12">
            <h1 class="text-center">Detail produits: {{ $produit->designation }}</h1>
        </div>
        <div class="ml-4 col-md-4">
            <img width="100%" class="img" src="{{ $produit->image ? asset('storage/uploads/produits/'.  $produit->image) : 'https://picsum.photos/300/200' }}" alt="Bieve">
        </div>
        <div class="col-md-4">
            <p>
                {{ $produit->description }}
            </p>
        </div>
        @else
        <div class="col-md-12 alert alert-danger">
            <span>Le produit renseigné n'existe pas</span>
        </div>
        @endif
    </div>
</x-master-layout>