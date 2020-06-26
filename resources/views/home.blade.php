@extends('layouts.app')

@section('content')
    <div class="row m-5">
        <div class="col-3">
            <a class="opacity" href="/profile/{{Auth::user()->id}}/edit">
                <img src="{{Auth::user()->avatar ?? '/uploads/users/default.png'}}" class="rounded-circle w-50">
            </a>
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between">
                <h1>{{Auth::user()->username}}</h1>
            </div>
            <div class="d-flex">
                <div class='pr-4'><strong>{{Auth::user()->posts()->count()}}</strong> публикаций</div>
                <div class='pr-4'><strong>{{Auth::user()->followers()->count()}}</strong>подписчиков</div>
                <div class='pr-4'><strong>{{Auth::user()->followings()->count()}}</strong>подписок</div>
            </div>
            <div class="pt-4 "><b>{{Auth::user()->name}}</b></div>
            <div>{{Auth::user()->description}}</div>
            <a href="#">{{Auth::user()->url}}</a>

                <a class="" href="/post/create">
                    <svg class="bi bi-plus-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
                    </svg>
                    Add Post
                </a>
        </div>
        <a class=" mr-50" href="/profile/{{Auth::user()->id}}/edit">
            <svg class="bi bi-pen" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                <path fill-rule="evenodd"
                      d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                <path
                    d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
            </svg>
            edit
        </a>
    </div>



    <div class="card-group row mt-3 m-3 ">
        @foreach(Auth::user()->posts as $post)
            <div class="col-4 pb-3 ">
                <div class="card cardHover">
                    <a href="post/{{$post->slug}}"><img src="{{$post->image}}" class="card-img-top "></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
