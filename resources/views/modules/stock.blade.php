
<div class="col-md-4 stock" style="padding:2rem; display:flex;">
    <div style="width:calc(100% - 2rem);">
        {{-- Stock title --}}
        <h3 data-edit-stock-button="true">{{ $stock->city }}</h3>

        {{-- Edit stock --}}
        <form style="margin-bottom:1rem;" data-edit-stock-button="true" class="hide" action="{{ route('stock.edit', ['stock' => $stock->id])}}" method="post">
            {{ csrf_field() }}
            <input type="text" name="city" value="{{$stock->city}}" style="border:none; border-bottom:1px solid rgba(0,0,0,.3); color:#636b6f; width:50%; font-size:15pt;" required>
            <button class="link-color" type="submit" name="button" style="background-color:none; border:none">Ändra</button>
        </form>

        {{-- Remove stock --}}
        <form class="hide" data-edit-stock-button="true" action="{{ route('stock.remove', ['stock' => $stock->id])}}" method="post">
            {{ csrf_field() }}
            <button type="submit" style="background-color:none; border:none; color:red;">Ta bort</button>
        </form>

        <hr>

        {{-- Buttons --}}
        <div style="display:flex; justify-content:space-between;">
            <a data-edit-stock-button="true" href="{{ route('history', ['stock' => $stock->id]) }}">Historik</a>
            <p style="margin:0;" data-edit-stock-button="true" class="hide"></p>
            <p class="link-color" style="margin:0; cursor:pointer;" data-edit-stock="true">Edit</p>
        </div>

        <hr>

        <div style="display:flex; justify-content:space-between;">
            <p style="margin:0;"><b>Produkt</b></p>
            <p style="margin:0;"><b>Antal</b></p>
        </div>


        {{-- Products --}}
        @if($stock->products->count())
            @foreach($stock->products as $product)
                @include('modules.product')
            @endforeach
        @else
            <p data-edit-stock-button="true" style="text-align:center;">Inga tillagda produkter</p>
        @endif

        {{-- Add product --}}
        <button class="hide link-color" style="border:none; background-color:none;" data-edit-stock-button="true" type="button" data-toggle="modal" data-target="#stock-modal-{{$stock->id}}">
          <i class="fas fa-plus" style="margin-right:.5rem;"></i>Lägg till produkt
        </button>

        {{-- Add product modal --}}
        @include('modals.product-existing')
    </div>

    {{-- TODO: Hide on mobile --}}
    <div class="stock_divider"></div>
</div>
