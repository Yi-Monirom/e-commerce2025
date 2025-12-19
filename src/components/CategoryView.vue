<script>
import { useProductStore } from "@/Store/Products";
import MenuItem from "./MenuCompoent.vue";


export default {
  name: 'CategoryView',
  components: { MenuItem },
  data() {
    return {
      category: null,
      loading: true,
      error: null
    };
  },
  async mounted() {
    const store = useProductStore();

    try {
      // Load categories if empty
      if (!store.categories.length) {
        await store.fetchCategories(); // Or store.loadAll()
      }

      const categoryId = this.$route.params.id;
      if (!categoryId) {
        this.error = "No category ID provided";
        return;
      }

      this.category = store.getCategoryById(categoryId);

      if (!this.category) {
        this.error = "Category not found";
      }
    } catch (err) {
      this.error = err.message || "Failed to load category";
    } finally {
      this.loading = false;
    }
  }
};
</script>



<template> 
  <div> 
    <MenuItem /> 
      <div class="w-[1750px] h-[240px] bg-[#68d4af] rounded-lg mt-5 bg-cover"> 
        <div class="p-[50px]"> 
          <span class="text-[50px] text-[#253D4E] font-[Quicksand] font-bold">
            {{ category ? category.name : '' }}
          </span> 
          <div class="flex flex-cols gap-5 items-center"> 
            <span class="text-[#7E7E7E]">Home</span> 
            <img src="" alt="" class="rotate-270 w-[6px] h-[10px]">
             <span class="text-[#7E7E7E]">Categories</span> 
             <img src="" alt="" class="rotate-270 w-[6px] h-[10px]"> 
             <span class="text-[#7E7E7E]">{{ category?.name }}</span> 
          </div> 
        </div> 
      </div> 
    </div>
  </template>
