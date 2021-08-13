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

    <div class="form-group">
      <label for="description">Description</label>
       <textarea class="form-control @error('body') is-invalid @enderror" name="description" id="description" rows="5" value="{{old('description')}}"></textarea>
   </div>

   <div class="form-group">
     <label for="category_id">Categories</label>
     <select class="form-control" name="category_id" id="category_id">
       <option selected disabled>Select a Category</option>
       
        @foreach($categories as $category)

          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach

     </select>
   </div>


      <div class="form-group"> 
        <label for="image">Cover Image</label>   
        <input type="file" name="image" id="image">
      </div>
      @error('image')
      <div class="alert alert danger">
        {{ $message }}
      </div>
      @enderror
   <div class="form-group">
      <label for="">Date</label>
      <input type="text" name="date" id="date" class="form-control" placeholder="Add a date" aria-describedby="titleHelper" value="{{old('date')}}">
      <small id="titleHelper" class="text-muted">Insert a date for the current post</small>
    </div>

   <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

