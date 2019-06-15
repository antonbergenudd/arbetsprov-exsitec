@extends('app')

@section('content')
<div class="container" style="margin-top:2rem 0;">
    <h1 style="padding:2rem 0;">Päron AB - Lagersaldon</h1>

    <div class="stocks">
        <h1>Lager</h1>

        <hr>
        <div class="row">
            @foreach($stocks as $stock)
                @include('modules.stock')
            @endforeach

            {{-- Add stock --}}
            <button type="button" class="link-color" style="margin-left:1rem; border:none; background-color:none;" data-toggle="modal" data-target="#addStock">
                <i class="fas fa-plus" style="margin-right:.5rem;"></i>Lägg till lager
            </button>

            @include('modals.stock')
        </div>
        <hr>
    </div>

    <div class="products" style="margin:5rem 0;">
        {{-- Buttons --}}
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1>Produkter</h1>
            <p class="link-color" style="cursor:pointer; margin:0;" data-edit-products-button="true">Edit</p>
        </div>

        <hr>

        <div class="row">
            <h2 class="col-4">Namn</h2>

            <h2 class="col-4">Produkt nummer</h2>

            <h2 class="col-4">Pris</h2>
        </div>

        @foreach($products as $product)
            @include('modules.product-item')
        @endforeach

        {{-- Add product --}}
        <button class="link-color" style="border:none; background-color:none;" type="button" data-toggle="modal" data-target="#new-product">
          <i class="fas fa-plus" style="margin-right:.5rem;"></i>Lägg till produkt
        </button>

        {{-- Add product modal --}}
        @include('modals.product-new')

        <hr>
    </div>
</div>
@endsection
