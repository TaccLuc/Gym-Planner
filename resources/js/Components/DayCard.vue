<script setup>
import FormInput from '../Components/FormInput.vue';
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
                            placeholder="%" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>
                    <div class="w-2/4">
                        <FormInput
                            id="weight"
                            type="number"
                            v-model="exerciseForm.weight"
                            placeholder="kg" 
                            class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-lg py-2"
                        />
                    </div>

                    

                    <button type="submit">
                        Add
                    </button>
                </form>
           </template>

           <!-- Toggle add exercise -->
           <template v-else>
                <button @click="menuToggle" class="py-1 hover:underline">
                    <span class="text-red-700">
                        -
                    </span>
                    Add exercise
                </button>
           </template>

        </div>

    </div>

</template>