<script setup>

defineProps({
    movement: Object
})

</script>

<template>

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