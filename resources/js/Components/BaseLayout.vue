<script setup lang="ts">
import { ref } from 'vue';
import { Link, Head, useForm, usePage } from '@inertiajs/vue3';

interface Props {
  heading: string;
}

const form = useForm({});
const logout = () => {
  form.post(route('logout'));
};

defineProps<Props>();

</script>

<template>
  <Head title="投稿アプリ" />
  <div class="min-h-screen flex flex-col">
    <header class="p-4 bg-gray-100">
      <nav class="w-5/6 m-auto flex justify-between">
        <Link :href="route('posts.vue.index')" class="text-xl">投稿アプリ(Vue.js)</Link>
        <ul class="flex justify-between gap-4">
          <li><a :href="route('posts.index')">Blade</a></li>
          <li><a href="http://localhost/admin" target="_blank">管理画面</a></li>
          <li><a href="#" @click.prevent="logout" >ログアウト</a></li>
        </ul>
      </nav>
    </header>

    <main class="w-5/6 m-auto flex-grow">
      <article class="p-4 mb-4">
        <h1 class="pb-4 text-3xl">{{ heading }}</h1>
        <slot />
      </article>
    </main>

    <footer class="p-4 bg-gray-100 text-center">
      <p>&copy; 投稿アプリ All rights reserved.</p>
    </footer>　
  </div>
</template>