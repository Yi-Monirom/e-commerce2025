<script lang="ts">
import { defineComponent } from 'vue'
import axios from 'axios'

class PosterItem {
  title: string
  buttonColor: string
  color: string
  url: string
  imag: string

  constructor(
      title: string,
      buttonColor: string,
      color: string,
      url: string,
      imag: string
  ) 
  {
    this.title = title
    this.buttonColor = buttonColor
    this.color = color
    this.url = url
    this.imag = imag
  }
}



export default defineComponent({
  name: 'PosterList',

  data() {
    return {
      item_poster: [
        new PosterItem(
          'image/Cms-1.png',
          'Everyday Fresh & Clean with Our Products',
          'Shop Now',
          'green',
          '#F0E8D5'
        ),
        // new PosterItem(
        //   'image/Cms-2.png',
        //   'Make your Breakfast Healthy and Easy',
        //   'Shop Now',
        //   'green',
        //   '#F3E8E8'
        // ),
        // new PosterItem(
        //   'image/Cms-3.png',
        //   'Discover the Best Deals on Groceries',
        //   'Shop Now',
        //   '#FDC040',
        //   '#E7EAF3'
        // )
       ] as PosterItem[]
    }
  },

  methods: {
    shopnow(item: PosterItem) {
      alert(`Shop Now: ${item.title}`)
    },
    fetchPromotions(){
      axios.get('http://localhost:3000/api/promotions')
        .then(response => {
          if (Array.isArray(response.data) && response.data.length > 0) {
            this.item_poster = response.data.map((promo: any) =>
            new PosterItem(
              promo.title,
              promo.buttonColor,
              promo.color,
              '#', // use real shop link if available
              promo.image.replace(/\\/g, '/') // replace backslashes for Vue
            )
          );

            console.log('Mapped promotions:', this.item_poster);
          } else {
            console.warn('API returned no promotions');
          }
          console.log(this.item_poster);
        })
        .catch(error => {
          console.error('API Error:', error);
        });
    }
  },
  mounted() {
    this.fetchPromotions();
  }
})
</script>

<template>
  
  <div class="poster_list" role="list">
    <div
      v-for="item in item_poster"
      :key="item.title"
      class="poster_item"
      role="listitem"
    >
      <div class="poster_main" :style="{ backgroundColor: item.color }">
        <div class="poster_content">
          <span class="poster_label">{{ item.title }}</span>
          <button
            class="poster_btt"
            :style="{ backgroundColor: item.buttonColor }"
            @click="shopnow(item)"
          >
            {{ "Shop Now" }}
          </button>
        </div>

        <img class="poster_img" :src="item.imag" alt="Poster image" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.poster_list {
  display: flex;
  flex-direction: row;
  overflow-x: auto;
  gap: 24px;
  scroll-behavior: smooth;
  scrollbar-width: none;
}

.poster_main {
  position: relative;
  width: 512px;
  height: 300px;
  border-radius: 12px;
  padding: 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  overflow: hidden;
}

.poster_content {
  z-index: 2;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.poster_label {
  font-size: 20px;
  font-family: 'Quicksand', sans-serif;
  font-weight: bold;
  color: #181818;
  max-width: 250px;
}

.poster_btt {
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 10px 18px;
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.poster_btt:hover {
  background-color: #006400; /* darker green on hover */
}

.poster_img {
  position: absolute;
  bottom: 0;
  right: 20px;
  height: 160px;
  width: auto;
  object-fit: contain;
}
</style>
