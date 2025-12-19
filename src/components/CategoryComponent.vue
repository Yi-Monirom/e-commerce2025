<script >


export default {
  name: "CategoryList",
  props: {
    categories: Array
  }
};

</script>

<template>
 
   <div class="categories-wrapper  ">
    <div class="categories">
      <div
        class="category-card "
        v-for="(cat, index) in categories"
        :key="index"
        :style="{ backgroundColor: cat.color }"
        
        
      >  
        <router-link :to="`/productdetail/${cat.id}`">
          <img :src="`http://localhost:3000/${cat.image}`" :alt="cat.name" />
        </router-link>
                
        
        <h4 class="text-black ">{{ cat.name }}</h4>
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
  display: grid;
  gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
}

.category-card {
  min-height: 250px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 18px;
  border-radius: 10px;
  border: 1px solid #eee;
  transition: 0.3s;
}

.category-card img {
  width: 90px;
  height: 90px;
  margin-bottom: 8px;
}

</style>
