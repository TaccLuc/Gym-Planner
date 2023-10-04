<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    workout: Object
});

</script>

<template>
    <Head title="SingleWorkout" />


        <main class="w-full h-full flex justify-center items-center">

            <div class="w-[250px] h-[150px] bg-black bg-opacity-50 rounded-xl capitalize text-3xl text-center py-14">
                {{ workout.name }}
            </div>

        </main>
        
</template>