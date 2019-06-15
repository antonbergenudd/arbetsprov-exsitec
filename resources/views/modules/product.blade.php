<div class="product" style="display:flex; justify-content: space-between; align-items: center; margin:1rem 0;">
    {{-- Remove product --}}
    <button class="hide" type="button" data-edit-stock-button="true" data-toggle="modal" data-target="#remove-product-{{$product->id}}" style="border:none; background-color:none; color:red; height:100%;">
        Ta bort
    </button>

    {{-- Remove product modal --}}
    @include('modals.product-remove')

    {{-- Product name --}}
    <p style="margin:0;">{{ $product->name }}</p>

    {{-- Product balance --}}
    <p style="margin:0;">{{ $product->pivot->balance }} st</p>
</div>
