<script setup lang="ts">
import BaseLauout from '@/Components/BaseLayout.vue';
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';

const heading = ref('新規投稿');

// フォームデータ
const form = useForm({
  title: '',
  content: '',
});

// 投稿フォームの送信処理
const submit = () => {
  form.post(route('posts.vue.store'), {
    onFinish: () => {
      if (Object.keys(form.errors).length > 0) {
        hasErrors.value = true;
      }
    }
  });
};

// エラーチェック
const hasErrors = ref(false);

</script>

<template>
  <BaseLauout :heading="heading">
    <!-- エラーメッセージの表示 -->
    <template v-if="hasErrors">
      <ul class="px-4 py-3 mb-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
        <li v-for="(error, index) in form.errors" :key="index">{{ error }}</li>
      </ul>
    </template>

    <div class="mb-4">
      <Link :href="route('posts.vue.index')"
      class="p-2 rounded-md text-blue-500 border border-blue-500">&lt; 戻る</Link>
    </div>

    <!-- フォームの表示 -->
    <form @submit.prevent="submit">
      <div class="mb-4">
        <label for="title"
        class="block text-sm font-medium leading-6 text-gray-900">タイトル</label>
        <input type="text" id="title" v-model="form.title"
        class="w-full rounded-md block flex-1 border border-gray-300 bg-transparent py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
      </div>
      <div class="mb-4">
        <label for="content"
        class="block text-sm font-medium leading-6 text-gray-900">本文</label>
        <textarea id="content" v-model="form.content"
        class="w-full rounded-md block flex-1 border border-gray-300 bg-transparent py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6"></textarea>
      </div>
      <button type="submit"
      class="p-2 rounded-md text-blue-500 border border-blue-500">投稿</button>
    </form>
  </BaseLauout>
</template>

<style scoped>
</style>