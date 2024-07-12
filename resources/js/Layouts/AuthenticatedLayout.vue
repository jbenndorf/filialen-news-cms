<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import DropdownTitle from '@/Components/DropdownTitle.vue';

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Filialen Options -->
                            <div class="ms-3 relative">
                                <Dropdown align="left" width="48">
                                    <template #trigger>
                                        <DropdownTitle :name="'Filialen'"></DropdownTitle>
                                    </template>
                                    <template #content>
                                        <div v-for="filiale in $page.props.data.filialen" :key="filiale.id">
                                            <DropdownLink :href="route('filialen.show', filiale.id)" method="get"> {{ filiale.name }} </DropdownLink>
                                        </div>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Profile Options -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                    <DropdownTitle :name="$page.props.auth.user.name"></DropdownTitle>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                    </div>
                </div>

            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
