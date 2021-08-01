@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between">
    <h1>All posts</h1>
    <div >
        <a class="btn btn-primary" href=" {{route('admin.posts.create')}} ">Create new Post</a>

    </div>
</div>

<table class="table table-striped table-inverse ">
  <thead class="thead-inverse">
    <tr>
      <th>ID</th>
      <th>IMAGE</th>
      <th>TITLE</th>
      <th>ACTIONS</th>
    </tr>
    </thead>
    <tbody>
    
     @foreach($posts as $post)
       <tr>
        <td scope="row">{{$post->id}}</td>
        <td> <img width="200" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}"> </td>
        <td> {{$post->title}} </td>
        <td class="d-flex"> 
          <a href="{{route('admin.posts.show', $post->id)}}">
            <i class="fas fa-eye fa-sm fa-fw"></i> View 
          </a>
          <a href="{{ route('admin.posts.edit', $post->id)}}">
            <i class="fas fa-pencil-alt fa-sm fa-fw"></i> Edit 
          </a>
         
          <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn"><i class="fas fa-trash fa-xs fa-fw"></i></button>
          </form>

        </td>
      </tr>
     @endforeach
    </tbody>
</table>


@endsection
