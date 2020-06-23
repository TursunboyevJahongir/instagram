@extends('layouts.app')

@section('content')
<div class="row m-5">
    <div class="col-3"> <img src="https://instagram.fhrk1-1.fna.fbcdn.net/v/t51.2885-19/s320x320/58454178_375182363092278_1762065042477416448_n.jpg?_nc_ht=instagram.fhrk1-1.fna.fbcdn.net&_nc_ohc=qoLzgohynk8AX-CCCQQ&oh=4b74fc9c6689692025240c55d69b4f67&oe=5F1AC997" class="rounded-circle w-50" style="border: 1px solid rgb(66, 66, 66)"></div>
    <div class="col-9">
    <div><h1>{{Auth::user()->username}}</h1></div>
        <div class="d-flex">
            <div class='pr-4'><strong>64</strong> публикаций</div>
            <div class='pr-4'><strong>193</strong>подписчиков</div>
            <div class='pr-4'><strong>222</strong>подписок</div>
        </div>
    <div class="pt-4 "><b>{{Auth::user()->name}}</b></div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, reprehenderit doloremque blanditiis neque iste quaerat eaque, soluta corrupti reiciendis quos officiis accusamus sequi at tempora quo? Voluptatem quis accusamus reiciendis cum magni iste nihil quia, nisi voluptas eligendi est hic, veniam, alias ut assumenda laudantium mollitia quaerat excepturi perspiciatis autem?</div>
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
