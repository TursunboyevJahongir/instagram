@extends('layouts.app')

@section('content')
    <div class="row m-5">
        <div class="col-3"><img src="{{$user->avatar ?? '/uploads/users/default.png'}}" class="rounded-circle w-50"
                                style="border: 1px solid rgb(66, 66, 66)"></div>
        <div class="col-9">
            <div class="d-flex justify-content-between">
                <h1>{{$user->username}}</h1>

            </div>
            <div class="d-flex">
                <div class='pr-4'><strong>{{$user->posts->count()}}</strong> публикаций</div>
                <div class='pr-4'><strong>193</strong>подписчиков</div>
                <div class='pr-4'><strong>222</strong>подписок</div>
            </div>
            <div class="pt-4 "><b>{{$user->name}}</b></div>
            <div>{{$user->description}}</div>
            <a href="#">{{$user->url}}</a>
        </div>
    </div>

    <div class="card-group row mt-3">
        @foreach($user->posts as $post)
            <div class="col-4 pb-3">
                <div class="card">
                    <a href="post/{{$post->slug}}"><img src="{{$post->image}}" class="card-img-top "></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
