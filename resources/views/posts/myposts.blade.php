@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div><h1 style="text-align: center">My posts</h1></div>
            <hr>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($posts as $post)
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top pt-2" src="/storage/{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <p>Posted by: {{$post->user->name}}</p>
                    <a href="/p/{{$post->id}}" class="btn btn-warning">See full recipe</a>
                    <form action="/p/{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="row pt-4">
                            <button class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
