<script setup lang="ts">
import BaseLauout from '@/Components/BaseLayout.vue';
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';

const { props } = usePage<{
  post: {
    user_id: number 
  };
  auth: {
    user: {
      id: number
    }
  }
}>();
const title = ref<string>(props.title);
const flashMessage = ref<string | null>(props.flashMessage ?? null);
const post = ref<any>(props.post);
const authUser = props.auth.user;
const authUserId = ref<number>(props.authUserId);
const heading = ref('投稿詳細');

</script>

<template>
  <BaseLauout :heading="heading">
    <div class="mb-4">
      <Link :href="route('posts.vue.index')"
      class="p-2 rounded-md text-blue-500 border border-blue-500">&lt; 戻る</Link>
    </div>

    <!-- 投稿詳細 -->
    <article class="p-4 mb-4 rounded-md border border-gray-300">
      <h2 class="text-2xl">{{ post.title }}</h2>
      <p>{{ post.content }}</p>
    </article>

    <!-- 認証されたユーザーが投稿の所有者であれば「編集」リンクを表示 -->
    <Link v-if="post.user_id === authUser.id" :href="route('posts.vue.edit', post)"
    class="p-2 rounded-md text-blue-500 border border-blue-500">編集</Link>
  </BaseLauout>
</template>

<style scoped>
</style>