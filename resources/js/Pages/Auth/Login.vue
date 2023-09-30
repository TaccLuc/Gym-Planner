<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

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
        <Head title="Login" />

        <form @submit.prevent="submit" class="xl:px-7">
            <div class="xl:text-left">
                <label for="email" class="xl:ml-1">
                    Email 
                </label>

                <input
                    id="email"
                    type="email"
                    class="mt-1 block w-full text-black rounded"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

            </div>

            <div class="mt-4 xl:text-left">
                <label for="password" class="xl:ml-1">
                    Password 
                </label>

                <input
                    id="password"
                    type="password"
                    class="mt-1 block w-full text-black rounded"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"/>
                    <span class="ml-2 text-sm text-gray-300">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <button class="ml-4 text-lg border border-white py-1 px-3 rounded-full bg-white bg-opacity-10" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Login
                </button>
            </div>
        </form>
    </GuestLayout>
</template>
