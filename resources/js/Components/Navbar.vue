<script setup>
    import { router } from '@inertiajs/vue3';
    const logout = () => {
        router.post('/logout');
    }
</script>

<template>
    <div class="w-full h-20 bg-light flex flex-row items-center justify-between *:m-4">
        <p class="text-xl">HumanResourceManagement</p>
        <button v-on:click="logout()">Wyloguj</button>
    </div>
</template>