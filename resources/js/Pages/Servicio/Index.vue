<template>
  <!-- <Filters :filters="filters" /> -->
  <!-- <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2 "> -->
  <div class="grid grid-cols-2 gap-2 ">
    <div v-for="(servicio, index) in servicios.data" :key="servicio.id" :servicio="servicio"
      class="border flex flex-col-reverse md:grid md:grid-cols-8 gap-4">
      <Link :href="route('servicio.show', {servicio: servicio.id})" class="md:col-span-5 flex flex-col gap-1 m-5">
      <!-- <div class="md:col-span-5 flex flex-col gap-1"> -->
      <div>
        <div class="truncate"> <span class="text-lg font-bold">{{ servicio.iucliente.razonsocial }}</span> | cliente</div>
        <div> <span class="font-bold">{{ servicio.nroreferencia }}</span> | referencia</div>
        <div> <span class="font-bold">{{ servicio.iucliente.velocidadportal }}</span> | Velocidad Portal</div>
        <div> <span class="font-bold">{{ servicio.iucliente.velocidadcomercial ? servicio.iucliente.velocidadcomercial : 'N/A' }}</span> | Velocidad Comercial</div>

        <div class="mt-2">
          <div> <span class="text-sm font-bold">{{ servicio.hostname }}</span> | HL4</div>
          <div class="truncate"> <span class="text-sm font-bold">{{ servicio.ifdescr }}</span> | interface</div>
          <div class="truncate"> <span class="text-sm font-bold ">{{ servicio.ifalias }}</span> | HL4</div>
        </div>
      </div>
      </Link>
      <div class="md:col-span-3 flex flex-col gap-1 justify-center w-full">
          <img class="object-container aspect-auto  "
            :src="buildImageUrl(servicio.hostname,servicio.ifdescr,moment(servicio.thprobes[0].created).valueOf(), servicio.thprobes[0].period)"/>
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
import  moment  from 'moment'
defineProps({
  servicios: Object,
  filters: Object,
})
function buildImageUrl(hostname, ifdescr, from, period){
  const to=from-periodToSeconds(period)
  return "http://10.105.10.228:3000/render/d-solo/ndZY90-Vk/cores?orgId=1&var-CORES="+hostname+"&var-ifDescr="+ifdescr+"&from="+from+"&to="+to+"&panelId=20&width=270&height=200&tz=America%2FBuenos_Aires"
}
// recive 8h, 24h, 7d y lo devuelve en milisegundos
function periodToSeconds(t) {
    let match = t.match(/^(\d+)([hd])$/i)
    if (match) {
        if (match[2] == 'h') {
            return match[1] * 3600000
        }
        if (match[2] == 'd') {
            return match[1] * 3600000 * 24
        }
    }
    return 0
}

function url3(hostname, ifdescr, from, period) {
    const desde = from
    const hasta = from - periodToSeconds(period)
    return "http://10.105.10.228:3000/d/ndZY90-Vk/cores?orgId=1&var-CORES="+hostname+"&var-ifDescr="+ifdescr+"&from="+desde+"&to="+hasta
}
</script>