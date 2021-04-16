
    <form action="{{ route('produits.destroy', $produit->id) }}" method="post">
        <div class="modal-body">
            @csrf
            @method('DELETE')
            <h5>Etes-vous sur de vouloir supprimer le produit &laquo;{{ $produit->designation }}&raquo; ?</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-danger">Oui</button>
        </div>
    </form>
