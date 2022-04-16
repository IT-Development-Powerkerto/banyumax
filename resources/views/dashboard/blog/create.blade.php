@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>
<div class="col-lg-8"> 
    <form action="/dashboard/blog" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label @error('title') is-invalid @enderror">Title</label>
      <input type="text" class="form-control" id="title" name="title"  value="{{ old('title') }}" required autofocus>
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" disable readonly>
      </div>
    <div class="class mb-3">
        <label for="category" class="form-label @error('category_id') is-invalid @enderror">Category</label>
        <select class="form-select" name="category_id">
            <option selected></option>
                @foreach ($categories as $c)
                  @if(old('category_id') == $c->id)
                    <option value="{{ $c->id }}" selected>{{ $c->name }}</option> 
                  @else
                    <option value="{{ $c->id }}">{{ $c->name }}</option> 
                    @endif
                  @endforeach
          </select>
          @error('category_id')
             <p class="text-danger"> {{ $message }}</p>
          @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
    </div>
    <div class="class mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Create Post</button>
  </form>
</div>



@endsection