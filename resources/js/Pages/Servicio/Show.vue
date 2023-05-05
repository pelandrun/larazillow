<template>
    <h1 class="text-xl font-bold">{{ servicio.iucliente.razonsocial }} </h1>
    <div class="mb-4">
        <div>Nro Cliente: <span class="text-sm font-bold">{{ servicio.iucliente.nrocliente }}</span></div>
        <div>CUIT: <span class="text-sm font-bold">{{ servicio.iucliente.cuit }}</span></div>
        <div>Nro Servicio: <span class="text-sm font-bold">{{ servicio.iucliente.nroservicio }}</span></div>
        <div>Nro Referencia: <span class="text-sm font-bold">{{ servicio.iucliente.nroreferencia }}</span></div>
        <div>Velocidad Comerical: <span class="text-sm font-bold">{{ servicio.iucliente.velocidadcomercial }}</span></div>
        <div>Velocidad Portal: <span class="text-sm font-bold">{{ servicio.iucliente.velocidadportal }}</span></div>
    </div>
    <div class="grid grid-cols-1 gap-2 ">
        <div class="border flex flex-col-reverse md:grid md:grid-cols-8 gap-4" v-for="thprobe in servicio.thprobes"
            :key="thprobe.id">
            <div class="md:col-span-2 items-center justify-center">
                <div class="m-4">Fecha: <span class="text-sm font-bold">{{ thprobe.date }}</span></div>
            </div>
            <div class="md:col-span-6 flex items-center justify-center">
                <img class="object-center aspect-auto  "
                    :src="buildImageUrl(servicio.hostname, servicio.ifdescr, moment(thprobe.date).valueOf(), thprobe.period)" />
            </div>
            <!-- <div class="md:col-span-7 flex  justify-center w-full"><img class="object-center aspect-auto  " :src="buildImageUrl" /></div> -->
        </div>
    </div>
</template>
<script setup>
import moment from 'moment'
const props = defineProps({
    servicio: Object,
})

function buildImageUrl(hostname, ifdescr, from, period) {
    const desde = from
    const hasta = from - periodToSeconds(period)
    return "http://10.105.10.228:3000/render/d-solo/ndZY90-Vk/cores?orgId=1&var-CORES=" + hostname + "&var-ifDescr=" + ifdescr + "&from=" + desde + "&to=" + hasta + "&panelId=10&width=1000&height=200&tz=America%2FBuenos_Aires"
}

// recive 8h, 24h, 7d y lo devuelve en milisegundos
function periodToSeconds(t) {
    let match = t.match(/^(\d+)([hd])$/i)
    if (match) {
        console.log(match[2])

        if (match[2] == 'h') {
            console.log(match[2]+"="+ match[1] * 3600000)

            return match[1] * 3600000
        }
        if (match[2] == 'd') {

            console.log( match[2]+"="+match[1] * 3600000 * 24)
            return match[1] * 3600000 * 24
        }
    }
    return 0
}
</script>