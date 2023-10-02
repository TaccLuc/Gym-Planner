<script>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

  export default {
    props: {
      status: Number,
    },
    components: {
        GuestLayout,
        Head
    },
    computed: {
      title() {
        return {
          503: '503: Service Unavailable',
          500: '500: Server Error',
          404: '404: Page Not Found',
          403: '403: Forbidden',
        }[this.status]
      },
      description() {
        return {
          503: 'Sorry, we are doing some maintenance. Please check back soon.',
          500: 'Whoops, something went wrong on our servers.',
          404: 'Sorry, the page you are looking for could not be found.',
          403: 'Sorry, you are forbidden from accessing this page.',
        }[this.status]
      },
    },
  }
</script>

<template>
    <Head :title="title" />
    
    <GuestLayout>
        
        <div>

            <h1 class="text-3xl xl:text-6xl mb-3">
                {{ title }}
            </h1>

            <div class="text-red">
                {{ description }}
            </div>

        </div>

    </GuestLayout>
</template>


  