<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout,
});

const props = defineProps({
                workout: Object,
                days: Array
            });

const dayForm = ({
    workout_id: props.workout.id
});

const addDay = () => {
    router.post('/days', dayForm);
};

</script>

<template>
    <Head title="SingleWorkout" />

        <main>

            <div class="w-full h-full flex justify-center overflow-auto flex-wrap">
                <div class="p-2 w-full">
                    <div class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 px-2">
                        {{ workout.name }}
                    </div>
                </div>
                <button @click="addDay">
                    Add a day
                </button>
                <template v-if="days.length > 0">
                    <div v-for="day in days">
                        {{ day.id }}
                    </div>
                </template>
            </div>

        </main>
        
</template>