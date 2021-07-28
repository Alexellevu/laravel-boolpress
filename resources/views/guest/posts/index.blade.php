@extends('layouts.app')

@section('content')

@foreach($posts as $post)

    <div class="card">
        <div class="col-md-4">
            <h2>{{$post->title}}</h2>
            
            <h5>{{$post->date}}</h5>
            <a href="{{route('posts.show', $post->id)}}"> <img src="{{$post->image}}" alt=""> </a>
          
       
    </div>

  


@endforeach


@endsection