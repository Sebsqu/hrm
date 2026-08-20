<script setup>
    import { useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: '',
        password: ''
    });

    const login = () => {
        form.post('/login', {
            onError: () => form.reset()
        });
    }
</script>

<template>
    <div class="min-h-screen flex items-center justify-center">
        
        <form @submit.prevent="login" class="max-w-xl bg-primary-soft px-8 py-6 rounded-md flex flex-col gap-2">
            <h1 class="text-center text-xl py-4">Witaj, ponownie!</h1>
            <div>
                <label for="email">E-mail</label>
                <input type="email" v-model="form.email" placeholder="E-mail" class="p-2 rounded-md w-96 outline-primary border">
            </div>
            <div>
                <label for="password">Hasło</label>
                <input type="password" v-model="form.password" placeholder="Hasło" class="p-2 rounded-md w-96 outline-primary border">
            </div>
            <div v-if="form.errors.error">
                <p>{{ form.errors.error }}</p>
            </div>
            <button type="submit" class="bg-primary hover:bg-primary-hover cursor-pointer font-bold p-2 my-4 rounded-md text-light w-48 mx-auto">Zaloguj</button>
        </form>
    </div>
</template>