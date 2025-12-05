<template>
  <div class="home w-full  min-h-screen bg-gray-100 text-black">
  
    <div class="w-full px-6">
      <Header :groups="store.products" />
      <CategoryList :categories="categories" style="padding-top: 30px;" />
      <PromotionList :promotions="promotions" style="padding-bottom: 30px;" />
      <Header :group="store.products" title="Popular Products"/>
      <Products :products="product" />
      <!-- Pinia store values -->
      
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CategoryList from "./components/CategoryComponent.vue";
import PromotionList from "./components/PromoCard.vue";
import Products from "./components/Products.vue";
import Header  from "./components/Header.vue";
import Group from "./components/Group.vue";
import { useProductStore } from "@/Store/Products";

export default {
  name: "Home",

  components: {
    CategoryList,
    PromotionList,
    Header,
    Products,
    Group,
  },
    setup() {
    const store = useProductStore();

    store.fetchGroups();
    store.fetchCategories();
    store.fetchProducts();

    return { store };
  },
  data() {
    return {
      categories: [],
      promotions: [],
      product: [],
      group:[],
      
    };
  },

  methods: {
    async fetchCategories() {
      try {
        const res = await axios.get("http://localhost:3000/api/categories");
        this.categories = res.data;
      } catch (err) {
        console.error("Error loading categories:", err);
      }
    },

    async fetchPromotions() {
      try {
        const res = await axios.get("http://localhost:3000/api/promotions");
        this.promotions = res.data;
      } catch (err) {
        console.error("Error loading promotions:", err);
      }
    },
    async fetchProduct(){
      try{
        const res= await axios.get("http://localhost:3000/api/products")
        this.product = res.data;
      }catch(err){
        console.error("Error loading products:", err); 
      }
    },
    
  },

  mounted() {
    this.fetchCategories();
    this.fetchPromotions();
    this.fetchProduct();
   
  },
};
</script>

<style scoped>
.home {
  width: 100%;
}
</style>
