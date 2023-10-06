<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout,
});

const props = defineProps({
                workout: Object,
                weeks: Array
            });

const weekForm = ({
    workout_id: props.workout.id
});

const addWeek = () => {
    router.post('/weeks', weekForm);
};

</script>

<template>
    <Head title="SingleWorkout" />

        <main>

            <div class="w-full h-full flex justify-center overflow-auto flex-wrap">

                <!-- WORKOUT NAME -->
                <div class="p-2 w-full">
                    <div class="capitalize w-full mb-4 text-3xl text-center py-1 px-2 break-all">
                        <i class="fa-regular fa-calendar me-3 text-red-800"></i>
                        {{ workout.name }}
                    </div>
                </div>

                <!-- ADD A WEEK -->
                <div class="p-2 w-full text-center">
                    <button @click="addWeek" class="mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 px-4 hover:bg-white hover:bg-opacity-50 hover:text-black">
                        Add a week
                    </button>
                </div>

                <!-- WEEKS -->
                <template v-if="weeks">
                    <div v-for="(week, index) in weeks" :key="week.id" class="w-full">
                        Week: {{ index + 1 }}
                    </div>
                </template>

            </div>

        </main>
        
</template>