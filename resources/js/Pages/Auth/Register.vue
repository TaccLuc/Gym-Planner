<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import FormInput from '../../Components/FormInput.vue';
import InputError from '@/Components/InputError.vue';
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
    <Head title="Register" />
    
    <GuestLayout>

        <form @submit.prevent="submit" class="xl:px-7 text-left">

            <div class="mb-6">

                <FormInput
                    id="name"
                    type="text"
                    class="h-[35px]"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mb-6">
               
                <FormInput
                    id="email"
                    type="email"
                    class="h-[35px]"
                    v-model="form.email"
                    required
                    autocomplete="username"
                    placeholder="Email"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mb-6">
                
                <FormInput
                    id="password"
                    type="password"
                    class="h-[35px]"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mb-6">
               
                <FormInput
                    id="password_confirmation"
                    type="password"
                    class="h-[35px]"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Confirm Password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="mt-6 text-center">
                
                <button class="w-full block mt-3 mb-2 lg:w-2/5 lg:mx-auto text-lg border border-white py-1 rounded-full bg-white bg-opacity-10 hover:bg-white hover:bg-opacity-50 hover:text-black" 
                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </button>

                <Link
                :href="route('/')"
                class="underline text-gray-300 text-sm hover:text-gray-100"
                >
                    Already registered?
                </Link>

            </div>
        </form>
    </GuestLayout>
</template>
