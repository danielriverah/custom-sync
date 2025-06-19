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
    nombre: props.proyecto.nombre,
    slug: props.proyecto.slug,
    descripcion: props.proyecto.descripcion,
});

const submit = () => {
    form.put(route('admin.proyectos.update', props.proyecto.proyecto_id));
};
</script>

<template>
    <AppLayout title="Editar Proyecto">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Proyecto</h2>
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
                            <InputLabel for="slug" value="Slug" />
                            <TextInput id="slug" v-model="form.slug" class="mt-1 block w-full" />
                            <InputError :message="form.errors.slug" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <InputLabel for="descripcion" value="Descripción" />
                            <textarea id="descripcion" v-model="form.descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            <InputError :message="form.errors.descripcion" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end">
                            <Link :href="route('admin.proyectos.index')" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Cancelar</Link>
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Guardar
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Módulos</h3>
                <div class="mb-2">
                    <Link :href="route('admin.proyectos.modulos.create', proyecto.proyecto_id)" class="text-sm text-indigo-600 hover:underline">Nuevo módulo</Link>
                </div>
                <ul v-if="proyecto.modulos && proyecto.modulos.length" class="list-disc ml-5 space-y-4">
                    <li v-for="modulo in proyecto.modulos" :key="modulo.modulo_id">
                        <div class="font-semibold">{{ modulo.nombre }}</div>
                        <p class="text-sm text-gray-600" v-if="modulo.descripcion">{{ modulo.descripcion }}</p>

                        <ul v-if="modulo.submodulos && modulo.submodulos.length" class="list-disc ml-5 mt-2 space-y-2">
                            <li v-for="sub in modulo.submodulos" :key="sub.submodulo_id">
                                <div class="font-semibold">{{ sub.nombre }}</div>
                                <p class="text-sm text-gray-600" v-if="sub.descripcion">{{ sub.descripcion }}</p>

                                <ul v-if="sub.documentos && sub.documentos.length" class="list-decimal ml-5 mt-1 space-y-1">
                                    <li v-for="doc in sub.documentos" :key="doc.documento_id">
                                        <div class="font-semibold">{{ doc.titulo }}</div>
                                        <p class="text-xs text-gray-600" v-if="doc.contenido">{{ doc.contenido }}</p>

                                        <ul v-if="doc.recursos && doc.recursos.length" class="ml-4 list-disc mt-1 space-y-1">
                                            <li v-for="recurso in doc.recursos" :key="recurso.recurso_id" class="text-xs">
                                                <span class="font-medium">{{ recurso.tipo }}:</span>
                                                <a :href="recurso.url" target="_blank" class="text-indigo-600 hover:underline ml-1">{{ recurso.url }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul v-if="modulo.documentos && modulo.documentos.length" class="list-decimal ml-5 mt-2 space-y-1">
                            <li v-for="doc in modulo.documentos" :key="doc.documento_id">
                                <div class="font-semibold">{{ doc.titulo }}</div>
                                <p class="text-xs text-gray-600" v-if="doc.contenido">{{ doc.contenido }}</p>

                                <ul v-if="doc.recursos && doc.recursos.length" class="ml-4 list-disc mt-1 space-y-1">
                                    <li v-for="recurso in doc.recursos" :key="recurso.recurso_id" class="text-xs">
                                        <span class="font-medium">{{ recurso.tipo }}:</span>
                                        <a :href="recurso.url" target="_blank" class="text-indigo-600 hover:underline ml-1">{{ recurso.url }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div v-else class="text-sm text-gray-500">No hay módulos asociados.</div>
            </div>
        </div>
    </AppLayout>
</template>
