<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';

// Color set for random hover colors
const color_set = [
  { bg: '#E8F9EF', hover: '#c8f1dc' },
  { bg: '#FFF0E6', hover: '#ffd8c2' },
  { bg: '#EAFEEC', hover: '#d4f8da' },
  { bg: '#FFECEF', hover: '#ffd6dc' },
  { bg: '#FFF8E7', hover: '#ffefc8' },
  { bg: '#F1EDFF', hover: '#e2d9ff' },
  { bg: '#EBFAEE', hover: '#d5f4dc' },
  { bg: '#EAF6FF', hover: '#d2ecff' },
  { bg: '#FFF3E0', hover: '#ffe3b8' }
];

// Class to map API data
class CategoryItem {
  img: string;
  name: string;
  count: number;
  prefix: string;
  color: string;
  hover_color: string;

  constructor(img: string, name: string, count: number, prefix: string = "item(s)", color: string | null = null, hover_color: string | null = null) {
    const random_color = color_set[Math.floor(Math.random() * color_set.length)]!;
    this.img = img;
    this.name = name;
    this.count = count;
    this.prefix = prefix;
    this.color = color ?? random_color.bg;
    this.hover_color = hover_color ?? random_color.hover;
  }
}

// Reactive array for categories
const item_category = ref<CategoryItem[]>([]);

// Fetch categories from API
onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:3000/api/categories');

    // Check if API returned data
    if (Array.isArray(response.data) && response.data.length > 0) {
      item_category.value = response.data.map((cat: any) => 
        new CategoryItem(
          // Fix backslashes in path and ensure proper URL
          cat.image.replace(/\\/g, '/'), 
          cat.name, 
          cat.productCount,
          'item(s)',
          cat.color
        )
      );
      console.log('Mapped categories:', item_category.value);
    } else {
      console.warn('API returned no categories');
    }

  } catch (error) {
    console.error('API Error:', error);
  }
});
</script>

<template>
  <div class="category_list" role="list">
    <p v-if="item_category.length === 0">Loading categories...</p>
    <button
      v-for="item in item_category"
      :key="item.name"
      role="menuitem"
      type="button"
      class="category_btt"
      :style="{ '--bg': item.color, '--hover': item.hover_color }"
    >
      <img class="category_img" :src="item.img" alt="Category image">
      <span class="category_name">{{ item.name }}</span>
      <span class="category_count">{{ item.count }} {{ item.prefix }}</span>
    </button>
  </div>
</template>

<style scoped>
.category_list {
  display        : flex;
  flex-direction : row;
  overflow-x: scroll;
  scrollbar-width: none;
  margin-bottom: 50px;
}

.category_btt {
  padding         : 5px;
  min-width       : 100px;
  width           : 136px;
  height          : 177px;
  margin          : 10px;
  display         : flex;
  flex-direction  : column;
  justify-content : center;
  align-items     : center;
  background      : var(--bg);
  border          : 1px solid rgba(0, 0, 0, 0.06);
  border-radius   : 8px;
}

.category_btt:hover {
  background : var(--hover);
}

.category_img {
  width         : 65%;
  margin-bottom : 10px;
}

.category_name {
  font-size     : 11px;
  font-weight   : bold;
  margin-bottom : 5px;
}

.category_count {
  font-size : 10px;
  color     : lightslategray;
}
</style>
