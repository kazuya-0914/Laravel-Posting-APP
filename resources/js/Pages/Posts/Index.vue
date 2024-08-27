<script setup lang="ts">
import BaseLauout from '@/Components/BaseLayout.vue';
import { ref } from 'vue';
import { usePage, Link, router } from '@inertiajs/vue3';

interface Post {
  id: number;
  title: string;
  content: string;
}
interface PageProps　{
  user_name: string;
  posts: Post[];
  flash_message: string | null,
  error_message: string | null,
}

const { props } = usePage<PageProps>();

const userName = ref(props.user_name);
const userNameValue = userName.value;
const posts = ref(props.posts);
const heading = ref(`${userNameValue}さんの投稿一覧`);

const flashMessage = ref(props.flash_message);
const errorMessage = ref(props.error_message);

// 投稿データをDELETEメソッドで削除
const deletePost = (postId: number) => {
  if (confirm('本当に削除してもよろしいですか？')) {
    router.delete(route('posts.vue.destroy', { post: postId }), {
      onSuccess: () => {
        posts.value = posts.value.filter(post => post.id !== postId);
      },
      onError: () => {
        errorMessage.value = '投稿の削除に失敗しました。';
      },
    });
  }
};

</script>

<template>
  <BaseLauout :heading="heading">
    <!-- フラッシュメッセージの表示 -->
    <p v-if="flashMessage"
    class="px-4 py-3 mb-4 bg-green-100 border border-green-400 text-green-700 rounded-md">{{ flashMessage }}</p>

    <!-- エラーメッセージの表示 -->
    <p v-if="errorMessage"
    class="px-4 py-3 mb-4 bg-red-100 border border-red-400 text-red-700 rounded-md">{{ errorMessage }}</p>

    <!-- 新規投稿ボタン -->
    <div class="mb-4">
      <Link :href="route('posts.vue.create')"
      class="p-2 rounded-md text-blue-500 border border-blue-500">新規投稿</Link>
    </div>

    <!-- 投稿のリスト -->
    <template v-if="posts.length > 0">
      <article v-for="post in posts" :keys="post.id" class="p-4 mb-4 rounded-md border border-gray-300">
        <h2 class="text-2xl">{{ post.title }}</h2>
        <p class="mb-6">{{ post.content }}</p>
        <Link :href="route('posts.vue.show', post.id)"
        class="p-2 me-2 rounded-md text-blue-500 border border-blue-500">詳細</Link>
        <Link :href="route('posts.vue.edit', post.id)"
        class="p-2 me-2 rounded-md text-blue-500 border border-blue-500">編集</Link>
        <button @click="deletePost(post.id)"
        class="px-2 py-1.5 rounded-md text-red-500 border border-red-500">削除</button>
      </article>
    </template>
    <template v-else>
      <p class="py-8 text-red-500">{{ userNameValue }}さんの投稿はありません</p>
    </template>
  </BaseLauout>
</template>

<style scoped>
</style>