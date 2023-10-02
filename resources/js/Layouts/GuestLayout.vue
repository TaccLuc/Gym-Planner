<script setup>
</script>

<template>

    <main class="h-screen relative overflow-hidden">

        <div class="h-screen w-screen bg-image md:bg-image-md bg-cover bg-center my-animation absolute inset-0"></div>

        <div class="absolute inset-0 flex flex-wrap items-center justify-center bg-black bg-opacity-50 h-screen w-screen text-center">
            
            <div class="bg-stone-800 bg-opacity-40 rounded-3xl w-4/5 md:w-3/6 lg:w-2/6 text-white py-5 px-2">
                <div class="h-[150px] md:h-[150px] lg:h-[200px] mb-5 bg-white bg-opacity-60 rounded-full w-fit px-4 pb-4 pt-1 mx-auto lg:pb-5">
                    <img src="/images/logo.png" alt="Logo" class="object-contain h-full w-full">
                </div>
                <slot />

            </div>

        </div>
    </main>

</template>

<style scoped>

.bg-image {
    background-image: url('images/gym_mobile.jpg');
}

.my-animation {
    animation: zoom 5s infinite alternate linear;
}


/* 
    Media Queries
*/

@media (min-width: 768px) {
    .md\:bg-image-md {
        
        background-image: url('/public/images/gym_desktop.jpg');
    }
}


/* 
    Animations
*/

@keyframes zoom {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.05);
    }
}

</style>
