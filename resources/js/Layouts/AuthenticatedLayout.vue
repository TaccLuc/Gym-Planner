<script setup>
import HeaderComp from '../Components/AuthComps/HeaderComp.vue';

</script>

<template>

    <div class="min-h-screen lg:grid lg:grid-cols-6 xl:grid-cols-12 bg-image md:bg-image-md">
        <div class="lg:col-span-1 xl:col-span-2">

            <HeaderComp />

        </div>

        <div class="lg:col-span-5 xl:col-span-10">
            <slot />
        </div>
    </div>

</template>

<style scoped>
.bg-image {
    background-image: url('images/bg_mobile.jpg');
}
/* 
    Media Queries
*/

@media (min-width: 768px) {
    .md\:bg-image-md {
        
        background-image: url('/public/images/bg_desktop.jpg');
    }
}
</style>
