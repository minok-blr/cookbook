@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div><h1 style="text-align: center">All posts</h1></div>
            <hr>
        </div>
    </div>

    <div class="row justify-content-center">
            <div class="btn-group" style="text-align: center; width: 20%">
                <a href="/p/create" class="btn btn-warning active">
                     Add new post
                </a>
            </div>
    </div>
    <br>

    <div class="row pt-2">
        @foreach($posts as $post)
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top pt-2" src="/storage/{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <p>Posted by: {{$post->user->name}}</p>
                    <a href="/p/{{$post->id}}" class="btn btn-warning">See full recipe</a>
                </div>
            </div>

<!--            <div class="col-3">
                <img src="/storage/{{$post->image}}" class="w-100">
                <p>{{$post->title}}</p>
                <p>{{$post->description}}</p>
                <p>Posted by: {{$post->user->name}}</p>
            </div>-->
        @endforeach
    </div>

</div>
@endsection
