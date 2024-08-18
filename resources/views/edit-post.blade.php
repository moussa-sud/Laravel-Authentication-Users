@extends('layout')
@section('content')
    

    



<div class="p-3">
    
    <form action="/edit-post/{{$post->id}}" method="post">
        @csrf
        @method('PUT')
       
    

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1"  value="{{$post->title}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body" >{{$post->body}}</textarea>
      </div>

      <button type="submit" class="btn btn-info">UPDATE</button>
    </form>


</div>

@endsection('content')