@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Item</h1>
</div>

<div class="col-lg-6">
    <form method="POST" action="/dashboard/categories" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <img class="img-fluid img-preview col-sm-5 mb-3">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
        
        
        <button type="submit" class="btn btn-primary my-2">Create Category</button>
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