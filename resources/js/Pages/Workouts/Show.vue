<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    workout: Object
});

</script>

<template>
    <Head title="SingleWorkout" />
    
    <AuthenticatedLayout>

        {{ workout }}
        
    </AuthenticatedLayout>
</template>