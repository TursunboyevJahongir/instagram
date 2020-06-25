@extends('layouts.app')

@section('content')
    <div class="card">
        <img src="{{$post->image}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <p class="card-text list-group-item">{{$post->description}}</p>
        </ul>
        <div class="card-body">
            <button onclick="history.go(-1);">Back</button>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>

    <form action="/commentary/{{$post->slug}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Commentary" name="comment"
                   aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
            </div>
        </div>
    </form>
    <div class="mb-3">
        <li class="list-group-item list-group-item-success">{{$comments->count()}} Commentary</li>

    </div>
    @foreach($comments as $comment)
        <div class="mb-2">
            <a href="/{{$comment->user->username}}" class="badge badge-light">{{$comment->user->username}}</a>
            {{$comment->comment}}
        </div>
    @endforeach
@endsection
