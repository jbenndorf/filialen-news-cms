<template>
  <div class="bg-gray p-6">
    <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-gray-700">Überschrift</label>
                <input v-model="form.title" type="text" class="mt-1 block w-full" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Beschreibung</label>
                <textarea v-model="form.description" class="mt-1 block w-full"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" @click="$emit('close')" class="mr-4">Abbrechen</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Erstellen</button>
            </div>
        </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

export default {
    props: {
        selectedFiliale: Object,
    },
    setup(props, { emit }) {
        const form = useForm({
            title: '',
            description: ''
        });

        const submit = () => {
            form.post(route('news.store', { filiale: props.selectedFiliale.name }), {
                onSuccess: () => {
                    form.reset();
                    emit('close');
                }
            });
        };

        return {
            form,
            submit
        };
    }
}
</script>
