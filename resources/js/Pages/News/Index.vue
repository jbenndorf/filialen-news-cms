<template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800">{{ selectedFiliale.name }}: News</h1>
            </div>
            <ul>
                <li v-for="news in news" :key="news.id">
                    <h2>{{ news.title }}</h2>
                    <p>{{ news.description }}</p>
                    <img :src="`/storage/${news.image}`"/>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import PostCreate from './Create.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    props: {
        selectedFiliale: Object,
        filialen: Array,
        news: Array
    },
    layout: AuthenticatedLayout,
    components: {
        PostCreate
    }
}
</script>