<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    movements: Object
});
</script>

<template>
    <Head title="Personal Records" />

    

</template>