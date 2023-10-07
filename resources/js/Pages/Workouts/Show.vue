<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import WeekCard from '../../Components/WeekCard.vue';

// SHARED DATA
defineOptions({
    layout: AuthenticatedLayout,
});

// PROPS
const data = defineProps({
                workout: Object,
                weeks: Array,
                days: Array,
                exercises: Array
            });

// FORM DATA + LOGIC
const weekForm = useForm({
    workout_id: data.workout.id
});

const addWeek = () => {
    weekForm.workout_id = data.workout.id;
    router.post('/weeks', weekForm);
};

</script>

<template>
    <Head title="SingleWorkout" />

        <main class="w-full lg:px-20">

            <div class="w-full h-full flex justify-center flex-wrap">

                <!-- WORKOUT NAME -->
                <div class="w-full">
                    <div class="capitalize w-full mb-4 text-3xl text-center py-1 px-2 break-words">
                        <i class="fa-regular fa-calendar me-3 text-red-800"></i>
                        {{ workout.name }}
                    </div>
                </div>

                <!-- ADD A WEEK -->
                <div class="p-2 w-full text-center">
                    <button @click="addWeek" class="mb-4 text-2xl lg:text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-50 px-4 hover:bg-white hover:bg-opacity-60 hover:text-black">
                        Add a week
                    </button>
                </div>

                <!-- WEEKS -->
                <template v-if="weeks">
                    <div v-for="(week, index) in weeks" :key="week.id" class="w-full px-2">

                        <WeekCard :week="week" :index="index" :days="data.days" :exercises="data.exercises" />

                    </div>
                </template>

            </div>

        </main>
        
</template>