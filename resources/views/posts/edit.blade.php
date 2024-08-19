<x-twitter :title="$title">
  <article>
    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <a href="{{ route('posts.index') }}">&lt; 戻る</a>

    <form action="{{ route('posts.update', $post) }}" method="POST">
      @csrf
      @method('PATCH')
      <div>
        <label for="title">タイトル</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title)}}">
      </div>
      <div>
        <label for="content">本文</label>
        <textarea id="content" name="content">{{ old('content', $post->content) }}</textarea>
      </div>
      <button type="submit">更新</button>
    </form>
    
  </article>
</x-twitter>