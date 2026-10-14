<script setup>
    import { router, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';

    const page = usePage();
    const user = computed(() => page.props.auth.user)
    const hours = ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', 
                   '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00' ,'23:00'];

    const startWork = () => {
        router.post('/start-work');
    }
    
    const endWork = () => {
        router.post('/end-work');
    }
    const props = defineProps({
        workSessions: Array
    });

    const isSessionStartedToday = computed(() => {
        const today = new Date().toISOString().split('T')[0];
        return props.workSessions.some((session) => session.created_at.split('T')[0] === today && session.ended_at === null)
    });


    
</script>

<template>
    <section class="mx-[10%]">
        <div class="bg-gray-100 h-24">
            Witaj {{ user.name }}
            <button v-if="!isSessionStartedToday" @click="startWork">Rozpocznij pracę</button>
            <button v-else @click="endWork">Zakończ pracę</button>

        </div>
    </section>
</template>