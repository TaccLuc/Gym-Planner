<script setup>
import FormInput from '../../Components/FormInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router, usePage } from '@inertiajs/vue3';
import MovementCard from '../../Components/MovementCard.vue';
import { ref } from 'vue';

// PROPS
defineProps({
    movements: Object,
    errors: Object
});

// SHARED DATA
defineOptions({
    layout: AuthenticatedLayout,
});

const page = usePage();
const user = ref(page.props.auth.user);

// TOGGLE
const add = ref(false);
const enableAdd = () => {
    add.value = true;
}

// FORM DATA + LOGIC
const form = useForm({
    name: '',
    reps: '',
    max_weight: '',
    user_id: user.value.id
});


const submit = () => {
    router.post('/movements', form, {
        onSuccess:() => {
            add.value = false;
            form.reset();
        }
    });
};

</script>

<template>
    <Head title="Personal Records" />

        <div class="w-full h-full flex justify-center overflow-auto">
            <div class="p-2 w-11/12 lg:w-2/4 ">
                
                <!-- ADD BUTTON -->
                <button v-if="add == false" @click="enableAdd" class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-50 hover:bg-white hover:bg-opacity-60 hover:text-black">
                    Add a PR
                </button>

                <!-- ADD PR FORM -->
                <form v-else @submit.prevent="submit">
                    
                    <!-- SAVE BUTTON -->
                    <button  type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                    class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black">
                        Save
                    </button>
                    
                    <div  class="my-4">
                        <div class="text-center text-xl">
                            <span v-if="errors.name == null">
                                Add a new PR
                            </span>
                            <span v-else class="text-red-500">
                                {{ errors.name }}
                            </span>
                        </div>

                        <!-- FORM -->
                        <div class="w-full border-b py-1">
                            <FormInput
                                id="name"
                                type="text"
                                v-model="form.name"
                                required
                                placeholder="Name" 
                                class="border-b-0 capitalize mt-0 p-0 w-full text-xl"
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
                </form>
                
                
            
            
                <!-- Movement List -->
                <template v-for="movement in movements" :key="movement.id">
                    
                    <MovementCard :movement="movement" />

                </template>
                
            </div>
        </div>

</template>