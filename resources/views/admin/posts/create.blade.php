@extends('layouts.admin')



@section('content')
<h1>create new Post</h1>

<form action="{{route('admin.posts.store')}}" method="post">
    @csfr

    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="Add a title" aria-describedby="titleHelper" value="{{old('title')}}">
      <small id="titleHelper" class="text-muted">Insert a title for the current post, max: 255 char</small>
    </div>

    <div class="form-group">
      <label for="image"></label>
      <input type="text" name="image" id="image" class="form-control" placeholder="https://" aria-describedby="imageHelper" value="{{old('image')}}>
      <small id="imageHelper" class="text-muted">Insert an image url for the currente post, max 255 char</small>
    </div>

   <div class="form-group">
     <label for="">Body</label>
     <textarea class="form-control" name="description" id="description" rows="4"></textarea>
   </div>

   <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection