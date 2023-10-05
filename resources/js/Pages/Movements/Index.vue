<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({
    movements: Object
});
</script>

<template>
    <Head title="Personal Records" />

        <div class="border p-2 w-11/12">
            <button class="block w-full mb-4 text-3xl text-center border border-white py-1 rounded bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black">
                Add a PR
            </button>

            <template v-for="movement in movements">
                <div class="flex justify-between text-xl rounded flex-wrap bg-white bg-opacity-40 p-1 mb-2">
                    <div class="capitalize w-full border-b">
                        {{ movement.name }}
                    </div>
                    <div v-if="movement.reps > 0">
                        {{ movement.reps }}
                        <span v-if="movement.reps == 1">
                            rep
                        </span>
                        <span v-else>
                            reps
                        </span>
                    </div>
                    <div>
                        {{ movement.max_weight }}kg
                    </div>
                    <div class="w-full border-t">
                        <button class="me-5">
                            Edit
                        </button>
                        <button>
                            Delete
                        </button>
                    </div>
                </div>
                
            </template>
        </div>

</template>