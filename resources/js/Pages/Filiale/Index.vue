<template>
    <div class="mx-auto py-10 lg:px-8">
        <div class="dandelion overflow-hidden shadow-xl sm:rounded-lg p-6">
          <h1 class="text-xl font-semibold text-gray-800">
            Wilkommen zu ihrem News CMS!
          </h1>
          <div class="mt-6">
            <p class="text-lg text-gray-700">
              Bitte wählen Sie eine Filiale aus.
            </p>
          </div>
        </div>
    </div>
</template>
  
<script>
import { Head } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import NavLink from '@/Components/NavLink.vue';

export default {
    components: {      
      Head,
      NavLink
    },

    layout: AuthenticatedLayout
    }
</script>