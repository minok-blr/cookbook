@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="/storage/{{ $id->image }}" class="w-100">
                <div>
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $id->user->id }}">
                                    <span class="text-dark">{{ $id->user->name }}</span>
                                </a>
                                <!--                                <a href="#" class="pl-3">Follow</a>-->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p>Posted by:{{ $id->user->name }}</p>
                </div>
            </div>
            <div class="col-4">
                <h1>{{ $id->title }}</h1><br>
                <p class="pb-3">{{$id->description}} </p>

                <convert-button ings="{{$id->hasIngs}}"></convert-button>


<!--                <p>Ingredients needed:</p>
                    <ul>
                        @foreach($id->hasIngs as $ing)

                            <li>{{$ing->name}}, {{$ing->pivot->quantity}}{{$ing->pivot->unit}}</li>
                        @endforeach
                    </ul>-->
            </div>


        </div>
    </div>
@endsection
