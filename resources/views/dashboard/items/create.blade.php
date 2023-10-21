@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Item</h1>
</div>

<div class="col-lg-6">
    <form method="POST" action="/dashboard/items" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Item Name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="price" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price') }}">
            @error('price')
                <div class="price">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Item Image</label>
            <img class="img-fluid img-preview col-sm-5 mb-3">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        
        
        <button type="submit" class="btn btn-primary my-2">Create Item</button>
    </form>
</div>
<script>
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    
</script>
@endsection