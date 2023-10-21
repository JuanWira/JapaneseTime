@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back, {{ auth()->user()->username }}</h1>
</div>
<div class="mb-3">
  <div>
    Admin can:
  </div>
  <div>
    1. Create new item and category
  </div>
  <div>
    2. Update existing item and category
  </div>
  <div>
    3. Delete existing item and category
  </div>
</div>
<div class="mb-3">
  <div>
    You can:
  </div>
  <div>
    1. Change the name of the item and category
  </div>
  <div>
    2. Change the category of the item
  </div>
  <div>
    3. Change the image of the item and category
  </div>
</div>
@endsection