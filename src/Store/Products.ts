// products.ts
import { defineStore } from "pinia";

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [] as string[],
    categories: [] as any[],
    products: [] as any[],
    promotions: [] as any[],
    loading: false,
    error: null as string | null
  }),

  persist: true,

  
  getters: {
    getProductById: (state) => {
      return (id: string | number) =>
        state.products.find((p) => String(p.id) === String(id));
    },

    getCategoryById: (state) => {
      return (id: string | number) =>
        state.categories.find((c) => String(c.id) === String(id));
    },

    allCategories: (state) => state.categories,

    allPromotions: (state) => state.promotions,

    getPopularProducts: (state) => {
      const popular = state.products.filter(p => p.popular === true);
      return popular.length ? popular : state.products;
    }
  },

  
  actions: {
    async fetchGroups() {
      try {
        const res = await fetch("http://localhost:3000/api/groups");
        if (!res.ok) throw new Error("Failed to fetch groups");
        this.groups = await res.json();
      } catch (err) {
        console.error("fetchGroups error:", err);
      }
    },

    async fetchProducts() {
      try {
        const res = await fetch("http://localhost:3000/api/products");
        if (!res.ok) throw new Error("Failed to fetch products");
        this.products = await res.json();
      } catch (err) {
        console.error("fetchProducts error:", err);
      }
    },

    async fetchCategories() {
      try {
        const res = await fetch("http://localhost:3000/api/categories");
        if (!res.ok) throw new Error("Failed to fetch categories");
        this.categories = await res.json();
      } catch (err) {
        console.error("fetchCategories error:", err);
      }
    },

   
    async loadAll() {
      this.loading = true;
      this.error = null;

      try {
        await Promise.all([
          this.fetchGroups(),
          this.fetchCategories(),
          this.fetchProducts()
        ]);
      } catch (err: any) {
        this.error = err.message || "Failed to load data";
      } finally {
        this.loading = false;
      }
    }
  }
});
