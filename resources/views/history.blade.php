@extends('app')

@section('content')
<div class="container history" style="margin-top:5rem; margin-bottom:5rem;">
    <h1 style="margin-bottom:2rem;">{{$stock->city}}</h1>

    {{-- Buttons --}}
    <div style="display:flex; justify-content:space-between;">
        <a href="/">Tillbaka</a>
        {{-- <p class="link-color" style="cursor:pointer;" data-edit-log-button="true">Edit</p> --}}
    </div>

    <hr>

    <div class="" style="margin-bottom:2rem;">
        <h4>Antal produkter</h1>

        <div class="row">
            @foreach($stock->products as $product)
                <div class="col-lg-2 col-4">
                    <p>{{ $product->name }}</p>
                    <p><span class="@if($product->pivot->balance > 0) green @else red @endif">{{ $product->pivot->balance }}</span> st</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="">
        <h4>Historik</h1>
        <div class="row" style="display:flex;">
            <div style="padding:1rem; flex:1;">
                <p><b>Datum</b></p>
            </div>
            <div style="padding:1rem; flex:1;">
                <p><b>Produkt</b></p>
            </div>
            <div style="padding:1rem; flex:1;">
                <p><b>Saldo</b></p>
            </div>
            <div style="padding:1rem; flex:1;">
                <p><b>Inlagt av</b></p>
            </div>
            <div style="padding:1rem; flex:1;">
                <p><b>Anteckning</b></p>
            </div>

            <div class="hide" style="flex:1;" data-edit-log="true"></div>
        </div>

        @foreach($stock->logs()->sortByDesc('created_at')->sortByDesc('updated_at') as $log)
            <div class="row log" style="position:relative; display:flex; align-items:center;">
                <div style="padding:1rem; flex:1;">
                    <p>{{Carbon\Carbon::parse($log->created_at)->format('Y-m-d')}}</p>
                </div>
                <div style="padding:1rem; flex:1;">
                    @if(!isset($log->product->name))
                        {{dd($log)}}
                    @endif
                    <p>{{$log->product->name}}</p>
                </div>
                <div style="padding:1rem; flex:1;">
                    <p class="@if($log->quantity > 0) green @else red @endif">{{$log->quantity}}</p>
                </div>
                <div style="padding:1rem; flex:1;">
                    <p>{{$log->author}}</p>
                </div>
                <div style="padding:1rem; flex:1;">
                    @if(isset($log->note))
                        <p>{{$log->note}}</p>
                    @else
                        <p>N/A</p>
                    @endif
                </div>

                {{-- Remove log --}}
                <form style="flex:1;" class="hide" data-edit-log="true" action="{{ route('log.remove', ['log' => $log->id])}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" style="background-color:none; border:none;"><ion-icon style="color:red; cursor: pointer; font-size:15pt; line-height:3rem;" name="close"></ion-icon></button>
                </form>
            </div>
        @endforeach
    </div>
    <hr>
</div>
@endsection
