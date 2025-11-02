<script setup lang="ts">
import { defineAsyncComponent } from 'vue'
const CategoryComponent = defineAsyncComponent(() => import('./components/CategoryComponent.vue'))
const PromoCard = defineAsyncComponent(() => import('./components/PromoCard.vue'))


</script>

<template>
  <div>
    <CategoryComponent />
    <PromoCard />
  </div>
</template>



<style scoped>
/* Add your styles here */
</style>

