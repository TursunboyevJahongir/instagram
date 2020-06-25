@extends('layouts.app')

@section('content')
    <div class="card" >
        <img src="{{$post->image}}" class="card-img-top" alt="..." >
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <p class="card-text list-group-item">{{$post->description}}</p>
        </ul>
        <div class="card-body">
            <button onclick="history.go(-1);">Back </button>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
@endsection
