@extends('layouts.main')

@section('container')


<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3 mt-4">{{ $post->title }} </h2>

            <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"> 
            {{ $post->author->name }} 
            </a> In 

            <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none"> 
                {{ $post->category->name }}
            </a></p>

            {{-- <img src="https://source.unsplash.com/1200x400?
            {{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid"> --}}
            
            @if ($post->image)
            <div class="mt-5" style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-5" alt="{{ $post->category->name }}" >
            @endif

        {{-- fungsi ini {!!     !!} bisa untuk menambahakan tag html di dalamnya kalo ini tidak bisa {{  }} --}}
        <article class="my-3 fs-5">
            {!! $post->body !!} 

        </article>


        <a href="/posts" class="d-block mt-3">Back to posts</a>
        </div>
    </div>
</div>


@endsection