<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div>
    <header>
      <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a href="{{ route('posts.index') }}" class="navbar-brand">投稿アプリ</a>
        
          <ul class="navbar-nav">
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