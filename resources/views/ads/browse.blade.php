@extends('layouts.app')

@section('content')
<div class="container">
@include('components.search-bar')


    <div class="adsContainer">
        <div class="row"> 
            <h4>Latest ads</h4>  
        </div>
            @foreach($ads as $ad)
                <!-- <a href="/{{ $ad->city->slug }}/{{ $ad->category->slug }}/a/{{ $ad->slug }}" class="link-secondary" style="text-decoration:none">
                    <div class="post col-md-12">
                        <div class="card mt-2 position-relative">
                            <img class="card-img-top img-fluid" src="{{ asset($ad->avatar) }}" alt="{{ $ad->title }}">
                            <div class="card-body">
                                    <h5 class="card-title">{{ $ad->title }}</h5>
                                    <p class="card-text">{{ $ad->description }}</p>
                                    <p class="mt-4">
                                        <i class="bi bi-geo-alt-fill"></i> {{ $ad->city->name }} &nbsp;&nbsp;
                                        <i class="bi bi-calendar"></i> {{ $ad->created_at->diffForHumans() }}
                                    </p>
                                    <h5 class="fw-bold position-absolute top-0 end-0 mt-4 me-3">£ {{ number_format($ad->price) }}</h5>
                                    <p class="position-absolute bottom-0 end-0 me-3"><i class="bi bi-eye-fill"></i></p>
                            </div>
                        </div>
                    </div>
                </a> -->
                <a href="/{{ $ad->city->slug }}/{{ $ad->category->slug }}/a/{{ $ad->slug }}" class="link-secondary" style="text-decoration:none">
                    <div class="card mb-3" style="max-width: 100%">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="{{ asset($ad->avatar) }}" class="card-img postImg" alt="...">
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
            <hr class="my-4">
        
    </div>


    
</div>
@endsection
