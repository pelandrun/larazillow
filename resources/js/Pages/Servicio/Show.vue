<template>
    <h1 class="font-bold">{{ servicio.iucliente.razonsocial }} </h1>
    <div>
        <div>Nro Cliente: {{ servicio.iucliente.nrocliente }}</div>
        <div>CUIT: {{ servicio.iucliente.cuit }}</div>
        <div>Nro Servicio: {{ servicio.iucliente.nroservicio }}</div>
        <div>Nro Referencia: {{ servicio.iucliente.nroreferencia }}</div>
        <div>Velocidad Comerical: {{ servicio.iucliente.velocidadcomercial }}</div>
        <div>Velocidad Portal: {{ servicio.iucliente.velocidadportal }}</div>
    </div>
    <div class="grid grid-cols-1 gap-2 ">
        <div class="border flex flex-col-reverse md:grid md:grid-cols-8 gap-4" v-for="thprobe in servicio.thprobes"
            :key="thprobe.id">
            <div class="md:col-span-2 items-center justify-center">
                <div>Detectado: {{ thprobe.date }}</div>
                <!-- <div>{{ thprobe }}</div> -->
                
            </div>
            <div class="md:col-span-6 flex items-center justify-center">
                <img class="object-center aspect-auto  " :src="buildImageUrl" />
            </div>
            <!-- <div class="md:col-span-7 flex  justify-center w-full"><img class="object-center aspect-auto  " :src="buildImageUrl" /></div> -->
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    servicio: Object,
})

const buildImageUrl = "http://10.105.10.228:3000/render/d-solo/ndZY90-Vk/cores?orgId=1&var-CORES=All&var-ifDescr=All&var-ifAlias=REF%3A98848+BBVA+FRANCES+-+%28Suc+314+-+Principal%29+-+ADECIR+4801-0%2F13&var-start=1681928382000&from=1683041582480&to=1683063182480&panelId=10&width=1000&height=200&tz=America%2FBuenos_Aires"
</script>