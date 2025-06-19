<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    proyectos: Array,
});
</script>

<template>
    <AppLayout title="Proyectos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Proyectos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-4 text-right">
                    <Link :href="route('admin.proyectos.create')" class="px-4 py-2 bg-indigo-500 text-white rounded">Nuevo Proyecto</Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                <th class="px-6 py-3" />
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="proyecto in proyectos" :key="proyecto.proyecto_id">
                                <td class="px-6 py-4 whitespace-nowrap">{{ proyecto.nombre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ proyecto.slug }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <Link :href="route('admin.proyectos.show', proyecto)" class="text-indigo-600 hover:text-indigo-900 mr-3">Ver</Link>
                                    <Link :href="route('admin.proyectos.edit', proyecto)" class="text-indigo-600 hover:text-indigo-900">Editar</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
