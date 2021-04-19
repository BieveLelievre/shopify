<x-master-layout>
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="height:100vh; background-size: cover; background-image: url(https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-0.3.5&s=c3d0603820b595592d80f5a239938c67&auto=format&fit=crop&w=1500&q=80);">
  
        <div class="container-fluid">
           <div class="row  justify-content-center align-items-center d-flex text-center h-100">
             <div class="col-12 col-md-8  h-50 ">
                 <h1 class="display-2  text-light mb-2 mt-5"><strong>Bienvenue sur Shopify</strong> </h1>
                 <p class="lead  text-light mb-5">Nos produits sont à des prix defiants toute concurrence</p>
                  <p>
                    <a href="{{ route('produits.index') }}" class="btn bg-danger shadow-lg btn-round text-light btn-lg btn-rised">Consulter nos produits</a>
                  </p>
             </div>
              
           </div>
         </div>
         </section>
         <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Nos derniers produits</h1>
                </div>
               {{--  <div class="col-md-12"> --}}
                    @foreach($produits as $produit)
                    <div class="col-md-4">
                        <div class="card text-left">
                          <img width="200" class="card-img-top" src="{{ $produit->image ? asset('storage/uploads/produits/'.  $produit->image) : 'https://picsum.photos/300/200' }}" alt="Bieve">
                          <div class="card-body">
                            <h4 class="card-title">{{ $produit -> designation }}</h4>
                            <p class="card-text">{{ $produit -> description }}</p>
                          </div>
                        </div>
                    </div>
                    @endforeach
                {{-- </div> --}}
            </div>
         </div>
         

</x-master-layout>