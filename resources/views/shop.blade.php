@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection
@section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col order1 shop-bar">
                <form class="Sbar" action="/overzicht" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search product" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                
                <select class="form-control category" aria-label="Select category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col order-12 shop-bar addcol">
                <div class="addprod">
                    <a href="/overzicht/nieuw" aria-label="Nieuw product toevoegen">
                        <i class="far fa-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 mainshopprods">
            <h3>Onlangs toegevoegd:</h3>
            <div class="card-group">
                @if (isset($productsOTs))
                    @foreach ($productsOTs as $productsOT)
                        <div class="card">
                            <img class="card-img-top " src="{{$productsOT->imagelink}}" onerror=this.src="{{ url('/img/img-placeholder.png') }}" height="300px" width="300px">
                            <div class="card-body">
                                <a href="/overzicht/productdetail/{{$productsOT->productcodefabrikant}}" class="card-link"><h5 class="card-title">{{$productsOT->productomschrijving}}</h5></a>
                                <ul style="list-style-type:square">
                                    <li class="productinfoshopindex"><p >{{$productsOT->locatie}}</p></li>
                                    <li class="productinfoshopindex"><p>{{$productsOT->ingangsdatum}}</p></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else 
                <h1>not set</h1>
                @endif
            </div>
        </div>
        <div class="sidecols"></div>
        <div class="col eerderbekeken">
            <h3>Eerder bekeken</h3>
            <div class="main_EB">	
                <div class="app_top">
                        <img src="img/img-placeholder.png" width="150"/>
                    <span class="app_txt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</span>
                </div>
            </div>
            <div class="main_EB">	
                <div class="app_top">
                        <img src="img/img-placeholder.png" width="150"/>
                    <span class="app_txt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </span>
                </div>
            </div>
            <div class="main_EB">	
                <div class="app_top">
                        <img src="img/img-placeholder.png" width="150"/>
                    <span class="app_txt">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </span>
                </div>
            </div>
        </div>
        <div class="sidecols"></div>

    </div>
</div>

<div class="container-fluid bekijkook">
    <h3>Bekijk ook deze producten:</h3>
    <div class="row">
        @if (isset($bekijkook))
            @foreach ($bekijkook as $bekijk)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img class="card-img-top productdetailimage" src="{{ $bekijk->imagelink}}" alt="Card image cap" />
                        <div class="card-body">
                                <a href="/overzicht/productdetail/{{$productsOT->Productcode}}" class="card-link"><h5 class="card-title">{{ $bekijk->productomschrijving}}</h5></a>
                            <p class="card-text">If your canoe is stuck in a tree with the headlights on, how many pancakes does it take to get to the moon?</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else 
            <h1>not set</h1>
        @endif       
    </div>
</div>
@endsection