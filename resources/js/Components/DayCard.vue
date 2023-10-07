<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';

// PROPS
const data = defineProps({
    day: Object,
    index: Number
})

// TOGGLE
const hidden = ref(true);
const menuToggle = () => {
    hidden.value = !hidden.value;
};

// DELETE DAY
const deleteDay = () => {
    router.delete(`/days/${data.day.id}`);
}

// FORM DATA + LOGIC
const exerciseForm = useForm({
    name: '',
    sets: '',
    reps: '',
    percentage: '',
    weight: '',
    day_id: data.day.id
});

const addExercise = () => {
    router.post('/exercises', exerciseForm);
};

</script>

<template>

    <div class="mb-6">
        <div class="border-b text-2xl mb-1 flex justify-between">
            <span>
                Day {{ index + 1}}
            </span>
            <button @click="deleteDay" class="ms-1">
                <i class="fa-solid fa-xmark text-red-700"></i>
            </button>
        </div>

        <div>
           <template v-if="!hidden">
                <form @submit.prevent="addExercise">

                    <button type="submit">
                        Add
                    </button>
                </form>
           </template>

           <template v-else>
                <button @click="menuToggle">
                    Add exercise
                </button>
           </template>

        </div>

    </div>

</template>