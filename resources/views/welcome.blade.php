@extends('layouts.app')

@section('content')

<div class="container">

@include('components.search-bar')
        <!-- Categories Section-->
        <section class="page-section portfolio bg-white pt-4" id="portfolio">
          <div class="container">
              <!-- Portfolio Section Heading-->
              <h4 class="page-section-heading text-center text-uppercase mb-0">Categories</h4>
              <!-- Portfolio Grid Items-->
              <div class="row justify-content-center pt-4">
                @foreach($categories as $category)
                <div class="col-md-2 col-lg-2 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                      <a href="/category/{{ $category->slug }}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="bi bi-plus"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ $category->icon }}" alt="..." />
                        <p class="text-center">{{ $category->name }}</p>
                      </a>
                    </div>
                </div>
                @endforeach
              </div>
          </div>
      </section>

</div>
@endsection
