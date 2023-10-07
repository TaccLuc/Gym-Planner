<script setup>
import Exercise from './Exercise.vue';
import FormInput from '../Components/FormInput.vue';
import { useForm, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// PROPS
const data = defineProps({
    day: Object,
    index: Number,
    exercises: Array
})

// TOGGLE
const hidden = ref(true);
const menuToggle = () => {
    hidden.value = !hidden.value;
    exerciseForm.reset();
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
    router.post('/exercises', exerciseForm, {
        onSuccess: () => {
            exerciseForm.reset();
            hidden.value = true;
        }
    });
    
};

// FILTERED EXERCISES
const filteredExercises = computed(() => 
    data.exercises[data.index].filter((exercise) => exercise.day_id == data.day.id
));

</script>

<template>

    <div class="mb-6">
        <div class="border-b border-white text-2xl mb-1 flex justify-between">
            <span>
                Day {{ index + 1}}
            </span>
            <button @click="deleteDay" class="ms-1 ignorePDF">
                <i class="fa-solid fa-xmark text-red-700"></i>
            </button>
        </div>
        
        <!-- Add exercise form -->
        <div>
           <template v-if="!hidden">
                <form @submit.prevent="addExercise" class="flex flex-wrap w-full">

                    <div class="w-full">
                        <FormInput
                            id="name"
                            type="text"
                            v-model="exerciseForm.name"
                            required
                            placeholder="Name" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>
                    <div class="w-2/4">
                        <FormInput
                            id="sets"
                            type="text"
                            v-model="exerciseForm.sets"
                            placeholder="Sets" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>
                    <div class="w-2/4">
                        <FormInput
                            id="reps"
                            type="text"
                            v-model="exerciseForm.reps"
                            placeholder="Reps" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>
                    <div class="w-2/4">
                        <FormInput
                            id="percentage"
                            type="number"
                            v-model="exerciseForm.percentage"
                            min="0" max="100" step="0.1"
                            placeholder="%" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>
                    <div class="w-2/4">
                        <FormInput
                            id="weight"
                            type="number"
                            v-model="exerciseForm.weight"
                            min="0" max="100" step="0.1"
                            placeholder="kg" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>

                    

                    <button type="submit" class="hover:underline me-8 text-red-700 font-bold">
                        Add
                    </button>
                    <button @click="menuToggle" type="reset" class="hover:underline">
                        Cancel
                    </button>
                </form>
           </template>

           <!-- Toggle add exercise -->
           <template v-else>
                <button @click="menuToggle" class="py-1 hover:underline ignorePDF">
                    <span class="text-red-700">
                        <i class="fa-solid fa-plus text-red-700"></i>
                    </span>
                    Add exercise
                </button>
                <span class="italic text-xs ms-2 ignorePDF">
                    (click its name to modify)
                </span>
           </template>

           <!-- Exercises Cycle -->
           <div v-for="exercise in filteredExercises">

                <Exercise :exercise="exercise" :day="data.day.id" />

           </div>

        </div>

    </div>

</template>