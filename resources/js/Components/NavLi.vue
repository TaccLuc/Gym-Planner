<script setup>
</script>

<template>

    <li class="relative text-xl active:bg-gray-500 w-screen lg:w-full py-2 border-b group cursor-pointer">
        
        <div class="lg:h-full lg:w-full lg:scale-x-0 lg:bg-white lg:bg-opacity-20 lg:absolute lg:-z-10 lg:top-0 lg:group-hover:scale-x-100 lg:transition-all lg:duration-500 lg:ease-in-out"></div>
        <div class="px-4 capitalize">
            <slot />
        </div>
    </li>

</template>