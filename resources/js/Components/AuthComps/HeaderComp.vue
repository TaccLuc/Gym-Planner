<script setup>
import {Link} from '@inertiajs/vue3';

</script>

<template>
    <header>

        <Link :href="route('logout')" method="post" as="button">
            Logout
        </Link>

    </header>
</template>