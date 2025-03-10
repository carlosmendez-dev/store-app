<script setup lang="ts">
import { inject } from 'vue';

// inject sirve para traer las variables y funciones que mandamos com provide()
const changeView = inject("chageView"); // obtenemos la funcion para cambiar de vistas
const user = inject("user"); // obtenemos la variable del usuario
</script>

<template>
    <nav class="bg-gray-100 flex justify-center gap-6 h-[40px]">
        <button @click="changeView(1)" class="hover:text-blue-500">Inicio</button>
        <button @click="changeView(2)" class="hover:text-blue-500">Carrito</button>
        <button @click="changeView(3)" class="hover:text-blue-500" v-if="user.role == 'admin'">Admin</button>
    </nav>
</template>