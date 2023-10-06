<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: [String, Number],
        required: true,
    },
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
        class="block w-full border-t-0 border-e-0 border-s-0 bg-transparent placeholder-white focus:ring-transparent focus:border-white"
    />
</template>

<style scoped>
    input:-webkit-autofill,
    textarea:-webkit-autofill,
    select:-webkit-autofill {
                -webkit-box-shadow: 0 0 0 1000px #1b1b1bc2 inset !important;
                -webkit-text-fill-color: rgb(255, 255, 255) !important;
            }
</style>    