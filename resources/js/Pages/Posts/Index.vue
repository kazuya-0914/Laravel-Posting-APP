<script setup lang="ts">
import BaseLauout from '@/Components/BaseLayout.vue';
import { usePage, Link } from '@inertiajs/vue3';
import { PageProps as InertiaPageProps } from '@inertiajs/core';

interface Post {
  id: number;
  title: string;
  content: string;
}
interface PageProps extends InertiaPageProps{
  user_name: string;
  posts: Post[];
  csrfToken: string;
}

const { props } = usePage<PageProps>();

const userName = props.user_name;
const posts = props.posts;
const csrfToken = props.csrfToken;

</script>

<template>
  <BaseLauout>
    <h1 class="pb-4 text-3xl">{{ userName }}さんの投稿一覧</h1>
    <Link :href="route('posts.vue.create')"
    class="px-2 py-2 rounded-lg text-blue-500 border border-blue-500">新規投稿</Link>
    <template v-if="posts.length > 0">
      <article v-for="post in posts" :keys="post.id">
        <h2>{{ post.title }}</h2>
        <p>{{ post.content }}</p>
        <Link :href="route('posts.show', post.id)">詳細</Link>
      </article>
    </template>
    <template v-else>
      <p class="py-8 text-red-500">{{ userName }}さんの投稿はありません</p>
    </template>
  </BaseLauout>
</template>

<style scoped>
</style>