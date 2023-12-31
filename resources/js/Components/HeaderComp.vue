<script setup>
import NavLi from './NavLi.vue';
import {Link, usePage, useForm, router} from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// SHARED DATA
const page = usePage();
const workoutsList = computed(() => page.props.workoutsList);
const user = ref(page.props.auth.user);

// TOGGLE
const hiddenNav = ref(true);
const navToggle = () => {
    hiddenNav.value = !hiddenNav.value;
};

const hidden = ref(true);
const menuToggle = () => {
    hidden.value = !hidden.value;
};

const addWO = ref (false);
const WOToggle = () => {
    addWO.value = !addWO.value;
};

// FORM DATA + LOGIC

const form = useForm({
    name: '',
    user_id: user.value.id
});

let placeholderValue = 'Insert Name';

const submit = () => {
    router.post('/workouts', form, {
        onFinish:() => {
            form.name = '';
        },
        onSuccess:() => {
            addWO.value = false;
            hiddenNav.value = false;
            menuToggle();
        },
        onError:() => {
            placeholderValue = 'Need unique name'
        }
    });
};

// GET URL
const url = ref(window.location.href.split('/').pop());

router.on('success', () => {
    url.value = window.location.href.split('/').pop();
})

</script>

<template>
    <header class="bg-black text-white z-10 lg:h-screen lg:relative lg:border-e-2 lg:border-white lg:border-opacity-60">

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

        <div :class="{'h-0' : hidden, 'h-[calc(100vh-120px)]' : !hidden, 'opacity-0' : hidden, 'opacity-100' : !hidden}" class="absolute bg-black z-10 transition-all duration-700 ease-in-out lg:bg-transparent lg:static lg:h-[calc(100vh-270px)] lg:opacity-100">
            <nav class="h-full">
                <ul class="overflow-auto lg:h-[calc(100vh-270px)] lg:opacity-100" :class="{'h-0' : hidden, 'h-[calc(100vh-270px)]' : !hidden, 'opacity-0' : hidden, 'opacity-100' : !hidden}">
                    <!-- Rep Maxes -->
                    <NavLi :class="{'bg-red-700' : 'movements' == url, 'bg-opacity-40' : 'movements' == url}">
                        <Link @click="menuToggle" :href="route('movements.index')" class="block">
                            Personal Records
                        </Link>
                    </NavLi>

                    <!-- Create Workout -->
                    <NavLi @click="WOToggle" :class="{'bg-white' : addWO == true, 'bg-opacity-20' : addWO == true}">
                        + Add a workout
                    </NavLi>

                    <!-- Create Workout Form -->
                    <NavLi v-if="addWO">
                        <form @submit.prevent="submit" class="flex justify-between">
                            <input type="text" 
                            :placeholder="placeholderValue"
                            autofocus
                            required
                            v-model="form.name"
                            class="border-0 bg-transparent focus:ring-transparent focus:border-white text-xl p-0 w-5/6 me-2 placeholder:text-sm"
                            >
                            <button type="submit" class="text-white cursor-pointer" :disabled="form.processing">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>
                    </NavLi>

                    <!-- Workouts Toggle -->
                    <template v-if="workoutsList.length > 0">
                        <NavLi @click="navToggle" :class="{'bg-white' : hiddenNav == false, 'bg-opacity-20' : hiddenNav == false}">
                        
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
                    <NavLi v-for="workout in workoutsList" :key="workout.id" :class="{'hidden' : hiddenNav, 'block' : !hiddenNav, 'bg-red-700' : workout.slug == url, 'bg-opacity-40' : workout.slug == url}" class="overflow-hidden" >
                        <Link @click="menuToggle" :href="route('workouts.show', workout.slug)">                            
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