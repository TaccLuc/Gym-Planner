<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Welcome" />

        <form @submit.prevent="submit" class="xl:px-7 mb-5">
            <div class="xl:text-left">
                
                <input
                    id="email"
                    type="email"
                    class="mt-1 block w-full text-black rounded border-none focus:ring-red-700"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Email"
                />

            </div>

            <div class="mt-4 xl:text-left">
            
                <input
                    id="password"
                    type="password"
                    class="mt-1 block w-full text-black rounded border-none focus:ring-red-700"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    placeholder="Password"
                />

            </div>

            <div class="block mt-4 ml-1">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class=" border-none focus:ring-0 text-red-700"
                    />
                    <span class="ml-2 text-sm text-gray-300">Remember me</span>
                </label>
            </div>

            <div class="mt-4">
                
                <button class="w-full block mt-3 mb-2 lg:w-2/5 lg:mx-auto text-lg border border-white py-1 rounded-full bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black" 
                type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Login
                </button>
                
                <Link
                    :href="route('password.request')"
                    class="underline text-sm text-gray-300 block lg:w-2/5 lg:mx-auto hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>
            </div>

        </form>

        <div class="h-[1px] border border-white w-full lg:w-5/6 lg:mx-auto mb-3"></div>

            <Link :href="route('register')" class="underline text-gray-300 text-lg hover:text-gray-100">
                Register
            </Link>

    </GuestLayout>
</template>
