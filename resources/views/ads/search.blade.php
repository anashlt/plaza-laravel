@extends('layouts.app')

@section('content')
<div class="container">
@include('components.search-bar')


    <div class="adsContainer">
        <div class="row justify-content-center"> 
            <h4>{{request()->get('q')}} @if(request()->get('c')) in {{ request()->get('c') }} @endif results</h4>

            @if(count($ads) > 0)    
            @foreach($ads as $ad)
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
            @else

            <h3 class="text-center">No ads available.</h3>
            @endif

        </div>
    </div>
</div>


@endsection
