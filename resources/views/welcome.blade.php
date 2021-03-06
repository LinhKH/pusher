<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>LaraBook</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">


  <style>
    html,
    body {
      background-color: #ddd;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      margin: 0;
    }

    .top_bar {
      position: relative;
      width: 99%;
      top: 0;
      padding: 5px;
      margin: 0 5
    }

    .full-height {
      margin-top: 50px
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;margin-top:80px;
    }

    .top-right {
      position: absolute;
      right: 5px;
      top: 15px
    }

    .top-left {
      position: absolute;
      width: 40%
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px0;
    }

    .head_har {
      background-color: #f6f7f9;
      border-bottom: 1px solid #dddfe2;
      border-radius: 2px 2px 0 0;
      font-weight: bold;
      padding: 8px 6px;

    }

    .left-sidebar,
    .right-sidebar {
      background-color: #fff;
      height: 600px;

    }

    .posts_div {
      margin-bottom: 10px !important;
    }

    .posts_div h3 {
      margin-top: 4px !important;

    }

    #postText {
      border: none;
      height: 100px
    }

    .likeBtn {
      color: #4b4f56;
      font-weight: bold;
      cursor: pointer;
    }

    .left-sidebar li {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      list-style: none;
      margin-left: -20px
    }

    .dropdown-menu {
      min-width: 120px;
      left: -30px
    }

    .dropdown-menu a {
      cursor: pointer;
    }

    .dropdown-divider {
      height: 1px;
      margin: .5rem 0;
      overflow: hidden;
      background-color: #eceeef;
    }

    .user_name {
      font-size: 18px;
      font-weight: bold;
      text-transform: capitalize;
      margin: 3px
    }

    .all_posts {
      background-color: #fff;
      padding: 5px;
      margin-bottom: 15px;
      border-radius: 5px;
      -webkit-box-shadow: 0 8px 6px -6px #666;
      -moz-box-shadow: 0 8px 6px -6px #666;
      box-shadow: 0 8px 6px -6px #666;
    }

    #commentBox {
      background-color: #ddd;
      padding: 10px;
      width: 99%;
      margin: 0 auto;
      background-color: #F6F7F9;
      padding: 10px;
      margin-bottom: 10px
    }

    #commentBox li {
      list-style: none;
      padding: 10px;
      border-bottom: 1px solid #ddd
    }

    .commet_form {
      padding: 10px;
      margin-bottom: 10px
    }

    .commentHand {
      color: blue
    }

    .commentHand:hover {
      cursor: pointer
    }

    .upload_wrap {
      position: relative;
      display: inline-block;
      width: 100%
    }

    .center-con {
      max-height: 600px;
      position: absolute;
      left: calc(25%);
      overflow-y: scroll;
    }

    @media (min-width: 268px) and (max-width: 768px) {

      .center-con {
        max-height: 600px;
        position: relative;
        left: 0px;
        overflow-y: scroll;
      }
    }
  </style>

</head>

<body>
  <div id="app">
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

  </div>


</body>

</html>