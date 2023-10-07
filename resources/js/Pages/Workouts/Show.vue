<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import WeekCard from '../../Components/WeekCard.vue';
import { ref } from 'vue';
import html2pdf from 'html2pdf.js';

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

// DELETION TOGGLE + LOGIC

const window = ref(false);
const showWindow = () => {
    window.value = !window.value;
};

const deleteWorkout = () => {
    router.delete(`/workouts/${data.workout.id}`)
}

// EXPORT AS PDF
const exportAsPDF = async () => {
    const content = document.querySelector('#mainContent');

    const options = {
        margin: 0,
        filename: `${data.workout.slug}.pdf`,
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 1 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' },
    };

    const excludedElements = document.querySelectorAll('.ignorePDF');
      excludedElements.forEach((element) => {
        element.classList.add('hidden');
      });
    
    await html2pdf().from(content).set(options).save();

    setTimeout(() => {
        excludedElements.forEach((element) => {
            element.classList.remove('hidden');
        });
    }, 0);
}
</script>

<template>
    <Head title="SingleWorkout" />

        <main class="w-full h-full lg:px-20 relative" id="mainContent">

            <div class="w-full h-min flex justify-center flex-wrap">

                <!-- WORKOUT NAME -->
                <div class="w-full">
                    <div class="capitalize w-full mb-4 text-3xl pb-4 border-b text-center py-1 px-2 break-words">
                        <i class="fa-regular fa-calendar me-3 text-red-800"></i>
                        {{ workout.name }}
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="p-2 w-full flex flex-wrap justify-center lg:justify-around ignorePDF">
                    <button @click="addWeek" class="mb-4 text-2xl lg:text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-50 px-4 hover:bg-white hover:bg-opacity-60 hover:text-black">
                        Add a week
                    </button>
                    <button @click="exportAsPDF" class="mb-4 text-2xl lg:text-3xl text-center border border-white py-1 rounded px-4 hover:bg-white hover:bg-opacity-10 hover:underline">
                        Download as PDF
                    </button>
                    <button @click="showWindow" class="mb-4 text-lg lg:text-3xl text-center border border-white py-1 rounded bg-red-800 bg-opacity-50 px-4 hover:bg-opacity-80">
                        Delete Workout
                    </button>
                </div>

                <!-- WEEKS -->
                <template v-if="weeks">
                    <div v-for="(week, index) in weeks" :key="week.id" class="w-full px-2">

                        <WeekCard :week="week" :index="index" :days="data.days" :exercises="data.exercises" />

                    </div>
                </template>

            </div>

            <!-- CONFIRM DELETION WINDOW -->
            <div v-if="window" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 border bg-black bg-opacity-90 h-[600px] w-[300px] md:h-[450px] md:w-[600px]
                px-4 flex items-center justify-center
            ">
                <div class="text-xl text-center font-bold lg:text-3xl">
                    <div class="mb-10">
                        <span>
                            You are permanently deleting
                        </span>
                        <span class="capitalize text-red-700 block text-3xl py-2">
                            {{ workout.name }}
                        </span>
                    </div>

                    <div class="flex justify-around">
                        <button @click="deleteWorkout" class="text-red-700 hover:underline">
                            Delete
                        </button>
                        <button @click="showWindow" class="hover:underline">
                            Back
                        </button>
                    </div>
                </div>
            </div>

        </main>
        
</template>