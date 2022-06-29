@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3 mt-4">{{ $post->title }} </h2>

            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> back to my post</a>

            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom"></span> edit</a>

            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
    
                <button class="btn btn-danger border-0" onclick="return confirm('Are You Sure')" ><span data-feather="trash" class="align-text-bottom "></span> Delete</button>
            </form>
            

            @if ($post->image)
            <div class="mt-5 text-center" style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-5 text-center" alt="{{ $post->category->name }}" >
            @endif

            
            
            
            
        <article class="my-3 fs-5">
            {!! $post->body !!} 

        </article>


        <a href="/dashboard/posts" class="d-block mt-3">Back to posts</a>
        </div>
    </div>
</div>
@endsection