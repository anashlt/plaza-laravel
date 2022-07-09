@extends('layouts.app')

@section('content')
<div class="container">
@include('components.search-bar')


    <div class="adsContainer">
        <div class="row justify-content-center"> 
          @if(count($ads) > 0)
            <h4>{{ $ads[0]->category->name }} ads</h4>
            @foreach($ads as $ad)
                <a href="/{{ $ad->city->slug }}/{{ $ad->category->slug }}/a/{{ $ad->slug }}" class="link-secondary" style="text-decoration:none">
                    <div class="card mb-3" style="max-width: 100%">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div id="carousel-{{$ad->id}}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carousel-{{$ad->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        @foreach($ad->pictures as $key => $picture)
                                        <button type="button" data-bs-target="#carousel-{{$ad->id}}" data-bs-slide-to="{{ $key+1 }}" aria-label="Slide {{ $key+1 }}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="{{ asset($ad->avatar) }}" class="card-img postImg d-block w-100" alt="...">
                                        </div>
                                        @foreach($ad->pictures as $picture)
                                        <div class="carousel-item">
                                            <img src="{{ $picture->path }}" class="card-img postImg d-block w-100" alt="{{ $ad->title }}">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{$ad->id}}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{$ad->id}}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $ad->title }}</h4>
                                <p class="card-text">{{ $ad->description }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="bi bi-geo-alt-fill"></i> {{ $ad->city->name }} &nbsp;&nbsp;
                                        <i class="bi bi-calendar"></i> {{ $ad->created_at->diffForHumans() }}
                                    </small>
                                    <span class="postPrice float-end">£ {{ number_format($ad->price) }}</span>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
          @else
          <h3 class="text-center">No ads available.</h3>
          @endif
        </div>
    </div>
</div>


@endsection
