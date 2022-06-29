@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Posts</h1>
     </div> 

     <div class="row ">
        <div class="col-lg-8">
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control  @error('title') is-invalid  @enderror" id="title" name="title" required value="{{ old('title', $post->title) }}">

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control  @error('slug') is-invalid  @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                {{-- <option selected>Open this select menu</option> --}}
                    @foreach ($categories as $category)
                    @if (old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected> {{ $category->name }} </option>

                    @else 
                    <option value=" {{ $category->id }} ">{{ $category->name }}</option>
                    @endif
                        
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>

                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                
                <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

                @else

                <img class="img-preview img-fluid mb-3 col-sm-5">

                @endif

                


                <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" onchange="previewImage()">
                {{-- onchange="document.getElementByid('img-preview').src = window.URL.createObjectURL(this.files[0])" --}}

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>

                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body" ></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
        </div>
     </div>

     <script>
        .document.add.EventListener('trix-file-accept', function(e) {
            e.prevenDefault()
        })


        function previewImage() {
            ini ambil Class id image
            const image = document.querySelector('#image');

            // INI AMBIL TAG IMG CLASS IMG-PREVIEW
            const imgPreview = document.querySelector('.img-preview');
            
            // INI UBAH DISPALYNYA IMG YANG TADINYA INLINE MENJADI BLOCK
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = OFREvent.target.result;
            }

           
        }
     </script>
</main>
    
@endsection