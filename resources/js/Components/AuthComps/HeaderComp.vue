<script setup>
import NavLi from '../NavLi.vue';
import {Link} from '@inertiajs/vue3';
import { ref } from 'vue';

let hidden = ref(true);

const menuToggle = () => {
    hidden.value = !hidden.value;
};

</script>

<template>
    <header class="bg-black bg-opacity-80 text-white">

        <div class="flex justify-between items-center border-b-2 px-4 py-3">
            <div class="w-[70px] border border-2 border-white rounded-full pb-1 px-1">
                <Link :href="route('planner')" class="pointer">
                    <img src="/images/logo.png" alt="Logo">
                </Link>
            </div>

            <button @click="menuToggle" class="text-3xl p-1 h-min active:border active:border-2 active:border-white active:rounded">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <div :class="{'h-0' : hidden, 'h-44' : !hidden}" class="overflow-hidden transition-all duration-1000 ease-in-out">
            <nav>
                <ul class="mt-2 flex flex-col space-y-2.5">
                    <NavLi>
                        <span class="px-4">
                            Prova
                        </span>
                    </NavLi>
                    <NavLi>
                        <span class="px-4">
                            Test
                        </span>
                    </NavLi>
                    <NavLi>
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