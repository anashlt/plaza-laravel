@extends('layouts.app')

@section('title',  'Post a new Ad')


@section('content')
<div class="container">
    <div class="adsContainer">
        <div class="row"> 
            <nav aria-label="breadcrumb" class="mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post a new ad</li>
                </ol>
            </nav>     
        </div>
        <div class="row">
            <div class="col-md-12 bg-white">
                <div style="padding:10px">
                    <h4><img src="/img/success.svg" alt="Hooray!" width=25 height=25> Thank you!</h4>
                    <p>Your ad has been submitted successfully and is currently under review. we will email you once it's visible. </p>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection
