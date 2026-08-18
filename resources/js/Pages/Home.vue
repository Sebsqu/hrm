<script setup>
    import { useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: '',
        password: ''
    });
</script>

<template>
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-xl bg-primary p-4 rounded-md *:text-light flex flex-col gap-2">
            <h1>Witaj, ponownie!</h1>
            <input type="email" v-model="form.email" placeholder="E-mail" class="p-2 rounded-md">
            <input type="password" v-model="form.password" placeholder="Hasło" class="p-2 rounded-md">
            <button type="submit" class="bg-light text-dark p-2 rounded-md">Zaloguj</button>
        </div>
    </div>
</template>