@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Item</h1>
</div>

<div class="col-lg-6">
    <form method="POST" action="/dashboard/items/{{ $item->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Item Name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title', $item->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="price" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price', $item->price) }}">
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
                    @if (old('category_id', $item->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
              </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Item Image</label>
            <input type="hidden" name="oldImage" value="{{ $item->image }}">
            @if ($item->image)
                <img src="{{ asset('storage/' .$item->image) }}" class="img-fluid img-preview col-sm-5 mb-3 d-block">
            @else
                <img class="img-fluid img-preview col-sm-5 mb-3">
            @endif
            
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        
        <button type="submit" class="btn btn-primary my-2">Update Item</button>
    </form>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    const title = document.querySelector('#title1');
    const slug = document.querySelector('#slug1');

    title.addEventListener('change', function(){
        fetch('/dashboard/items/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

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