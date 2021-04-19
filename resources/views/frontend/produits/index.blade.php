<x-master-layout>

    <div id="title" class="row">
        <div class="col-md-12">
            <h1 class="text-center">Liste des produits</h1>
        </div>
        <hr/>
    </div>
    
    <div class="container">
        <div class="row">
            @if(session('status'))
              <div class=" col-md-12 alert alert-success alert-dismissible my-4" role="alert">{{ session('status') }}</div>
           @endif
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <a href="{{ route('produits.create') }}" role='button' class="btn btn-primary float-right mb-2">
                        <i class="fas fa-plus"></i>{{ ' ' }}
                       <span>Creer un produit</span>
                    </a>
                </div>
                @if (count($produits))
                <div class="table-responsive">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Categorie</th>
                                <th>Prix</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produits as $produit)
                            <tr>
                                <td scope="row">{{ $produit->designation }}</td>
                                <td>
                                    {{ $produit->category ? $produit->category->libelle : 'Bieve Lelievre' }}</td>
                                    
                                <td>{{ $produit->prix }}</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="">
                                        <div class="btn-group flex-btn-group-container" role="group" aria-label="">
                                            <a role="button" href="{{ route('produits.show', $produit) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-eye"></i>
                                                <span class="d-none d-md-inline">Bieve</span></a>
                                            <a role="button" href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-edit"></i>
                                                <span class="d-none d-md-inline">Le</span>
                                            </a>
                                            {{--
                                             <a role="button" href="{{ route('produits.destroy', $produit->id) }}" class="btn btn-sm btn-danger" 
                                            onClick="event.preventDefault();
                                            if(confirm('Etes-vous sur de vouloir supprimer le produit &laquo;{{ $produit->designation }}&raquo; ?')) {
                                                document.getElementById({{ $produit->id }}).submit();
                                            }
                                              "><i class="fas fa-trash"></i>
                                                <span class="d-none d-md-inline">Lievre</span>
                                            </a> 
                                            <form id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy', $produit) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            --}}
                                            {{-- modal ajax works --}}
                                            {{-- <a role="button" href="{{ route('produits.delete', $produit->id) }}" class="btn btn-sm btn-danger text-white" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('produits.delete', $produit->id) }}" title="Delete produit">
                                                <i class="fas fa-trash"></i>
                                                <span class="d-none d-md-inline">Lievre</span>
                                            </a> --}}

                                            <a role="button" href="#" class="btn btn-sm btn-danger text-white" title="Delete produit" onClick="event.preventDefault(); suppressionConfirm({{ $produit->id }});">
                                                <i class="fas fa-trash"></i>
                                                <span class="d-none d-md-inline">Lievre</span>
                                            </a>
                                            <form id="{{ $produit->id }}" method="post" action="{{ route('produits.destroy', $produit) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="alert alert-warning">
                        <span>Nous n'avons aucun produit actuellement</span>
                    </div>
                @endif
               
            </div>
            <!-- small modal -->
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>
            <div class="col-md-12">
                <div class="d-flex justify-content-center mt-3">
                    {{ $produits->links() }}
            </div>
            </div>
        </div>
    </div>

   
        

</x-master-layout>