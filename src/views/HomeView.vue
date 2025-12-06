<template>
  <div class="homeView w-full min-h-screen bg-gray-100 text-black">
    <div class="w-full px-6">

      <!-- Header using store data -->
      <Header :groups="store.groups" />

      <!-- Category List -->
      <CategoryList :categories="store.categories" style="padding-top: 30px;" />

      <!-- Promotions -->
      <PromotionList :promotions="promotions" style="padding-bottom: 30px;" />

      <!-- Popular Products -->
      <Header :group="store.products" title="Popular Products" />

      <!-- Products Component -->
      <Products :products="store.products" />

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

import CategoryList from "@/components/CategoryComponent.vue";
import PromotionList from "../components/PromoCard.vue";
import Products from "../components/Products.vue";
import Header from "../components/Header.vue";

import { useProductStore } from "@/Store/Products";

const store = useProductStore();


const promotions = ref([]);

async function fetchPromotions() {
  try {
    const res = await axios.get("http://localhost:3000/api/promotions");
    promotions.value = res.data;
  } catch (err) {
    console.error("Error loading promotions:", err);
  }
}

onMounted(() => {
  store.fetchGroups();
  store.fetchCategories();
  store.fetchProducts();

  fetchPromotions();
});
</script>

<style scoped>
.homeView {
  width: 100%;
}
</style>
