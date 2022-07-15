@extends('layouts.admin')

@section('customcss')
<link href="/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ $post->avatar }}" alt="{{ $post->title }}">
        <div class="card-body">
            <p class="card-text">{{ $post->avatar }}</p>
        </div>
    </div>

    @foreach($post->pictures as $picture)
        <div>
            <img src="{{ $picture->path }}"  alt="{{ $post->title }}">
        </div>
    @endforeach

    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $post->title }}</h1> 
        <strong><a href="/admin/user/{{$post->user_id}}"> <i class="far fa-user"></i>  {{ \App\Models\User::find($post->user_id)->name }}</a></strong>
        <br><small><i class="far fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</small>
    </div>

    <form method="POST">
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_published" name="is_published" @if($post->is_published) checked="checked" @endif>
            <label class="form-check-label"><strong>is published?</strong><span class="text-danger">*</span></label>
        </div>
        <div class="form-group">
            <label>Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Post title" value="{{ $post->title }}">
        </div>
        <div class="form-group"> 
                <label for="city">City <span class="text-danger">*</span></label>
                    <select class="form-control" id="city" name="city" required> 
                        @foreach($cities as $city)    
                        <option value="{{ $city->id }}" @if($post->city_id === $city->id) selected @endif>{{ $city->name }}</option> 
                        @endforeach
                    </select>
        </div>
        <div class="form-group">
                <label for="category">Category <span class="text-danger">*</span></label>
                <select class="form-control" id="category" name="category" required>
                    @foreach($categories as $category)   
                    @if($category->parent_id == 0) 
                        <optgroup label="{{ $category->name }}"> 
                    @else 
                        <option value="{{ $category->id }}"  @if($post->category_id === $category->id) selected @endif>{{ $category->name }}</option> 
                    @endif
                    @endforeach
                </select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" step="0.1" class="form-control" id="price" placeholder="Post price (optional)" value="{{ $post->price }}">
        </div>
        <div class="form-group">
            <label>Description <span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" id="name">{{ $post->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <hr>
</div>
<!-- /.container-fluid -->
@endsection


@section('customjs')
<script src="/js/bootstrap-select.min.js"></script>
@endsection