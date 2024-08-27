<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="wrapper">
    <header>
      <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a href="{{ route('posts.index') }}" class="navbar-brand">投稿アプリ(Blade)</a>
        
          <ul class="navbar-nav d-flex flex-row gap-4">
            <li class="nav-item">
              <a href="{{ route('posts.vue.index') }}" class="nav-link">Vue.js</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin') }}" class="nav-link">管理画面</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" id="logout" class="nav-link">ログアウト</a>
              <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
              </form>
            </li>
          </ul>
        </div>
      </nav>
    </header>