@extends('layouts.app')

@section('content')
@include('components.search-bar')

    <div class="adsContainer">
        <div class="row justify-content-center"> 
            <h2>Latest ads</h2>   
            @foreach($ads as $ad)
                <a href="/{{ $ad->getCity->slug }}/{{ $ad->category->slug }}/a/{{ $ad->slug }}" class="link-secondary" style="text-decoration:none">
                    <div class="post col-md-12">
                        <div class="card mt-2 position-relative">
                            <img class="card-img-top" style="height:155px" src="{{ asset($ad->avatar) }}" alt="{{ $ad->title }}">
                            <div class="card-body">
                                    <h5 class="card-title">{{ $ad->title }}</h5>
                                    <p class="card-text">{{ $ad->description }}</p>
                                    <p class="mt-4">
                                        <i class="bi bi-geo-alt-fill"></i> {{ $ad->getCity->name }} &nbsp;&nbsp;
                                        <i class="bi bi-calendar"></i> {{ $ad->created_at->diffForHumans() }}
                                    </p>
                                    <h5 class="fw-bold position-absolute top-0 end-0 mt-4 me-3">£ {{ number_format($ad->price) }}</h5>
                                    <p class="position-absolute bottom-0 end-0 me-3"><i class="bi bi-heart"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            <hr class="my-4">
        </div>
    </div>
</div>


@endsection
