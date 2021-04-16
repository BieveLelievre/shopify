@component('mail::message')
# Ajout produit

Un nouveau produit a &eacute;t&eacute; ajout&eacute;.

@component('mail::button', ['url' => 'produits'])
Produit
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
