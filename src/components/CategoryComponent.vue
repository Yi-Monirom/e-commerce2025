<script >


export default {
  name: "CategoryList",
  props: {
    categories: Array
  }
};
// import { ref, onMounted } from 'vue';
// import axios from 'axios';

// // Color set for random hover colors
// const color_set = [
//   { bg: '#E8F9EF', hover: '#c8f1dc' },
//   { bg: '#FFF0E6', hover: '#ffd8c2' },
//   { bg: '#EAFEEC', hover: '#d4f8da' },
//   { bg: '#FFECEF', hover: '#ffd6dc' },
//   { bg: '#FFF8E7', hover: '#ffefc8' },
//   { bg: '#F1EDFF', hover: '#e2d9ff' },
//   { bg: '#EBFAEE', hover: '#d5f4dc' },
//   { bg: '#EAF6FF', hover: '#d2ecff' },
//   { bg: '#FFF3E0', hover: '#ffe3b8' }
// ];

// // Class to map API data
// class CategoryItem {
//   img: string;
//   name: string;
//   count: number;
//   prefix: string;
//   color: string;
//   hover_color: string;

//   constructor(img: string, name: string, count: number, prefix: string = "item(s)", color: string | null = null, hover_color: string | null = null) {
//     const random_color = color_set[Math.floor(Math.random() * color_set.length)]!;
//     this.img = img;
//     this.name = name;
//     this.count = count;
//     this.prefix = prefix;
//     this.color = color ?? random_color.bg;
//     this.hover_color = hover_color ?? random_color.hover;
//   }
// }

// // Reactive array for categories
// const item_category = ref<CategoryItem[]>([]);

// // Fetch categories from API
// onMounted(async () => {
//   try {
//     const response = await axios.get('http://localhost:3000/api/categories');

//     // Check if API returned data
//     if (Array.isArray(response.data) && response.data.length > 0) {
//       item_category.value = response.data.map((cat: any) => 
//         new CategoryItem(
//           // Fix backslashes in path and ensure proper URL
//           cat.image.replace(/\\/g, '/'), 
//           cat.name, 
//           cat.productCount,
//           'item(s)',
//           cat.color
//         )
//       );
//       console.log('Mapped categories:', item_category.value);
//     } else {
//       console.warn('API returned no categories');
//     }

//   } catch (error) {
//     console.error('API Error:', error);
//   }
// });
</script>

<template>
  <!-- <div class="category_list" role="list">
    <p v-if="item_category.length === 0">Loading categories...</p>
    <button
      v-for="item in item_category"
      :key="item.name"
      role="menuitem"
      type="button"
      class="category_btt"
      :style="{ '--bg': item.color, '--hover': item.hover_color }"
    >
      <img class="category_img" :src="`http://localhost:3000/${item.img}`" alt="Category image">
      <span class="category_name">{{ item.name }}</span>
      <span class="category_count">{{ item.count }} {{ item.prefix }}</span>
    </button>
  </div> -->
   <div class="categories-wrapper">
    <div class="categories">
      <div
        class="category-card"
        v-for="(cat, index) in categories"
        :key="index"
        :style="{ backgroundColor: cat.color }"
      >
        <img :src="`http://localhost:3000/${cat.image}`" :alt="cat.name" />
        <h4>{{ cat.name }}</h4>
        <p>{{ cat.productCount }} items</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
.categories-wrapper {
 
  padding-bottom: 15px;
}

.categories {
  display: flex;
  gap: 20px;
  min-width: max-content;
}

.category-card {
  min-width: 110px;
  text-align: center;
  padding: 18px;
  border-radius: 10px;
  transition: 0.3s;
  border: 1px solid #eee;
}

.category-card img {
  width: 60px;
  height: 60px;
  margin-bottom: 8px;
}

.category-card h4 {
  font-size: 14px;
  font-weight: 600;
}

.category-card p {
  font-size: 12px;
  color: gray;
}

.category-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}
</style>
