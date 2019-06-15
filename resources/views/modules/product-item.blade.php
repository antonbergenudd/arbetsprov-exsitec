<div class="product row" style="margin:2rem 0; position:relative;">
    <p class="col-4" style="padding:0;" data-edit-products="true"><b>{{ $product->name }}</b></p>
    <p class="col-4" data-edit-products="true">{{$product->product_nr}}</p>
    <p class="col-4" data-edit-products="true">{{$product->price}} kr</p>

    <form class="hide row" action="{{ route('product.edit', ['product' => $product->id]) }}" method="post" data-edit-products="true" style="width:100%;">
        {{ csrf_field() }}
        <div class="col-4">
            <input name="name" type="text" class="form-control" value="{{$product->name}}">
        </div>

        <div class="col-4">
            <input name="product_nr" type="text" class="form-control" value="{{$product->product_nr}}">
        </div>

        <div class="col-4" style="display:flex;">
            <input name="price" type="number" class="form-control" value="{{$product->price}}">
            {{-- Update product / desktop --}}
            <button type="submit" name="button" style="margin-left:1rem; background-color:none; border:none;" class="link-color hide-mobile">Uppdatera</button>
        </div>

        {{-- Update product / mobile --}}
        <button type="submit" name="button" style="margin-left:1rem; background-color:none; border:none;" class="link-color show-mobile">Uppdatera</button>
    </form>

    {{-- Remove product / mobile --}}
    <form class="hide" data-edit-products="true" action="{{ route('product.remove.total', ['product' => $product->id])}}" method="post">
        {{ csrf_field() }}
        <button type="submit" class="show-mobile" style="background-color:none; border:none; color:red;">Ta bort</button>
    </form>

    {{-- Remove product / desktop --}}
    <form class="hide" data-edit-products="true" action="{{ route('product.remove.total', ['product' => $product->id])}}" method="post" style="position:absolute; right:-2rem; height:100%;">
        {{ csrf_field() }}
        <button type="submit" class="hide-mobile" style="background-color:none; border:none; color:red;">Ta bort</button>
    </form>
</div>
