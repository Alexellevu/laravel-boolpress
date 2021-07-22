@extends('layouts.admin')

@section('content')
<div class="table-responsive">
   <table class="table table-hover">
       <thead>
           <tr>
               <th>ID</th>
               <th>Title</th>
               <th>description</th>
               <th>image</th>
               <th>date</th>
           </tr>
       </thead>
       <tbody>
           @foreach($posts as $post)
           <tr>
               
               <td>{{$post->id}}</td>
               <td>{{$post->title}}</td>
               <td>{{$post->description}}</td>
               <td><img src="{{$post->image}}" alt="{{$post->title}}"></td>
               <td>{{$post->date}}</td>
               <td>View[edit] delete</td>
           </tr>
        @endforeach
       </tbody>
   </table>

</div>

@endsection
