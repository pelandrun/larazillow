<template>
  <Filters :filters="filters" />
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">
    <div v-for="(listing, index) in listings.data" :key="listing.id" :listing="listing"
      class="grid grid-cols-2 border text-1xl font-bold">
      <div class="flex items-center gap-1">
        <div>{{ listing.price }}</div>
        <div>pepe</div>
      </div>
      <div>
        {{ index }}
      </div>
    </div>
  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
  </div>
</template>
  
<script setup>
import Listing from '@/Pages/Listing/Index/Component/Listing.vue'
import Filters from '@/Pages/Listing/Index/Component/Filters.vue'
import Pagination from '@/Components/UI/Pagination.vue'
defineProps({
  listings: Object,
  filters: Object,
})
//dd
</script>