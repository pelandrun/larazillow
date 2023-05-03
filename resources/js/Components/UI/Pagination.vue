<template>
  <div class="flex gap-1">
    <Link
      v-for="(link, index) in links" 
      :key="index" class="py-2 px-4 rounded-md" 
      :href="link.url" 
      :class="{'bg-indigo-500 dark:bg-indigo-800 text-gray-300': link.active}"
      v-html="link.label"
    />
  </div>
  <!-- <div class="flex border" v-for="link in links">
    <div class="text-gray-900 font-bold">{{ link }}</div>
  </div> -->
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({links: Array})
</script>