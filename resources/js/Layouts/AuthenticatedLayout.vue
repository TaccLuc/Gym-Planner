<script setup>
import HeaderComp from '../Components/AuthComps/HeaderComp.vue';

</script>

<template>

    <div class="max-h-screen bg-image lg:grid lg:grid-cols-6 xl:grid-cols-12 ">
        <div class="lg:col-span-1 xl:col-span-2">

            <HeaderComp />
    
        </div>

        <div class="h-[calc(100vh-120px)]  lg:h-screen lg:col-span-5 xl:col-span-10">
            <slot />
        </div>
    </div>

</template>

<style scoped>
.bg-image {
    background-image: url('/public/images/bg_desktop.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

</style>
