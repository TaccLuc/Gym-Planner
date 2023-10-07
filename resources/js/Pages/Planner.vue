<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

// SHARED DATA
defineOptions({
    layout: AuthenticatedLayout,
});

const page = usePage();
const user = ref(page.props.auth.user);

</script>

<template>
    <Head title="Planner" />
    
    <div class="text-center mt-40">
        <h1 class="text-3xl mb-12">
            Welcome 
            <span class="capitalize text-red-700">
                {{ user.name }}
            </span>
        </h1>

        <p class="text-2xl">
            Create or select a workout.
        </p>
    </div>

</template>