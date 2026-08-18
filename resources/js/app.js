import { createInertiaApp } from '@inertiajs/vue3';
import Layout from './Layouts/Layout.vue';

createInertiaApp({
    pages: {
        path: './Pages',
        extension: '.vue',
        lazy: true,
        transform: (name, page) => name.replace('/', '-'),
    },
    layout: () => Layout,
})