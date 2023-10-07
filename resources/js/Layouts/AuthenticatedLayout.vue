<script setup>
import HeaderComp from '../Components/HeaderComp.vue';

</script>

<template>

    <div class="max-h-screen bg-image md:bg-image-md lg:grid lg:grid-cols-6 xl:grid-cols-12 ">
        <div class="lg:col-span-1 xl:col-span-2">

            <HeaderComp />
    
        </div>

        <div class="h-[calc(100vh-120px)]  lg:h-screen lg:col-span-5 xl:col-span-10 p-2 lg:p-10">
            <div class="w-full h-full bg-white bg-opacity-10 py-3 rounded text-white flex justify-center items-start overflow-auto lg:pt-20">
                <slot />
            </div>
        </div>
    </div>

</template>

<style scoped>
.bg-image {
    background-image: url('/public/images/bg_mobile.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

/* Media queries */
@media (min-width: 768px) {
    .md\:bg-image-md {
        
        background-image: url('/public/images/bg_desktop.jpg');
    }
}

</style>
