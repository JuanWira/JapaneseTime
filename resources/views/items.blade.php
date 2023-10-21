
@extends('layouts.main')
@section('container')
<div class="second-content">
        <div class="row-auto">
            <div class="container" style="margin-top: 11rem">
                @if( $title  != 'All Items')
                    <a href="/categories" class="backs mx-3"><i class="bi bi-caret-left"></i>Back to Collection</a>
                @endif
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="/items">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            <div class="input-group mb-3" style="height: 4.2rem;">
                                <input type="text" class="form-control" placeholder="Search item" name="search" value="{{ request('search') }}" style="height: 4.2rem; font-size: 1.1rem; padding:1.3rem">
                                <button class="btn btn-primary" style="font-size: 1.1rem" type="submit">Search</button>
                              </div>
                        </form>
                    </div>
                </div>
                <h3 class="cat-item text-uppercase text-center">{{ $title }}</h3>
                @if ($items->count())
                    @foreach ($items as $item)
                        <div class="col-md-2 mt-5 mb-5">
                            <a href="#myModal{{ $item->id }}" data-toggle="modal" class="cat" style="text-decoration: none">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('storage/' .$item->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <div class="card-text">{{ $item->title }}</div>
                                    <p class="card-text-subb text-muted mt-2">Rp. {{ $item->price }}</p>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="row justify-content-center my-5">
                        <div class="col-md-4">
                            <div class="card mar">
                                <h1 class="h4 mb-3 fw-normal text-center text-white mt-3 mb-5">There is nothing here, go check again later</h1>
                                <img class="category-img mx-auto d-block" src="assets/img/chibi.png" alt="cute">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center mb-5 mt-2">{{ $items->links() }}</div>
        </div>
</div>
@foreach ($items as $item)
        <div class="modal" tabindex="-1" role="dialog" id="myModal{{ $item->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $item->title }}</h5>
                    </div>
                <div class="modal-body">
                    <img class="modal-img" src="{{ asset('storage/' .$item->image) }}" alt="Card image cap">
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-center btn-lg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection