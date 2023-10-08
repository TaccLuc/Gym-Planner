<script setup>
import DayCard from './DayCard.vue';
import { useForm, router } from '@inertiajs/vue3';

// PROPS
const data = defineProps({
                week: Object,
                index: Number,
                days: Array,
                exercises: Array
            })

// FORM DATA + LOGIC
const dayForm = useForm({
    week_id: data.week.id
});

const addDay = () => {
    router.post('/days', dayForm);
};

// DELETE WEEK
const deleteWeek = () => {
    router.delete(`/weeks/${data.week.id}`);
    
}

const test = () => {
    console.log(data.days[data.index]);
}

</script>

<template>

    <div class="border rounded p-1 mb-4">
        <div class="flex justify-between flex-wrap lg:justify-start mb-4">
            <div class="lg:w-full">
                <span class="lg:text-3xl" @click="test">
                    Week {{ data.index + 1 }}
                    <button @click="deleteWeek" class="ms-1 ignorePDF">
                        <i class="fa-solid fa-xmark text-red-700"></i>
                    </button>
                </span>
            </div>
            <button @click="addDay" class="text-sm lg:text-lg hover:underline ignorePDF">
                <i class="fa-solid fa-plus text-red-700"></i>
                Add Day
            </button>
        </div>

        <template v-if="data.days[data.index]">
            <div class="lg:flex lg:flex-wrap ">
                <div v-for="(day, index) in data.days[data.index]" :key="days.id" class="w-full px-2 xl:w-2/6">

                    <DayCard :day="day" :index="index" :exercises="data.exercises" />

                </div>
            </div>
        </template>
    </div>

</template>