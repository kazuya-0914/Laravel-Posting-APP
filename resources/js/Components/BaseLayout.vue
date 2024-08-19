<script setup lang="ts">
import { Link, Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="投稿アプリ" />
  <div class="min-h-screen flex flex-col">
    <header class="p-4 bg-gray-100">
      <nav class="w-5/6 m-auto flex justify-between">
        <Link :href="route('posts.vue.index')">投稿アプリ</Link>
        <ul class="flex justify-between gap-4">
          <li><a href="http://localhost/admin" target="_blank">管理画面</a></li>
          <li><a href="">ログアウト</a></li>
        </ul>
      </nav>
    </header>

    <main class="w-5/6 m-auto flex-grow">
      <article class="p-4 mb-4">
        <slot />
      </article>
    </main>

    <footer class="p-4 bg-gray-100 text-center">
      <p>&copy; 投稿アプリ All rights reserved.</p>
    </footer>
  </div>
</template>