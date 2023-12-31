@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Category</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-primary alert-dismissible col-lg-7" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-7 mb-3">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @if($categories->count())
        @foreach ($categories as $category)
          <tr>
            <td class="pt-2 fontd">{{ $loop->iteration }}</td>
            <td class="pt-2 fontd">{{ $category->name }}</td>
            <td>
              <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-success"><i class="bi bi-eye"></i></a>
              <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>
              <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      @else
        <td>-</td>
        <td>-</td>
        <td>-</td>
      @endif
      </tbody>
    </table>
  </div>
@endsection