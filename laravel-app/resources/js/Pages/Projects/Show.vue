<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    proyecto: Object,
});
</script>

<template>
    <AppLayout :title="`Proyecto: ${proyecto.nombre}`">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ proyecto.nombre }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">{{ proyecto.nombre }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Slug</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">{{ proyecto.slug }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3">{{ proyecto.descripcion }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6 text-right">
                        <Link :href="route('admin.proyectos.edit', proyecto)" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</Link>
                        <Link :href="route('admin.proyectos.index')" class="text-gray-600 hover:text-gray-900">Volver</Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
