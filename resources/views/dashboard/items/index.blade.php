@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Items</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-primary alert-dismissible col-lg-10" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-10 mb-3">
  <a href="/dashboard/items/create" class="btn btn-primary mb-3">Create new item</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @if($items->count())
        @foreach ($items as $item)
          <tr>
            <td class="pt-2 fontd">{{ $loop->iteration }}</td>
            <td class="pt-2 fontd">{{ $item->title }}</td>
            <td class="pt-2 fontd">{{ $item->price }}</td>
            <td class="pt-2 fontd">{{ $item->category->name }}</td>
            <td>
              <a href="/dashboard/items/{{ $item->slug }}" class="badge bg-success"><i class="bi bi-eye"></i></a>
              <a href="/dashboard/items/{{ $item->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil"></i></a>
              <form action="/dashboard/items/{{ $item->slug }}" method="POST" class="d-inline">
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
        <td>-</td>
        <td>-</td>
      @endif
      </tbody>
    </table>
  </div>
@endsection