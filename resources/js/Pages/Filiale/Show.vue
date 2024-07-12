<template>
    <div class="mx-auto py-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-xl font-semibold text-gray-800">{{ filiale.name }}</h1>
            <div class="mt-6">
                <p class="text-lg text-gray-700">
                    Wilkommen bei Filiale <span class="font-bold">{{ filiale.name }}</span>!
                </p>
            </div>
            <div class="mt-6">
                <Link :href="route('news.index', filiale.id)" as="button" class="dandelion text-sm rounded-md p-2">News anschauen</Link>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

export default {
    components: {
    Link,
    Head
},
    layout: AuthenticatedLayout,
    props: {
        filiale: Object
    }
}
</script>