@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Item</h1>
</div>

<div class="col-lg-6">
    <form method="POST" action="/dashboard/categories/{{ $category->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="hidden" name="oldImage" value="{{ $category->image }}">
            @if ($category->image)
                <img src="{{ asset('storage/' .$category->image) }}" class="img-fluid img-preview col-sm-5 mb-3 d-block">
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
        
        <button type="submit" class="btn btn-primary my-2">Update Category</button>
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