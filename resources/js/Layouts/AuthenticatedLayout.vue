<script setup>
import HeaderComp from '../Components/AuthComps/HeaderComp.vue';

</script>

<template>

    <div class="min-h-screen lg:grid lg:grid-cols-6 xl:grid-cols-9">
        <div class="lg:col-span-1 xl:col-span-1">

            <HeaderComp />

        </div>

        <div class="bg-blue-300 lg:col-span-5 xl:col-span-8">
            <slot />
        </div>
    </div>

</template>
