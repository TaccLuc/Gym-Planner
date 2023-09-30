<script setup>
import {Head, Link} from '@inertiajs/vue3';
import GuestLayout from '../Layouts/GuestLayout.vue';

</script>

<template>
    <GuestLayout>
        <Head title="Welcome"/>
        <div>
            <h3>
                Already have an account?
            </h3>
            <Link  href="/login" class="text-lg border border-white py-1 px-3 rounded-full bg-white bg-opacity-10">
                Login
            </Link>
            <h3>
                Or you can create a new one
            </h3>
            <Link href="/register" class="text-lg border border-white py-1 px-3 rounded-full bg-white bg-opacity-10">
                Register
            </Link>
        </div>

    </GuestLayout>
</template>

<style>

</style>
