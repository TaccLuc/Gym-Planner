<script setup>
import FormInput from '../../Components/FormInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import MovementCard from '../../Components/MovementCard.vue';
import { ref } from 'vue';

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    movements: Object
});

const form = useForm({
    name: '',
    reps: '',
    max_weight: ''
});

const add = ref(false);
const enableAdd = () => {
    add.value = true;
}
</script>

<template>
    <Head title="Personal Records" />

        <div class="border p-2 w-11/12 lg:w-2/4">
            <button v-if="add == false" @click="enableAdd" class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black">
                Add a PR
            </button>
            <button v-else class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black">
                Save
            </button>
            
            <div v-if="add == true" class="my-4">
                <div class="w-full border-b py-1">
                    <FormInput
                        id="name"
                        type="text"
                        v-model="form.name"
                        required
                        placeholder="Name" 
                        class="border-b-0 capitalize mt-0 p-0 text-xl"
                    />
                </div>
            
            
                <div class="py-1 flex">
                    <FormInput
                    id="reps"
                    type="number"
                    v-model="form.reps"
                    placeholder="Reps" 
                    class="border-b-0 mt-0 p-0 text-xl w-2/4"
                    />

                    <FormInput 
                    id="max_weight"
                    type="number"
                    v-model="form.max_weight"
                    placeholder="Kg"
                    class="border-b-0 mt-0 p-0 text-xl text-right w-2/4"
                    />
                </div>
                
                
            </div>
            
            <!-- Movement List -->
            <template v-for="movement in movements">
                
                <MovementCard :movement="movement" />

            </template>
            
        </div>

</template>