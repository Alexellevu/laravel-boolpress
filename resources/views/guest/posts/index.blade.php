@extends('layouts.app')

@section('content')

@foreach($posts as $post)

    <div class="card">
        <div class="col-md-4">
            <h2>{{$post->title}}</h2>
            <img src="{{$post->image}}" alt="">
            <h5>{{$post->date}}</h5>
        </div>
    </div>

    <a href="{{route('posts.show', $post->id)}}">
            <i class="fas fa-eye fa-sm fa-fw"></i> View 
          </a>


@endforeach


@endsection