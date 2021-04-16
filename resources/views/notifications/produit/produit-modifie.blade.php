@component('mail::message')
# Introduction

Notification de modification de produit.

@component('mail::button', ['url' => 'produits'])
Produit
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
