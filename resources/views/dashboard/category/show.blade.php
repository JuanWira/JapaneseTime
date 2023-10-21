@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <a href="/dashboard/categories" class="btn btn-secondary mx-2 mt-5"><i class="bi bi-caret-left"></i>Back to the list</a>
    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning mt-5"><i class="bi bi-pencil"></i> Edit</a>
    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger mx-2 mt-5" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
    </form>
    <h5 class="my-4 mx-2">{{ $category->name }}</h5>
    <img src="{{ asset('storage/' .$category->image) }}" class="das mx-2">
</div>

@endsection