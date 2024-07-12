<template>
  <div class="dandelion-light rounded p-6 shadow">
    <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-gray-700">Überschrift</label>
                <input type="text" class="w-full" v-model="form.title">
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Beschreibung</label>
                <textarea type="text" class="w-full" v-model="form.description"/>
                <InputError class="mt-2" :message="form.errors.description" />
            </div>
            <div v-if="form.errors.general">
                <InputError class="mt-2" :message="form.errors.general" />
            </div>
            <div class="flex justify-end">
                <button type="button" @click="$emit('close')" class="mr-4">Abbrechen</button>
                <PrimaryButton type="submit" class="bg-gray-400">Erstellen</PrimaryButton>
            </div>
        </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
    props: {
        filiale: Object
    },
    setup(props, { emit }) {
        const form = useForm({
            title: '',
            description: ''
        });

        const submit = () => {
            form.post(route('news.store', props.filiale.id), {
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
    },
    components: { InputError, PrimaryButton }
}
</script>
