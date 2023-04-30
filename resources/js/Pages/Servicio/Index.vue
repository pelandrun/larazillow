<template>
  <Filters :filters="filters" />
  <!-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2 "> -->
  <div class="grid grid-cols-2 gap-2 ">
    <div v-for="(servicio, index) in servicios.data" :key="servicio.id" :servicio="servicio"
      class="border flex flex-col-reverse md:grid md:grid-cols-8 gap-4">

      <Link href="#" class="md:col-span-5 flex flex-col gap-1 m-5">
      <!-- <div class="md:col-span-5 flex flex-col gap-1"> -->
      <div>
        <div> <span class="text-lg font-bold">CLIENTE-{{ index }}</span> | cliente</div>
        <div> <span class="font-bold">{{ servicio.nroreferencia }}</span> | referencia</div>
        <div> <span class="font-bold">{{ servicio.velocidadportalbits }}</span> | referencia</div>
        <div class="mt-2">
          <div> <span class="text-sm font-bold">{{ servicio.hostname }}</span> | HL4</div>
          <div class="truncate"> <span class="text-sm font-bold">{{ servicio.ifdescr }}</span> | interface</div>
          <div class="truncate"> <span class="text-sm font-bold ">{{ servicio.ifalias }}</span> | HL4</div>
        </div>
      </div>
      </Link>
      <div class="md:col-span-3 flex flex-col gap-1 justify-center w-full">
          <img class="object-container aspect-auto  "
            :src="buildImageUrl(servicio.hostname,servicio.ifdescr)"/>
        <!-- <div><span class="text-xs mr-1">daily</span>{{ index }}</div>
        <div><span class="text-xs mr-1">daily</span>{{ index }}</div>
        <div><span class="text-xs mr-2">weekly</span>{{ index }}</div> -->
      </div>

    </div>
  </div>
  <div v-if="servicios.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="servicios.links" />
  </div>
  <!-- <img v-bind:src="require('images/rails.png')" /> -->
</template>
  
<script setup>

import Listing from '@/Pages/Listing/Index/Component/Listing.vue'
import Filters from '@/Pages/Servicio/Index/Component/Filters.vue'
import Pagination from '@/Components/UI/Pagination.vue'
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
defineProps({
  servicios: Object,
  filters: Object,
})
function buildImageUrl(hostname, ifdescr){
  return "http://10.105.10.228:3000/render/d-solo/ndZY90-Vk/cores?orgId=1&var-CORES="+hostname+"&var-ifDescr="+ifdescr+"&var-instancias=t1&var-instancias=t2&var-instancias=t3&var-instancias=t4&var-start=1681928382000&from=1682686445635&to=1682708045635&panelId=6&width=500&height=250&tz=America%2FBuenos_Aires";
}
</script>