<script setup lang="ts">
// nos permite enviar peticiones sin usar formularios
import { router } from '@inertiajs/vue3';

function logout(){
    router.post("/logout");
}
</script>

<template>
    <nav class="h-[60px] border-b shadow flex justify-between items-center px-6">
        <h1>STORE APP</h1>
        <button class="hover:text-red-500" @click="logout">Cerrar sesion</button>
    </nav>
</template>