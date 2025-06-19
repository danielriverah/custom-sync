<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    proyecto: Object,
});

const form = useForm({
    nombre: '',
    descripcion: '',
    orden: ''
});

const submit = () => {
    form.post(route('admin.proyectos.modulos.store', props.proyecto.proyecto_id));
};
</script>

<template>
    <AppLayout title="Crear Módulo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Módulo</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="nombre" value="Nombre" />
                            <TextInput id="nombre" v-model="form.nombre" class="mt-1 block w-full" autofocus />
                            <InputError :message="form.errors.nombre" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <InputLabel for="descripcion" value="Descripción" />
                            <textarea id="descripcion" v-model="form.descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            <InputError :message="form.errors.descripcion" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <InputLabel for="orden" value="Orden" />
                            <TextInput id="orden" v-model="form.orden" type="number" class="mt-1 block w-full" />
                            <InputError :message="form.errors.orden" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end">
                            <Link :href="route('admin.proyectos.edit', props.proyecto.proyecto_id)" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Cancelar</Link>
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Guardar
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
