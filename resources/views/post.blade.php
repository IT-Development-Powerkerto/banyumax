
@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
                <h2>{{$post->title}}</h2>
                <p>By <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?={{ $post->category->slug }}" class="text-decoration-none">{{  $post->category->name  }}</a> </p>
                @if($post->image)
                <img src="{{ asset('storage/'. $post->image) }}" width="100%" height="auto" alt="{{ $post->category->name }}" class="img-fluid">
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif
                <article class="my-3 fs-5">                
                    {!! $post->body !!}
                </article>
            
            <a href="/blog" class="d-block mt-3">Back to Posts</a>
        </div>
    </div>
</div>



@endsection