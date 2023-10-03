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
    <header class="bg-black bg-opacity-80 text-white lg:h-screen z-10">

        <div class="flex justify-between items-center border-b-2 px-4 py-3 lg:justify-center lg:py-5 lg:h-[200px]">

            <div class="w-[70px] border border-2 border-white rounded-full pb-1 px-1 lg:w-[150px] lg:pb-3 lg:px-3 lg:bg-gray-300 lg:bg-opacity-70">
                <Link :href="route('planner')" class="pointer">
                    <img src="/images/logo.png" alt="Logo">
                </Link>
            </div>

            <button @click="menuToggle" class="text-3xl p-1 h-min active:border active:border-2 active:border-white active:rounded lg:hidden">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div :class="{'h-0' : hidden, 'h-44' : !hidden}" class="absolute bg-black bg-opacity-80 z-10 overflow-hidden transition-all duration-1000 ease-in-out lg:bg-transparent lg:static lg:h-[calc(100vh-200px)]">
            <nav class="h-full">
                <ul class="mt-2 flex flex-col space-y-2.5 h-full lg:relative">
                    
                    <NavLi v-for="workout in workoutsList" >
                        <Link :href="route('workouts.show', workout.slug)">
                            <span class="px-4 block cursor-pointer capitalize">
                                {{ workout.name }}
                            </span>
                        </Link>
                    </NavLi>
                    
                    <NavLi class="lg:absolute lg:bottom-6">
                        <Link :href="route('logout')" method="post" as="button" class="px-4 w-full text-left">
                            Logout 
                            <i class="fa-solid fa-right-from-bracket ps-4 text-red-500"></i>
                        </Link>
                    </NavLi>
                </ul>
            </nav>
        </div>

    </header>
</template>