@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <a href="/dashboard/items" class="btn btn-secondary mx-2 mt-5"><i class="bi bi-caret-left"></i>Back to the list</a>
    <a href="/dashboard/items/{{ $item->slug }}/edit" class="btn btn-warning mt-5"><i class="bi bi-pencil"></i> Edit</a>
    <form action="/dashboard/items/{{ $item->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger mx-2 mt-5" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
    </form>
    <h5 class="mt-4 mb-2 mx-2">{{ $item->title }}</h5>
    <h6 class="mt-2 mb-4 mx-2">Category: {{ $item->category->name }}</h6>
    <h6 class="mt-2 mb-4 mx-2">Price: {{ $item->price }}</h6>
    <img src="{{ asset('storage/' .$item->image) }}" class="das mx-2">
</div>

@endsection