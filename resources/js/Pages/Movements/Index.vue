<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import MovementCard from '../../Components/MovementCard.vue';

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    movements: Object
});
</script>

<template>
    <Head title="Personal Records" />

        <div class="border p-2 w-11/12">
            <button class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black">
                Add a PR
            </button>

            <template v-for="movement in movements">
                
                <MovementCard :movement="movement" />

            </template>

        </div>

</template>