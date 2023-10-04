<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import FormInput from '../../Components/FormInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: GuestLayout,
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
    <Head title="Welcome" />
    
        <form @submit.prevent="submit" class="xl:px-7 mb-5">
            <div>
                
                <FormInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Email"
                />
            </div>

            <div class="mt-4 xl:text-left">
            
                <FormInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    placeholder="Password"
                />
                
                <InputError class="mt-2" :message="form.errors.email" />
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
                
            </div>

        </form>

        <div class="h-[1px] border border-white w-full lg:w-5/6 lg:mx-auto mb-3"></div>

            <Link :href="route('register')" class="underline text-gray-300 text-lg hover:text-gray-100">
                Register
            </Link>

</template>
