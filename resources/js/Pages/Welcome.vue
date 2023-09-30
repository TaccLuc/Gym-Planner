<script setup>
import {Head, Link} from '@inertiajs/vue3';
import GuestLayout from '../Layouts/GuestLayout.vue';

</script>

<template>
    <GuestLayout>
        <Head title="Welcome"/>
        <div>
            <Link  href="/login">
                Login
            </Link>
            <Link href="route('register')">
                Register
            </Link>
        </div>

    </GuestLayout>
</template>

<style>

</style>
