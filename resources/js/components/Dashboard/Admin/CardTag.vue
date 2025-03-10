<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import {useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

const showEditModal = ref(false);

const props = defineProps({
    tag:Object
})

const form = useForm({
    name:""
})

function update(){
    router.put(`/tag/${props.tag.id}`,form)
    // al cambiar una variable reactiva en el script siempre debe ser atravez de su .value
    showEditModal.value = false;
}


</script>

<template>
    <div class="fixed left-0 top-0 bg-black w-screen h-screen bg-opacity-25 flex justify-center items-center" v-if="showEditModal==true">
        <dialog open class="bg-white p-2">
            <form action="" class="flex flex-col" @submit.prevent="update">    
                <label for="">Nuevo nombre para: {{ props.tag.name }}</label>
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="form.name" class="border p-3">
                <button class="bg-blue-500 text-white p-2 mb-2">Actualizar</button>
                <button type="button" class="bg-gray-200 text-black p-2" @click="showEditModal=false">Cancelar</button>
            </form>
        </dialog>
    </div>

     <article class="border p-4 m-3 shadow w-[300px] flex flex-col gap-2">
        <h1 class="text-center font-bold">{{ props.tag.name }}</h1>
        <button class="bg-blue-500 text-white p-2" @click="showEditModal=true">Editar</button>
        <button class="bg-red-500 text-white p-2" @click="router.delete(`/tag/${props.tag.id}`)">Eliminar</button>
    </article>
</template>