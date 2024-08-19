<script setup lang="ts">
import BaseLauout from '@/Components/BaseLayout.vue';
import { defineComponent } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';

export default defineComponent({
  setup() {
    const { posts } = usePage().props.value;
    return { posts }; 
  }
})

</script>

<template>
  <BaseLauout>
    <h1 class="pb-4 text-3xl">投稿詳細</h1>
    <Link :href="route('posts.vue.index')"
    class="px-2 py-2 rounded-lg text-blue-500 border border-blue-500">&lt; 戻る</Link>
    <article>
      <h2>{{ post.title }}</h2>
      <p>{{ post.content }}</p>
    </article>
  </BaseLauout>
</template>

<style scoped>
</style>