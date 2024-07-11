<template>
    <div>
      <Head title="Erstelle News" />
      <h1 class="mb-8 text-3xl font-bold">
        <Link class="text-indigo-400 hover:text-indigo-600" href="/news">News</Link>
        <span class="text-indigo-400 font-medium">/</span> Neu erstellen
      </h1>
      <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
        <form @submit.prevent="store">
          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <text-input v-model="form.title" :error="form.errors.name" class="pb-8 pr-6 w-full lg:w-1/2" label="Headline" />
            <text-input v-model="form.description" :error="form.errors.description" class="pb-8 pr-6 w-full lg:w-1/2" label="Beschreibung" />
          </div>
          <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
            <loading-button :loading="form.processing" class="btn-indigo" type="submit">Hinzufügen</loading-button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { Head, Link } from '@inertiajs/vue3'
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
  import TextInput from '@/Components/Dropdown.vue';
  import LoadingButton from '@/Components/LoadingButton.vue'
  
  export default {
    components: {
      Head,
      Link,
      LoadingButton,
      TextInput,
    },
    layout: AuthenticatedLayout,
    remember: 'form',
    data() {
      return {
        form: this.$inertia.form({
          title: null,
          description: null
        }),
      }
    },
    methods: {
      store() {
        this.form.post('/news')
      },
    },
  }
  </script>