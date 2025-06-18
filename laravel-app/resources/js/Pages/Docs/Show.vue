<template>
  <div>
    <h1 class="text-2xl font-bold">Documentación</h1>
    <!-- Árbol de navegación y contenido -->
  </div>
</template>

<script setup>
const props = defineProps({
  proyecto: Object,
  moduloId: [Number, String, null],
  submoduloId: [Number, String, null],
  documentoId: [Number, String, null],
})
</script>
