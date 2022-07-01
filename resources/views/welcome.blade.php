@extends('layouts.app')

@section('content')
<div class="searchBar">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="input-group input-group-lg mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-search"></i></span>
              </div>
              <input type="text" class="form-control bg-white w-50" placeholder="Search our database of ads..." aria-label="keyword" aria-describedby="basic-addon1">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="height: 100%"><i class="bi bi-geo-alt-fill"></i></span>
              </div>
              <input type="text" class="form-control bg-white" placeholder="City/Region" aria-label="keyword" aria-describedby="basic-addon1">
            </div>
          </div>
      </div>
  </div>
</div>

        <!-- Portfolio Section-->
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
@endsection
