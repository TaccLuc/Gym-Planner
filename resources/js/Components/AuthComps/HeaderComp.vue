<script setup>
import NavLi from '../NavLi.vue';
import {Link, usePage} from '@inertiajs/vue3';
import { ref } from 'vue';


const page = usePage();
const workoutsList = ref(page.props.workoutsList);
const user = ref(page.props.auth.user);

let hidden = ref(true);

const menuToggle = () => {
    hidden.value = !hidden.value;
};

</script>

<template>
    <header class="bg-black bg-opacity-80 text-white lg:h-screen z-10 lg:relative lg:border-e-2 lg:border-black lg:border-opacity-60">

        <div class="flex justify-between items-center border-b-2 border-black border-opacity-60 px-4 py-3 h-[120px] lg:justify-center lg:py-5 lg:h-[200px]">

            <div class="w-[70px] border border-2 border-black border-opacity-70 rounded-full pb-1 px-1 lg:w-[150px] lg:pb-3 lg:px-3 lg:bg-gray-300 lg:bg-opacity-10">
                <Link :href="route('planner')" class="pointer">
                    <img src="/images/logo.png" alt="Logo">
                </Link>
            </div>

            <button @click="menuToggle" class="text-3xl p-1 h-min active:border active:border-2 active:border-white active:rounded lg:hidden">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div :class="{'h-0' : hidden, 'h-[calc(100vh-120px)]' : !hidden}" class="absolute bg-black bg-opacity-80 z-10 overflow-auto transition-all duration-1000 ease-in-out lg:bg-transparent lg:static lg:h-[calc(100vh-270px)]">
            <nav class="h-full">
                <ul class="flex flex-col h-full">
                    
                    <NavLi v-for="workout in workoutsList">
                        <Link :href="route('workouts.show', workout.slug)">
                            <div class="px-4 block capitalize flex">
                                <span class="grow">
                                    {{ workout.name }}
                                </span>
                                <span class="flex-none">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>
                            </div>
                        </Link>
                    </NavLi>
                    
                    
                    <NavLi class="bg-white bg-opacity-20 lg:absolute lg:bottom-0 lg:h-[70px]">
                        <Link :href="route('logout')" method="post" as="button" class="p-4 w-full text-left">
                            <i class="fa-solid fa-right-from-bracket me-2 text-red-500"></i>
                            Logout 
                        </Link>
                    </NavLi>
                </ul>
            </nav>
        </div>

    </header>
</template>