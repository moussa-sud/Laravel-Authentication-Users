@extends('layout')
@section('content')
    

    


    @auth 

    {{-- It's typically used to show content that should only be --}}
    {{-- accessible to authenticated users. --}}
<br>
    <form action="/logout" method="POST" class="d-flex justify-content-end">
        @csrf
        <button style="margin-left: " type="submit" class="btn btn-secondary">تسجيل خروج</button>
    </form>




<div class='container p-5'>
    <form action="/create-post" method="POST">
        @csrf

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input id="exampleFormControlInput1" class="form-control"  type="text" name="title">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Text Area</label>
        <textarea name="body" class="form-control" placeholder="Content"  rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Add</button>

    </form>
</div>





<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                        <p><a href="/edit-post/{{ $post->id }}" class="card-link">Edit</a></p>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



    </span>



    @else

    <div class='container p-5'> 

    <form action="/register" method="POST">
        @csrf

        <div class="mb-3">
            <label for="exampleInputname" class="form-labe">Name</label>
            <input type="text"  name="name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input  name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>







    
 
    <div class='container p-5'>


    <form class="row g-3"  action="/login" method="POST">
        @csrf
        <div class="col-auto">
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="name@example.com">

        </div>
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Password</label>
            <input name="loginpassword"  type="password" class="form-control" id="inputPassword2" placeholder="Password">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
      </form>

    </div>


    
    @endauth



@endsection('content')