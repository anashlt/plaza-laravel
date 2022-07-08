@extends('layouts.app')

@section('title',  $ad->title)

@section('content')
<div class="container">
@include('components.search-bar')

    <div class="adsContainer">
        <div class="row"> 
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $ad->category->slug }}">{{ $ad->category->name }}</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $ad->category->slug }}/city/{{ $ad->city->slug }}">{{ $ad->city->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $ad->title }}</li>
                </ol>
            </nav>     
        </div>
        <div class="row">
            <div class="col-md-8 bg-white">
                <div style="padding:10px">
                    <div id="custCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $ad->avatar }}" class="d-block w-100" alt="{{ $ad->title }}">
                            </div>
                            @foreach($ad->pictures as $picture)
                            <div class="carousel-item">
                                <img src="{{ $picture->path }}" class="d-block w-100" alt="{{ $ad->title }}">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#custCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#custCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-bs-slide-to="0" data-bs-target="#custCarousel">
                            <img src="{{ $ad->avatar }}" class="img-fluid">
                            </a>
                        </li>
                        
                        @foreach($ad->pictures as $k => $picture)
                            <li class="list-inline-item">
                                <a id="carousel-selector-{{$k+1}}" data-bs-slide-to="{{$k+1}}" data-bs-target="#custCarousel">
                                <img src="{{ $picture->path }}" class="img-fluid">
                                </a>
                            </li>
                        @endforeach
                        </ol>
                    </div>
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

@section('customcss')
<style>
.carousel-inner img {
      width: 100%;
      height: 100%;
  }

#custCarousel .carousel-indicators {
    position: static;
    margin-top:20px;
}

#custCarousel .carousel-indicators > li {
  width:100px;
}

 #custCarousel .carousel-indicators li img {
    display: block;
    opacity: 0.5;
 }

  #custCarousel .carousel-indicators li.active img {
    opacity: 1;
  }

  #custCarousel .carousel-indicators li:hover img {
    opacity: 0.75;
  }

  .carousel-item img{

    width:80%;
  }
  </style>
@endsection