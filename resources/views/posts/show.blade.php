<x-twitter :title="$title">
  @if (session('flash_message'))
    <p class="text-success">{{ session('flash_message') }}</p>
  @endif

  <a href="{{ route('posts.index') }}" class="text-decoration-none">&lt; 戻る</a>

  <article>
    <div class="card mb-3">
      <div class="card-body">
        <h2 class="card-title fs-5">{{ $post->title }}</h2>
        <p class="card-text">{{ $post->content }}</p>
    
        @if ($post->user_id === Auth::id())
        <div class="d-flex">
          <a href="{{ route('posts.edit', $post )}}" class="btn btn-outline-primary d-block me-1">編集</a>
              
          <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" id="del-btn" class="btn btn-outline-danger">削除</button>
          </form>
        </div>
        @endif
      </div>
    </div>
  </article>
</x-twitter>