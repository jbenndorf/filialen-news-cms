<template>
  <div class="title-container">
    <h1 class="title">Wilkommen zu ihrem News CMS! <br> Bitte wählen eine Filiale um News zu bearbeiten.</h1>
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
    filialen: Array
}
}
</script>

<style>
  .title-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 10vh;
    background-color: #f0f0f0;
}
</style>