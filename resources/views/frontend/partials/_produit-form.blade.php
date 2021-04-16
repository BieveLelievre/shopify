<div class="form-group">
    <label for="designation">Desgination</label>
    <input type="text" value="{{ old('designation') ?? $produit->designation }}" name="designation" id="designation" class="form-control" placeholder="designation" aria-describedby="helpId">
    @error('designation')
    <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
    
  </div>
  <div class="form-group">
      <label for="prix">Prix</label>
      <input type="number" value="{{ old('prix') ?? $produit->prix }}" name="prix" id="prix" class="form-control" placeholder="Prix" aria-describedby="helpId">
      @error('prix')
      <small id="helpId" class="text-danger">{{ $message }}</small>
      @enderror
      
  </div>
  <div class="form-group">
      <label for="category">Categorie</label>
      <select name="category_id" class="form-control" id="category">
          <option value=""></option>
         @foreach($categories as $categorie)
         <option {{ ($produit->category_id == $categorie->id OR old('category-id') == $categorie->id) ? 'selected' : '' }} value="{{ old('category_id') ?? $categorie->id }}">{{ $categorie->libelle }}</option>
         @endforeach
      </select>
      @error('category_id')
      <small id="helpId" class="text-danger">{{ $message }}</small>
      @enderror
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea  class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $produit->description }}</textarea>
    @error('description')
    <small id="helpId" class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="image-file">Image</label>
    <input type="file" class="form-control-file" name="image" accept="image/*" id="image-file" placeholder="" aria-describedby="fileHelpId">
    <small id="fileHelpId" class="form-text text-muted">Help text</small>
  </div>

  <button type="submit" class="btn btn-block btn-lg btn-primary">Ajouter</button>