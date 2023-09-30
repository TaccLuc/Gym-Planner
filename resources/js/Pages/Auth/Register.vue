<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit" class="xl:px-7 text-left">
            <div>
                <label for="name" class="text-xs">
                    Name
                </label>
                <input
                    id="name"
                    type="text"
                    class="mt-1 h-[35px] block w-full text-black rounded border-none focus:ring-red-700"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Name"
                />

            </div>

            <div class="mt-2">
                <label for="email" class="text-xs">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    class="mt-1 h-[35px] block w-full text-black rounded border-none focus:ring-red-700"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="Email"
                />

            </div>

            <div class="mt-2">
                <label for="password" class="text-xs">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    class="mt-1 h-[35px] block w-full text-black rounded border-none focus:ring-red-700"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                />

            </div>

            <div class="mt-2">
                <label for="password_confirmation" class="text-xs">
                    Confirm Password
                </label>
                <input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 h-[35px] block w-full text-black rounded border-none focus:ring-red-700"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm Password"
                />

            </div>

            <div class="mt-6 text-center">
                
                <button class="w-full block mt-3 mb-2 lg:w-2/5 lg:mx-auto text-lg border border-white py-1 rounded-full bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black" 
                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </button>

                <Link
                :href="route('login')"
                class="underline text-gray-300 text-sm hover:text-gray-100"
                >
                    Already registered?
                </Link>

            </div>
        </form>
    </GuestLayout>
</template>
