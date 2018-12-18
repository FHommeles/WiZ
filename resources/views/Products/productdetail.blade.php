@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection

@section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col-5 shop-bar">
                <select class="form-control category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-5 shop-bar">
                <input type="search" class="form-control search" placeholder="Search" aria-label="Search" size="60" >
            </div>
            <div class="col-2 shop-bar addcol">
                <div class="addprod">
                    <a href="/overzicht/nieuw">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if ($productdetail > '')
        <div class="container">
            <br>
            <div class="row">
                <div class="col">
                    <h2 class="Producttitle">{{ $productdetail[0]->productomschrijving }}</h2>
                </div>
            </div>
            <hr id="userdetailline">
            <div class="row">
                <div class="col-6 detailimg">
                    <img src="{{ $productdetail[0]->imagelink }}" id="myImg" class="productImg img-fluid" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px"/>
                </div>
                <div class="userdetailverticalline"></div>
                <div class="col prodinformatie">
                    <br>
                    <b>Productcode:</b><br><br>
                    <b>Ingangsdatum:</b><br><br>
                    <b>GTIN product:</b><br><br>
                    <b>Fabikaat:</b><br><br>
                    <b>Productserie:</b><br><br>
                    <br><br>
                </div>
                <div class="col prodinformatie">
                    <br>
                    {{ $productdetail[0]->productcodefabrikant}} <br><br>
                    {{ $productdetail[0]->ingangsdatum }} <br><br>
                    {{ $productdetail[0]->GTIN }}  <br><br>
                    {{ $productdetail[0]->fabrikaat }} <br><br>
                    {{ $productdetail[0]->productserie }} <br><br>
                </div>
            </div>
        </div>
    @else 
        <div class="container">
            <br>
            <div class="row">
                <div class="col">
                    <h2 class="Producttitle">{{ $productdetail->productomschrijving }}</h2>
                </div>
            </div>
            <hr id="userdetailline">
            <div class="row">
                <div class="col-6">
                    <img src="{{ $productdetail->imagelink }}" id="myImg" class="productImg img-fluid" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px"/>
                </div>
                <div id="userdetailverticalline"></div>
                <div class="col">
                    <br>
                    <b>Productcode:</b><br><br>
                    <b>Ingangsdatum:</b><br><br>
                    <b>GTIN product:</b><br><br>
                    <b>Fabikaat:</b><br><br>
                    <b>Productserie:</b><br><br>
                    <br><br>
                </div>
                <div class="col">
                    <br>
                    {{ $productdetail->productcodefabrikant}} <br><br>
                    {{ $productdetail->ingangsdatum }} <br><br>
                    {{ $productdetail->GTIN }}  <br><br>
                    {{ $productdetail->fabrikaat }} <br><br>
                    {{ $productdetail->productserie }} <br><br>
                </div>
            </div>
        </div>
    @endif
    


@endsection