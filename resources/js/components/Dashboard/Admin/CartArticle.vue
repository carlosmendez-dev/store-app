<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import {useForm} from '@inertiajs/vue3';
import { inject, ref } from 'vue';

const showEditModal = ref(false);

const props = defineProps({
    article:Object,
    tags:Array
})


const form = useForm({
    name:props.article.name,
    price:props.article.price,
    image:props.article.image,
    stock:props.article.stock,
    description:props.article.description,
    tag_id:props.article.tag_id
})

function update(){
    router.put(`/article/${props.article.id}`,form)
    // al cambiar una variable reactiva en el script siempre debe ser atravez de su .value
    showEditModal.value = false;
}


</script>

<template>
    <div class="fixed left-0 top-0 bg-black w-screen h-screen bg-opacity-25 flex justify-center items-center" v-if="showEditModal==true">
        <dialog open class="bg-white p-2">
            <form action="" class="flex flex-col" @submit.prevent="update">    
                <label for="">Nuevo nombre para: {{ props.article.name }}</label>
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="form.name" class="border p-3">

                <label for="">Nuevo nombre para: {{ props.article.image }}</label>
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="form.image" class="border p-3">

                <label for="">Nuevo precio para: {{ props.article.price }}</label>
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="form.price" class="border p-3">

                <label for="">Nuevo inventario para: {{ props.article.stock }}</label>
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="form.stock" class="border p-3">

                <label for="">Nueva Description para: {{ props.article.description }}</label>
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="form.description" class="border p-3">

                <label for="">Nueva categoria para: {{ props.article.tag.name }}</label>
                <select name="" id="" v-model="form.tag_id" class="border p-3 mb-3">
                    <option :value="tag.id" v-for="tag in props.tags">{{ tag.name }}</option>
                </select>




                <button class="bg-blue-500 text-white p-2 mb-2">Actualizar</button>
                <button type="button" class="bg-gray-200 text-black p-2" @click="showEditModal=false">Cancelar</button>
            </form>
        </dialog>
    </div>

     <article class="border p-4 m-3 shadow w-[300px] flex flex-col gap-2">
        <img :src="article.image" class="h-[200px]">
                <h1 class="font-bold">{{ article.name }}</h1>
                <h4>{{ article.tag.name }}</h4>
                <h3 class="font-bold text-green-600">${{ article.price }}</h3>
                <h5>disponibles: {{ article.stock }}</h5>
        <button class="bg-blue-500 text-white p-2" @click="showEditModal=true">Editar</button>
        <button class="bg-red-500 text-white p-2" @click="router.delete(`/article/${props.article.id}`)">Eliminar</button>
    </article>
</template>