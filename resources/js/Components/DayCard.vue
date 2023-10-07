<script setup>
import { router } from '@inertiajs/vue3';

// PROPS
const data = defineProps({
    day: Object,
    index: Number
})

// DELETE DAY
const deleteDay = () => {
    router.delete(`/days/${data.day.id}`);
}
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
            Ciao
        </div>

    </div>

</template>