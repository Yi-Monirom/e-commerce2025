// products.ts
import { defineStore } from 'pinia'

export const useProductStore = defineStore('product', {
  state: () => ({
    groups: [] as string[],
    categories: [] as any[],
    products: [] as any[],
    promotions: [] as any[]
  }),
  persist: true,

  actions: {
    async fetchGroups() {
      try {
        const res = await fetch('http://localhost:3000/api/groups')
        if (!res.ok) throw new Error('Failed to fetch groups')
        this.groups = await res.json()
      } catch (err) {
        console.error('fetchGroups error:', err)
      }
    },

    async fetchProducts() {
      try {
        const res = await fetch('http://localhost:3000/api/products')
        if (!res.ok) throw new Error('Failed to fetch products')
        this.products = await res.json()
      } catch (err) {
        console.error('fetchProducts error:', err)
      }
    },

    async fetchCategories() {
      try {
        const res = await fetch('http://localhost:3000/api/categories')
        if (!res.ok) throw new Error('Failed to fetch categories')
        this.categories = await res.json()
      } catch (err) {
        console.error('fetchCategories error:', err)
      }
    }
  }
})
