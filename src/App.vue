<script setup lang="ts">
import { defineAsyncComponent } from 'vue'

const CategoryComponent = defineAsyncComponent(() => import('./components/CategoryComponent.vue'))
const PromoCard = defineAsyncComponent(() => import('./components/PromoCard.vue'))
</script>

<template>
  <div class="page-container">
    <div class="center-content" style="transform: scale(0.8);">
      <CategoryComponent />
      <PromoCard />
    </div>
  </div>
</template>

<style scoped>

.page-container {
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;  
  align-items: center;     
}


.center-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px; 
}


</style>
