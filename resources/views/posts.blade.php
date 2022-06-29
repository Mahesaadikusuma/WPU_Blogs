

@extends('layouts.main')

@section('container')
    
<h1 class="mt-5 text-center mb-3"> {{ $title }} </h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts" method="GET">

            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('author'))
                <input type="hidden" name="category" value="{{ request('author') }}">
            @endif

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit" >Search</button>
        </div>
        </form>
    </div>
</div>

<a href="/categories"  style="text-decoration: none; "><h5 class="mb-5">Post Categories</h5></a>

@if ($posts->count())
    <div class="card mb-3">
        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt=" {{ $posts[0]->category->name }} "> --}}

        @if ($posts[0]->image)
            <div class="text-center" style="max-height: 500px; overflow: hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" alt="
                {{ $posts[0]->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top text-center" alt="{{ $posts[0]->category->name }}">
            @endif

        <div class="card-body text-center">

            <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark" >{{$posts[0]->title}}</a> </h3>

            <p>
                <small class="text-muted">
                    By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none"> {{ $posts[0]->author->name }} </a> 
                    in 
                    <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                                {{-- INI UNTUK FUNGSI WAKTU POST YANG DIBUAT --}}
                    </a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>

            <p class="card-text"> {{$posts[0]->excerpt}} </p>

            <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">
                Read More
            </a>
            
        </div>
    </div>

    


    <div class="container">
        <div class="row">

            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                <div class="card">
                    
                    <div class="position-absolute  px-2 py-2 " style="background-color: rgba(0,0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>

                    {{-- <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt=" {{ $post->category->name}} "> --}}

                    @if ($post->image)
                    
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                    
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt=" {{ $post->category->name}} ">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>

                            <small class="text-muted">
                            By. <a href="/posts?author=/{{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }} </a> 

                                {{-- INI UNTUK FUNGSI WAKTU POST YANG DIBUAT --}}
                            </a> {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        
                    

                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>



     {{-- @foreach ($posts->skip(1) as $post)
         <article class="mb-5 border-bottom pb-5">
          <h2>
              <a href="/post/{{ $post->slug }} " class="text-decoration-none"> {{ $post->title }} </a> 
          </h2>

        <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none"> {{ $post->author->name }} </a> In 
            <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> 
                {{ $post->category->name }}
            </a>
        </p>

          <p>  {{ $post->excerpt }} </p>

          <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read More</a>
         </article>
     @endforeach --}}

    @else
        <p class="text-center fs-4">No post found</p>    
    @endif

         <div class="d-flex justify-content-end">
            {{ $posts->links() }}
         </div>
    
@endsection
     



