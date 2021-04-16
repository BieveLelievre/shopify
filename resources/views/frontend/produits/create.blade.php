<x-master-layout>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Ajouter un nouveau produit</h1>
        </div>
        <hr/>
    </div>
    <div class="container">
        <form method="post" action="{{ route('produits.store') }}" enctype="multipart/form-data">
            @csrf
            @include('frontend.partials._produit-form')
            
        </form>
    </div>
</x-master-layout>