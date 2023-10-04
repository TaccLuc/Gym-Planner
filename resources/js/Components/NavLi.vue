<script setup>
</script>

<template>

    <li class="text-xl active:bg-gray-500 w-screen lg:w-full py-2 border-b relative group cursor-pointer">
        
        <div class="lg:h-full lg:w-full lg:scale-x-0 lg:bg-white lg:bg-opacity-20 lg:absolute lg:-z-10 lg:top-0 lg:group-hover:scale-x-100 lg:transition-all lg:duration-500 lg:ease-in-out"></div>
        <slot />
    </li>

</template>