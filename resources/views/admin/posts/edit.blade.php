@extends('layouts.admin')



@section('content')

<h1>Edit post</h1>
@if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data" >
  @csrf
 @method('PUT')
<div class="form-group">
  <label for="title">Title</label>
  <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelperr" placeholder="Add a title" value="{{$post->title}}">
  <small id="titleHelperr" class="form-text text-muted">Insert a title for the post, max 255 characters</small>
</div>  

<div class="form-group">
  <label for="image">Replace Cover Image</label>
  <img width="200" src="{{asset('storage/' . $post->image)}}" alt="">
  <input type="file" name="image" id="image">
</div>  

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="5">{{$post->description}}</textarea>
</div>

<div class="form-group">
      <label for="">Date</label>
      <input type="text" name="date" id="date" class="form-control" placeholder="Add a date" aria-describedby="titleHelper" value="{{old('date')}}">
      <small id="titleHelper" class="text-muted">{{$post->date}}</small>
    </div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection