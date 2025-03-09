<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/Dashboard/Navbar.vue';
import Tabs from '@/components/Dashboard/Tabs.vue';
import { ref,provide } from 'vue';

const props = defineProps({
    user:Object
})

const view = ref(1);
function changeView(index){
    view.value = index
}
provide("chageView",changeView);
provide("user",props.user)
</script>

<template>
    <Head title="Inicio" />
    <Navbar></Navbar>
    <Tabs></Tabs>
    <!--vistas-->
    <div>
        <section v-if="view==1">Hola desde inicio, vista 1</section>
        <section v-if="view==2">Hola desde Carrito, vista 2</section>
        <section v-if="view==3">Hola desde Admin, vista 3</section>
    </div>
</template>
