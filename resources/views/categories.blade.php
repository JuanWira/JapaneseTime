
@extends('layouts.main')
@section('container')
<div class="main-content">
        <div class="row-auto">
            <div class="container" style="margin-top: 11rem">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="/categories">
                            <div class="input-group mb-3" style="height: 4.2rem;">
                                <input type="text" class="form-control" placeholder="Search category" name="searchCategory" value="{{ request('searchCategory') }}" style="height: 4.2rem; font-size: 1.1rem; padding:1.3rem">
                                <button class="btn btn-primary" style="font-size: 1.1rem" type="submit">Search</button>
                              </div>
                        </form>
                    </div>
                </div>
                <h3 class="cat-item text-uppercase text-center">{{ $title }}</h3>
                @if ($categories->count())
                    @foreach ($categories as $category)
                        <div class="col-md-2 mt-5 mb-5">
                            <a href="/items?category={{ $category->slug }}" class="cat" style="text-decoration: none">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('storage/' .$category->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <div class="card-text">{{ $category->name }}</div>
                                    <p class="card-text-sub text-muted">{{ $category->name }}</p>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="row justify-content-center my-5">
                        <div class="col-md-4">
                            <div class="card mar">
                                <h1 class="h4 mb-3 fw-normal text-center text-white mt-3 mb-5">Sadly, there is nothing to see here</h1>
                                <img class="category-img mx-auto d-block" src="assets/img/sleep.png" alt="cute">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center mb-5 mt-2">{{ $categories->links() }}</div>
        </div>
</div>
@endsection






