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
