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
                    <h4>Post a new ad</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="createPostForm" method="post" action="/ads/post/create" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Your ad title goes here" maxlength="80" required>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Picture <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" multiple>
                        </div>
                        <div class="form-group"> 
                            <label for="city">City <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker show-tick" data-live-search="true" id="city" name="city" required> 
                                <option value="" selected disabled>Please select a city</option>
                            @foreach($cities as $city)    
                                <option value="{{ $city->id }}">{{ $city->name }}</option> 
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category <span class="text-danger">*</span></label>
                            <select class="form-control selectpicker show-tick" data-live-search="true" id="category" name="category" required>
                                <option value="" selected disabled>Please select a category</option>
                            @foreach($categories as $category)   
                                @if($category->parent_id == 0) 
                                <optgroup label="{{ $category->name }}"> 
                                @else 
                                <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="tel" class="form-control" id="price" name="price" placeholder="Your ad price">
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" maxlength="600" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Post Ad</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection

@section('customjs')
<script src="/js/bootstrap-select.min.js" defer></script>
@endsection

@section('customcss')
<link href="/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endsection