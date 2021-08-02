@extends('layouts.app')



@section('content')

<h1>Contacts</h1>

@if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{{session('message')}}</strong> 
    </div>
    
    <script>
      $(".alert").alert();
    </script>
@endif

<form action="{{route('contacts.send')}}" method="post" class="m-5">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Mario Rossi" aria-describedby="nameHelp" value="{{old('name')}}">
        <small id="nameHelp" class="text-muted">Type your name above</small>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="nome@exaple.it" aria-describedby="emailHelp" value="{{old('email')}}">
        <small id="emailHelp" class="text-muted">Type your email above</small>
    </div>
    <div class="form-group">
        <label for="message">Message Body</label>
        <textarea class="form-control" name="message" id="message" rows="5">{{old('message')}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-envelope-open fa-lg fa-fw"></i> Send</button>
</form>
@endsection