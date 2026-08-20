<script setup>
    import { usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';
    import Navbar from './../Components/Navbar.vue';

    const page = usePage();
    const user = computed(() => page.props.auth.user);
</script>

<template>
    <div class="min-h-screen bg-primary">
        <Navbar v-if="user"/>
        <slot />
    </div>
</template>