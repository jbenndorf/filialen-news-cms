<template>
    <div class="mx-auto py-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800">{{ selectedFiliale.name }}</h1>
            </div>
            <div class="mt-6">
                <p class="text-lg text-gray-700">
                    Wilkommen bei Filiale <span class="font-bold">{{ selectedFiliale.name }}</span>!
                </p>
            </div>
            <div class="mt-6">
                <NavLink :href="route('news.index', selectedFiliale.name)">News anschauen</NavLink>
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
    layout: AuthenticatedLayout,
    props: {
        selectedFiliale: Object,
        filialen: Array
    }
}
</script>