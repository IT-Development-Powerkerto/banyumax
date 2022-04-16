@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-8">
            <h2>{{$post->title}}</h2>
            <a href="/dashboard/blog" class="btn btn-success"><span data-feather="arrow-left"></span> Back to My Post</a>
            <a href="/dashboard/blog/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/blog/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger d-line" onclick="return confirm('Are you sure?')"><span data-feather="trash"></span> Delete</button>
            </form>
            @if($post->image)
            <div style="max-height:350px; overflow:hidden;">
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @endif
            <article class="my-3 fs-5">                
                {!! $post->body !!}
            </article>
        
    </div>
</div>
@endsection