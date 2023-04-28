<template>
  <!-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2 "> -->
  <div class="grid grid-cols-2 gap-2 ">
    <div v-for="(servicio, index) in servicios.data" :key="servicio.id" :servicio="servicio"
      class="border flex flex-col-reverse md:grid md:grid-cols-8 gap-4">
      <div class="border border-gray-700 md:col-span-7 flex flex-col gap-1">
        <div> <span class="text-lg font-bold">{{ servicio.nroreferencia }}</span> | referencia</div>
        <div> <span class="text-l font-bold">{{ servicio.hostname }}</span> | HL4</div>
        <div class="truncate"> <span class="text-l font-bold">{{ servicio.ifdescr }}</span> | interface</div>
        <div class="truncate"> <span class="text-l font-bold ">{{ servicio.ifalias }}</span> | HL4</div>
      </div>
      <div class="border border-gray-700 md:col-span-1 flex flex-col gap-1">
        {{ index }}
      </div>
    </div>
  </div>
  <div v-if="servicios.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="servicios.links" />
  </div>
</template>
  
<script setup>
import Listing from '@/Pages/Listing/Index/Component/Listing.vue'
import Filters from '@/Pages/Servicio/Index/Component/Filters.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import Box from '@/Components/UI/Box.vue'
defineProps({
  servicios: Object,
  filters: Object,
})
//dd
</script>