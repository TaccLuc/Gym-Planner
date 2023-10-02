<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Planner" />
    
    <AuthenticatedLayout>

        <div class="w-full h-screen flex justify-center items-center">
            <H1>
                PLANNER
            </H1>
        </div>
        
    </AuthenticatedLayout>
</template>