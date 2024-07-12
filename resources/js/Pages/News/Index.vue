<template>
<div class="mx-auto py-10 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl rounded p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800">{{ filiale.name }}: News</h1>
                <PrimaryButton @click="showCreateForm = true" class="bg-gray-600">News Erstellen</PrimaryButton>
            </div>
            <div v-if="news.length === 0" class="mt-4">
                <p class="text-gray-600">Derzeit sind keine News verfügbar. Sie können gerne welche erstellen!</p>
            </div>
            <ul v-else class="mt-4">
                <li v-for="newsItem in news" :key="newsItem.id" class="bg-gray-100 mb-6 p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">{{ newsItem.title }}</h2>
                    <p class="mt-2 text-gray-600">{{ newsItem.description }}</p>
                </li>
            </ul>
            <div v-if="showCreateForm" class="mt-6">
                <Create @close="showCreateForm = false" :filiale="filiale"/>
            </div>
        </div>
    </div>
</template>

<script>
import Create from '@/Pages/News/Create.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
    props: {
        filiale: Object,
        news: Array
    },
    layout: AuthenticatedLayout,
    components: {
    Create,
    PrimaryButton
},
    data() {
        return {
            showCreateForm: false
        };
    }
}
</script>