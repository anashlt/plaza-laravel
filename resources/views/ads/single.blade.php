@extends('layouts.app')

@section('title',  $ad->title)

@section('content')
<div class="container">
  <div class="searchBar">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="input-group input-group-lg mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-search"></i></span>
              </div>
              <input type="text" class="form-control bg-white w-50" placeholder="Search our database of ads..." aria-label="keyword" aria-describedby="basic-addon1">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-geo-alt-fill"></i></span>
              </div>
              <input type="text" class="form-control bg-white" placeholder="City/Region" aria-label="keyword" aria-describedby="basic-addon1">
            </div>
          </div>
      </div>
  </div>


    <div class="adsContainer">
        <div class="row"> 
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $ad->category->slug }}">{{ $ad->category->name }}</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $ad->category->slug }}/city/{{ $ad->getCity->slug }}">{{ $ad->getCity->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $ad->title }}</li>
                </ol>
            </nav>     
        </div>
        <div class="row">
            <div class="col-md-8 bg-white">
                <div style="padding:10px">
                    <img src="{{ $ad->avatar }}" alt="{{ $ad->title }}" class="rounded mx-auto d-block img-fluid">    
                </div> 
            </div>
            <div class="col-md-4">
                <div class="bg-white" style="padding:10px">
                    <h4>{{ $ad->user->name }}</h4>
                    <h5>{{ $ad->user->phone }}</h5>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8 bg-white">
                <div style="padding:20px">
                    <h5>{{ $ad->created_at->diffForHumans() }}</h5>
                    <h3>{{ $ad->title }}</h3>
                    <p>{{ $ad->description }}</p>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection
