<script setup>
import NavLi from './NavLi.vue';
import {Link, usePage} from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const workoutsList = ref(page.props.workoutsList);
const user = ref(page.props.auth.user);

const hiddenNav = ref(true);
const navToggle = () => {
    hiddenNav.value = !hiddenNav.value;
};

const hidden = ref(true);
const menuToggle = () => {
    hidden.value = !hidden.value;
};

</script>

<template>
    <header class="bg-black bg-opacity-90 text-white z-10 lg:h-screen lg:relative lg:border-e-2 lg:border-black lg:border-opacity-60">

        <div class="flex justify-between items-center border-b-2 border-black border-opacity-60 px-4 py-3 h-[120px] lg:justify-center lg:py-5 lg:h-[200px]">

        <div class="w-[80px] bg-gray-200 bg-opacity-20 rounded-full pb-2 px-2 lg:w-[150px] lg:pb-3 lg:px-3">
            <Link :href="route('planner')" class="pointer">
                <img src="/images/logo.png" alt="Logo">
            </Link>
        </div>

        <button @click="menuToggle" class="text-3xl p-1 h-min active:border active:border-2 active:border-white active:rounded lg:hidden">
            <i class="fa-solid fa-bars"></i>
        </button>
        </div>

        <div :class="{'h-0' : hidden, 'h-[calc(100vh-120px)]' : !hidden, 'opacity-0' : hidden, 'opacity-100' : !hidden}" class="absolute bg-black bg-opacity-90 z-10 transition-all duration-700 ease-in-out lg:bg-transparent lg:static lg:h-[calc(100vh-270px)] lg:opacity-100">
            <nav class="h-full">
                <ul class="overflow-auto h-[calc(100vh-270px)]">
                    <!-- Rep Maxes -->
                    <NavLi>
                        <Link :href="route('movements.index')">
                            Personal Records
                        </Link>
                    </NavLi>

                    <!-- Create Workout -->
                    <NavLi>
                        + Add a workout
                    </NavLi>

                    <!-- Workouts Toggle -->
                    <template v-if="workoutsList.length > 0">
                        <NavLi @click="navToggle">
                        
                        <div class="flex">
                            <span class="grow">
                                My workouts
                            </span>
                            <span class="flex-none transition-all duration-600 ease-linear" :class="{'-rotate-180' :!hiddenNav}">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                        
                        </NavLi>
                    </template>

                    <!-- Workouts cycle -->
                    <NavLi v-for="workout in workoutsList" :class="{'hidden' : hiddenNav, 'block' : !hiddenNav}" class="overflow-hidden">
                        <Link :href="route('workouts.show', workout.slug)">
                            
                            <div class="flex">
                                <span class="grow">
                                    {{ workout.name }}
                                </span>
                                <span class="flex-none">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>
                            </div>
                            
                        </Link>
                    </NavLi>
                    
                </ul>
                    
                <!-- Logout Button -->
                <div class="text-xl active:bg-gray-500 w-screen lg:w-full py-2 border-b group cursor-pointer bg-white bg-opacity-20 absolute bottom-0 h-[70px] border-b-0 lg:block"
                    :class="{'hidden' : hidden}"
                >
        
                    <div class="lg:h-full lg:w-full lg:scale-x-0 lg:bg-white lg:bg-opacity-20 lg:absolute lg:-z-10 lg:top-0 lg:group-hover:scale-x-100 lg:transition-all lg:duration-500 lg:ease-in-out"></div>
                    
                    <Link :href="route('logout')" method="post" as="button" class="p-4 w-full text-left">
                        <i class="fa-solid fa-right-from-bracket me-2 text-red-500"></i>
                        Logout 
                    </Link>

                </div>
                                   
            </nav>
        </div>

    </header>
</template>