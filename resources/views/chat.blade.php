<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <style>
    .list-group {
      overflow-y: scroll;
      height: 200px;
    }
  </style>

</head>

<body>
  <div class="top_bar">


    <div class="top-right links" style="float:right">
      @if (Auth::check())
      <a href="{{ url('/home') }}">Dashboard
        (<span style="text-transform:capitalize;
          color:green">{{ucwords(Auth::user()->name)}}</span>)</a>
      <a href="{{ url('/logout') }}">Logout</a>
      @else
      <a href="{{ url('/login') }}">Login</a>
      <a href="{{ url('/register') }}">Register</a>
      @endif
    </div>

  </div>
  <div class="container">
    <div class="row" id="app">
      <div class="col-4 offset-4">
        <li class="list-group-item active">Chat Room <span class="badge badge-pill badge-warning">@{{numberOfUser}}</span></li>

        <ul class="list-group" v-chat-scroll="{always: false, smooth: true, scrollonremoved:true}">
          <message v-for="value,index in chat.message" :key=value.index :color=chat.color[index] :user=chat.user[index] :time=chat.time[index]>
            @{{value}}
          </message>
        </ul>
        <div class="badge badge-pill badge-primary">@{{typing}}</div>
        <input type="text" v-model="message" @keyup.enter="send" class="form-control" placeholder="Type your message">
      </div>
    </div>
  </div>

  <script src="{{asset('js/app.js')}}"></script>
</body>

</html>