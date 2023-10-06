<script setup>
import FormInput from './FormInput.vue';
import { ref } from 'vue';
import { useForm, router, usePage } from '@inertiajs/vue3';

// PROPS
const data = defineProps({
                movement: Object
            })

// SHARED DATA
const page = usePage();
const user = ref(page.props.auth.user);

// TOGGLE MENU
const edit = ref(false);
const enableEdit = () => {
    edit.value = true;
}

// FORM DATA + LOGIC
const form = useForm({
    name: data.movement.name,
    reps: data.movement.reps,
    max_weight: data.movement.max_weight,
    user_id: user.value.id
})

const submit = () => {
    router.put(`/movements/${data.movement.id}`, form, {
        onSuccess:() => {
            edit.value = false;
        }
    });
};

const deleteMov = () => {
    router.delete(`/movements/${data.movement.id}`);
}

</script>

<template>

    <div class="flex justify-between text-xl rounded flex-wrap bg-white bg-opacity-40 p-1 mb-2">

        <!-- Card -->
        <template v-if="edit == false">
            <div class="capitalize w-full border-b py-1">
                {{ movement.name }}
            </div>
            <div v-if="movement.reps != null" class=" py-1">
                {{ movement.reps }}
                <span v-if="movement.reps == 1">
                    rep
                </span>
                <span v-else>
                    reps
                </span>
            </div>
            <div v-if="movement.max_weight != null">
                
                {{ movement.max_weight }}kg
                
            </div>
        </template>

        <!-- Edit Form -->
        <template v-else>
            <div class="w-full border-b py-1">
                <FormInput
                    id="name"
                    type="text"
                    v-model="form.name"
                    required
                    :placeholder="movement.name" 
                    class="border-b-0 capitalize p-0 text-xl"
                />
            </div>
            
            <div  v-if="movement.reps !=null" class="py-1 w-2/4">
                <FormInput
                id="reps"
                type="number"
                v-model="form.reps"
                :placeholder="movement.reps" 
                class="border-b-0 p-0 text-xl inline-block w-3/5"
                />
                <span v-if="movement.reps == 1">
                    rep
                </span>
                <span v-else>
                    reps
                </span>
            </div>
            
            
            <div v-if="movement.max_weight != null" class="py-1 flex items-center w-2/4">
                <FormInput 
                id="max_weight"
                type="number"
                v-model="form.max_weight"
                :placeholder="movement.max_weight"
                class="border-b-0 p-0 text-xl text-right"
                />
                kg
            </div>
            
            
        </template>

        <!-- Buttons -->
        <div class="w-full border-t py-1">
            
            <button v-if="edit == false" @click="enableEdit" class="me-5 hover:underline">
                Edit
            </button>
            <button v-else @click="submit" class="me-5 hover:underline">
                Save
            </button>
            
            <button @click="deleteMov" class="text-red-800 hover:underline">
                Delete
            </button>
        </div>
    </div>

</template>