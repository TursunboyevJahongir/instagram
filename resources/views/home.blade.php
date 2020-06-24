@extends('layouts.app')

@section('content')
<div class="row m-5">
    <div class="col-3"> <img src="{{Auth::user()->avatar ?? '/uploads/users/default.png'}}" class="rounded-circle w-50" style="border: 1px solid rgb(66, 66, 66)"></div>
    <div class="col-9">
    <div class="d-flex justify-content-between">
        <h1>{{Auth::user()->username}}</h1>
        <a class="" href="/profile/{{Auth::user()->id}}/edit" >
            <svg class="bi bi-pen" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
            </svg>
            edit
        </a>
    </div>
        <div class="d-flex">
            <div class='pr-4'><strong>64</strong> публикаций</div>
            <div class='pr-4'><strong>193</strong>подписчиков</div>
            <div class='pr-4'><strong>222</strong>подписок</div>
        </div>
    <div class="pt-4 "><b>{{Auth::user()->name}}</b></div>
        <div>{{Auth::user()->description}}</div>
    <a href="#">{{Auth::user()->url}}</a>
    </div>
</div>

<div class="card-group">
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQB6PtteL7MTFDhkgYAGgu6Hy-Zyo-ZW19nqw&usqp=CAU" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card">
      <img src="https://imgd.aeplcdn.com/1280x720/bw/models/yamaha-yzf-r15-v3-dual-channel-abs--bs-vi20200109152444.jpg?q=80" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
    <div class="card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQB6PtteL7MTFDhkgYAGgu6Hy-Zyo-ZW19nqw&usqp=CAU" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
@endsection
