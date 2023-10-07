<script setup>
import FormInput from './FormInput.vue';
import { ref } from 'vue';
import { useForm, router } from '@inertiajs/vue3';

// PROPS
const data = defineProps({
    exercise: Object,
    day: Number
})

// TOGGLE MENU
const edit = ref(false);
const enableEdit = () => {
    edit.value = true;
}

// FORM DATA + LOGIC

const exerciseForm = useForm({
    'name': data.exercise.name,
    'sets': data.exercise.sets || '',
    'reps': data.exercise.reps || '',
    'percentage': data.exercise.percentage || '',
    'weight': data.exercise.weight || '',
    'day_id': data.day
})

const submit = () => {
    router.put(`/exercises/${data.exercise.id}`, exerciseForm, {
        onSuccess:() => {
            edit.value = false;
        }
    });
};

// DELETE EXERCISE

const deleteExercise = () => {
    router.delete(`/exercises/${data.exercise.id}`)
};

</script>

<template>

    <div class="border-t py-3 flex justify-between items-center w-full md:text-lg lg:text-xl gap-1 xl:px-1">
        
        <!-- SHOW EXERCISE -->
        <template v-if="!edit">
            <div class="w-1/4 break-all">
                <span @click="enableEdit" class="capitalize cursor-pointer hover:underline">
                    {{ exercise.name }}
                </span>
            </div>

            <div class="w-1/4 md:text-center">
                {{ exercise.sets }}
                <span v-if="exercise.sets && exercise.reps">
                    x
                </span>
                {{ exercise.reps }}
            </div>

            <div class="w-1/4 md:text-center">
                <span v-if="exercise.percentage">
                    {{ exercise.percentage }}%
                </span>
            </div>

            <div class="w-1/4 md:text-right">
                <span v-if="exercise.weight">
                    {{ exercise.weight }}kg
                </span>
            </div>
        </template>

        <!-- MODIFY EXERCISE -->
        <template v-else>
            <form @submit.prevent="submit" class="w-full flex justify-between items-center flex-wrap">
                <div class="w-1/4">
                    <FormInput
                        id="name"
                        type="text"
                        v-model="exerciseForm.name"
                        required
                        placeholder="Name" 
                        class="border-b-0 capitalize mt-0 p-0 w-full lg:text-xl placeholder:text-gray-400 py-2"
                    />
                </div>

                <div class="w-1/4 flex gap-2">
                    <FormInput
                        id="sets"
                        type="text"
                        v-model="exerciseForm.sets"
                        placeholder="Sets" 
                        class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-xs lg:text-xl py-2"
                    />
                    <FormInput
                        id="reps"
                        type="text"
                        v-model="exerciseForm.reps"
                        placeholder="Reps" 
                        class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 text-xs py-2 lg:text-xl"
                    />
                </div>

                <div class="w-1/4">
                    <FormInput
                        id="percentage"
                        type="number"
                        v-model="exerciseForm.percentage"
                        placeholder="%" 
                        class="border-b-0 capitalize mt-0 p-0  text-center w-full placeholder:text-gray-400 text-xs py-2 lg:text-xl"
                    />
                </div>

                <div class="w-1/4">
                    <FormInput
                        id="weight"
                        type="number"
                        v-model="exerciseForm.weight"
                        placeholder="kg" 
                        class="border-b-0 capitalize mt-0 p-0 w-full placeholder:text-gray-400 py-2 lg:text-xl text-right"
                    />
                </div>
                <div class="w-full text-sm md:text-lg lg:text-xl flex justify-between">
                    <button type="submit" class="hover:underline border-t">
                        Save
                    </button>
                    <button @click="deleteExercise" type="button" class="text-red-700 hover:underline font-bold border-t">
                        Delete
                    </button>
                </div>
            </form>
        </template>

    </div>

</template>