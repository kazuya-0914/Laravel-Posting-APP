<x-header :title="$title" />

    <main>
      <div class="container">
        <h1 class="fs-2 my-3">{{ $title }}</h1>
        {{ $slot }}
      </div>
    </main>

<x-footer />