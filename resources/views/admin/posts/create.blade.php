@extends('layouts.admin')



@section('content')
<h1>create new Post</h1>

@if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif


<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Add a title" aria-describedby="titleHelper" value="{{old('title')}}">
      <small id="titleHelper" class="text-muted">Insert a title for the current post, max: 255 char</small>
    </div>

<!--     <div class="form-group">
      <label for="image"></label>
      <input type="text" name="image" id="image" class="form-control" placeholder="https://" aria-describedby="imageHelper" value="{{old('image')}}">
      <small id="imageHelper" class="text-muted">Insert an image url for the currente post, max 255 char</small>
    </div>
 -->
    <div class="form-group">
      <label for="description">Description</label>
       <textarea class="form-control @error('body') is-invalid @enderror" name="description" id="description" rows="5" value="{{old('description')}}"></textarea>
   </div>

   <div class="form-group">
    <label for="cover">Cover Image</label>
    <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverImgHelper">
    <small id="coverImgHelper" class="form-text text-muted">Add a cover image</small>
    </div>
  @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

   <div class="form-group">
      <label for="">Date</label>
      <input type="text" name="date" id="date" class="form-control" placeholder="Add a date" aria-describedby="titleHelper" value="{{old('date')}}">
      <small id="titleHelper" class="text-muted">Insert a date for the current post</small>
    </div>

   <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

