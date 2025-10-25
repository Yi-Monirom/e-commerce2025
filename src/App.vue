<script setup lang="ts">
import { defineAsyncComponent } from 'vue'
const CategoryComponent = defineAsyncComponent(() => import('./components/CategoryComponent.vue'))
</script>

<template>
  <div>
    <CategoryComponent />
  </div>
</template>

<style scoped>
/* Add your styles here */
</style>

