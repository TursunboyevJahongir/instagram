@extends('layouts.app')

@section('content')
    <div class="row m-5">
        <div class="col-3"><img src="{{$user->avatar ?? '/uploads/users/default.png'}}" class="rounded-circle w-50"
                                style="border: 1px solid rgb(66, 66, 66)"></div>
        <div class="col-9">
            <div class="d-flex justify-content-between">
                <h1>{{$user->username}}</h1>
                <form action="/profile/{{ $user->id }}/follow" method="post">
                    @csrf
                    <button type="submit">Follow User</button>
                </form>

                <form action="/{{ $user->id }}/unfollow" method="post">
                    @csrf
                    <button type="submit">UnFollow User</button>
                </form>
{{--                <a href="{{ route('user.unfollow'), $user->id }}">Unollow User</a>--}}
            </div>
            <div class="d-flex">
                <div class='pr-4'><strong>{{$user->posts->count()}}</strong> публикаций</div>
                <div class='pr-4'><strong>{{$user->followers()->count()}}</strong>подписчиков</div>
                <div class='pr-4'><strong>{{$user->followings()->count()}}</strong>подписок</div>
            </div>
            <div class="pt-4 "><b>{{$user->name}}</b></div>
            <div>{{$user->description}}</div>
            <a href="#">{{$user->url}}</a>
        </div>
    </div>

    <div class="card-group row mt-3 m-3">
        @foreach($user->posts as $post)
            <div class="col-4 pb-3">
                <div class="card cardHover">
                    <a href="post/{{$post->slug}}"><img src="{{$post->image}}" class="card-img-top "></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
