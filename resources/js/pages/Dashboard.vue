<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/components/Dashboard/Navbar.vue';
import Tabs from '@/components/Dashboard/Tabs.vue';
import CardTag from '@/components/Dashboard/Admin/CardTag.vue';
import CartArticle from '@/components/Dashboard/Admin/CartArticle.vue';
import { ref,provide } from 'vue';
import {useForm} from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import Button from 'primevue/button';

const props = defineProps({
    user:Object,
    articles:Array,
    tags:Array
})


const formTag = useForm({
    name:""
})

const formArticle = useForm({
    name:"",
    image:"",
    price:"",
    stock:"",
    description:"",
    tag_id:""
})

function createTag(){
    router.post("/tag",formTag);
}


function createArticle(){
    router.post("/article",formArticle);
}


const view = ref(1);
function changeView(index){
    view.value = index
}

const adminView = ref(2);


provide("chageView",changeView);
provide("user",props.user)
</script>

<template>
    <Head title="Inicio" />
    <Navbar></Navbar>
    <Tabs></Tabs>
    <!--vistas-->
    <div>
        <section v-if="view==1" class="flex flex-wrap">

            <article v-for="article in props.articles" class="border p-4 m-3 shadow w-[300px]">
                <img :src="article.image" class="h-[200px]">
                <h1 class="font-bold">{{ article.name }}</h1>
                <h4>{{ article.tag.name }}</h4>
                <h3 class="font-bold text-green-600">${{ article.price }}</h3>
                <h5>disponibles: {{ article.stock }}</h5>
                <button class="text-white bg-indigo-500 w-full p-2"><i class="pi pi-shopping-cart me-2"></i>Agregar al Carrito</button>
            </article>

        </section>

        <section v-if="view==2">Hola desde Carrito, vista 2</section>

        
        <section v-if="view==3">
            <nav class="border-b shadow flex justify-center items-center h-[40px] bg-gray-200 gap-2">
                <button @click="adminView=1">Categorias</button>
                <button @click="adminView=2">Productos</button>
            </nav>

            <!--categorias-->
            <h1 class="text-2xl font-bold text-center mt-4" v-if="adminView==1">Categorias</h1>
            <div class="flex flex-wrap gap-3" v-if="adminView==1">
                <CardTag v-for="tag in props.tags" :tag="tag"></CardTag>
            </div>
            <form  class="border p-4 m-3 shadow w-[300px] gap-2 flex flex-col" @submit.prevent="createTag" v-if="adminView==1">
                <input type="text" name="" id="" placeholder="Nuevo Nombre" v-model="formTag.name" class="border p-3">
                <button class="bg-blue-500 text-black p-2">Agregar</button>
            </form>

            <!--productos-->
            <h1 class="text-2xl font-bold text-center mt-4" v-if="adminView==2">Productos</h1>
            <div class="flex flex-wrap gap-3" v-if="adminView==2">
                <CartArticle v-for="article in props.articles" :article="article" :tags="props.tags"></CartArticle>
            </div>
            <form  class="border p-4 m-3 shadow w-[300px] gap-2 flex flex-col" @submit.prevent="createArticle" v-if="adminView==2">
                <label for="">Nombre</label>
                <input type="text" name="" id="" v-model="formArticle.name" class="border p-3">
                <label for="">Image</label>
                <input type="text" name="" id="" v-model="formArticle.image" class="border p-3">
                <label for="">Precio</label>
                <input type="text" name="" id="" v-model="formArticle.price" class="border p-3">
                <label for="">Inventario</label>
                <input type="text" name="" id="" v-model="formArticle.stock" class="border p-3">
                <label for="">Descripcion</label>
                <input type="text" name="" id="" v-model="formArticle.description" class="border p-3">
                <label for="">Categoria</label>
                <select name="" id="" v-model="formArticle.tag_id" class="border p-3 mb-3">
                    <option :value="tag.id" v-for="tag in props.tags">{{ tag.name }}</option>
                </select>
                <button class="bg-blue-500 text-black p-2">Agregar</button>
            </form>


        </section>
    </div>
</template>
