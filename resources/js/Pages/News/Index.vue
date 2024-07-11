<template>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800">{{ selectedFiliale.name }}: News</h1>
                <button
                    @click="showCreateForm = true"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition"
                >
                    News erstellen
                </button>
            </div>
            <div v-if="news.length === 0" class="mt-4">
                <p class="text-gray-600">Derzeit sind keine News verfügbar. Sie können gerne welche erstellen!</p>
            </div>
            <ul v-else class="mt-4 space-y-4">
                <li v-for="newsItem in news" :key="newsItem.id" class="bg-gray-100 p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">{{ newsItem.title }}</h2>
                    <p class="mt-2 text-gray-600">{{ newsItem.description }}</p>
                    <img v-if="newsItem.image" :src="`/storage/${newsItem.image}`" class="mt-2 max-w-full rounded-lg"/>
                </li>
            </ul>
            <div v-if="showCreateForm" class="mt-6">
                <CreateNews @close="showCreateForm = false" :selectedFiliale="selectedFiliale"/>
            </div>
        </div>
    </div>
</template>

<script>
import CreateNews from '@/Pages/News/CreateNews.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    props: {
        selectedFiliale: Object,
        filialen: Array,
        news: Array
    },
    layout: AuthenticatedLayout,
    components: {
        CreateNews
    },
    data() {
        return {
            showCreateForm: false
        };
    }
}
</script>