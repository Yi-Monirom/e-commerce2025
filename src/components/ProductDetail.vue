<script>
import { useProductStore } from "@/Store/Products";

export default {
  name: "Productdetail",
components:{
  Header,
},
  data() {
    return {
      product: null,
      loading: true,
      error: null,
      quantity: 1,
      selectedImage: null,
      
    };
  },

  computed: {
    productImages() {
      if (!this.product || !this.product.image) return [];
      try {
        const images = JSON.parse(this.product.image);
        return Array.isArray(images) ? images : [this.product.image];
      } catch {
        return [this.product.image];
      }
    },
  },

  async mounted() {
    const store = useProductStore();

  
    if (!store.loaded) {
      await store.loadAll();
    }

    const productId = this.$route.params.id;
    this.product = store.getProductById(productId);

    if (!this.product) {
      this.error = "Product not found";
    } else {
      this.selectedImage = this.productImages[0];
    }

    this.loading = false;
  },

  methods: {
    star(rating) {
      const full = Math.floor(rating || 0);
      return "⭐".repeat(full) + "☆".repeat(5 - full);
    },

    selectImage(img) {
      this.selectedImage = img;
    },

    increaseQuantity() {
      if (this.quantity < this.product.instock) {
        this.quantity++;
      } else {
        alert(`Sorry, only ${this.product.instock} left`);
      }
    },

    decreaseQuantity() {
      if (this.quantity > 1) this.quantity--;
    },

    addToCart() {
      alert(`Added ${this.quantity} x ${this.product.name}`);
    },
  },
};
</script>

<template>
<div>
  <Header/>
  <div class="m-10 flex gap-5 items-center">
    <span>Home</span>
    <img src="/down.png" alt="" class="rotate-270 w-[6px] h-[10px]">
    <span>Vegetables & tubers</span>
    <img src="/down.png" alt="" class="rotate-270 w-[6px] h-[10px]">
    <span class="text-[#3BB77E]">{{ product?.name }}</span>
  </div>
    <!-- setion1 -->
  <div class="flex gap-[50px]">
    <!-- Images -->
    <div class="flex-shrink-0 wrap-anywhere">
      <div 
        v-for="(image, index) in productImages.slice(0, 4)" 
        :key="index"
        @click="selectImage(image)"
        :class="[
          'w-[800px] h-[600px] border-2 rounded-lg p-2 cursor-pointer transition',
          selectedImage === image ? 'border-[#E5E5E5]' : 'border-gray-200 hover:border-[#3BB77E]' 
        ]"
      >
        <img 
          :src="`http://localhost:3000/${image}`"
          :alt="`${product.name} ${index + 1}`"
          class="w-full h-full object-contain"
        >
      </div>

      <!-- choose -->
      <div class="flex flex-cols items-center gap-10 mt-[30px] mb-[20px]">
        <div class="rounded-full  w-[60px] h-[40px]  flex items-center justify-center bg-[#F2F3F4]  hover:bg-[#3BB77E] border border-black transition hover:scale-110">
          <img src="/larrow.png" alt="">
        </div>

        <div class="border border-[#3BB77E]  rounded-lg w-[120px] h-[120px]  flex items-center justify-center">
            <img src="/orange.png" alt="">
        </div>
        <div class="border border-[#3BB77E]  rounded-lg w-[120px] h-[120px]  flex items-center justify-center">
            <img src="/orange.png" alt="">
        </div>
                <div class="border border-[#3BB77E]  rounded-lg w-[120px] h-[120px]  flex items-center justify-center">
            <img src="/orange.png" alt="">
        </div>
        <div class="rounded-full  w-[60px] h-[40px]  flex items-center justify-center bg-[#F2F3F4]  hover:bg-[#3BB77E] border border-black transition hover:scale-110">
          <img src="/rarrow.png" alt="">
        </div>
      </div>





    </div>

    <div class="flex-1">

    <div v-if="product?.instock != 0" class="bg-[#DEF9EC] rounded-[4px] w-[90px] flex justify-center">
      <span class="text-green-500">In Stock</span>
    </div>
    <div v-else-if="product?.instock === 0" class="bg-red-500 rounded-[4px] w-[95px] flex justify-center">
      <span class="text-white">Out of Stock</span>
    </div>


        <!-- title -->
        <span class="text-[40px] text-[#253D4E] font-[Quicksand]">{{ product?.name }}</span>
        
        <!-- star -->
          <div class="flex flex-cols gap-4 items-center">
              <span>{{ star(product?.rating) }}</span>
              <span>{{ product?.rating }}</span>
          </div>

          <!-- price -->
        <div class="flex items-center gap-[100px]">
          <span class="text-[#3BB77E] text-[80px] ">${{ product?.price }}</span>
          <span class="text-[40px] line-through text-[#B6B6B6]">$42</span>
        </div>


        <!-- description -->
        <div>
          <span40px class="text-[20px] text-[#7E7E7E]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!</span40px>
        </div>

        <!-- add to cart -->

    <div class="flex items-center gap-4 mt-[100px]">

      
      <!-- Quantity Box -->
      <div class="w-[115px] flex items-center border border-[#3BB77E] rounded-lg px-4 py-2 gap-[40px]">
        <span class="text-[#3BB77E] font-semibold pl-[10px]">{{ quantity }}</span>

        <div class="flex flex-col gap">
          <button class="text-[#3BB77E] leading-none  " @click="increaseQuantity()" >
            ▲
          </button>
          <button class="text-[#3BB77E] leading-none" @click="decreaseQuantity()">
            ▼
          </button>
        </div>
      </div>

      <!-- Add to Cart Button -->
      <button class="flex items-center gap-2 bg-[#3BB77E] text-white px-6 py-3 rounded-lg" @click="addToCart()"    >
        <img src="/fi-rs-shopping-cart.png" alt="">
        <i class="fa fa-shopping-cart"></i>
        Add To Cart
      </button>

      <!-- Wishlist Button -->
      <button class="w-12 h-12 border-[#F2F3F4] flex items-center justify-center border rounded-lg text-gray-400 ">
        <img src="/fi-rs-heart 1.png " alt="" class="transition hover:scale-110">
        <i class="fa fa-heart"></i>
      </button>

      <!-- Compare Button -->
      <button class="w-12 h-12 border-[#F2F3F4] flex items-center justify-center border rounded-lg text-gray-400">
        <img src="/fi-rs-shuffle 1.png" alt="">
        <i class="fa fa-random"></i>
      </button>

    </div>

        <!-- end -->
        <div class="mt-[100px] ">
          <div class="flex gap-4">
            <span class="">Vendor:</span>
            <span class="text-[#B6B6B6]">NestMart</span>
          </div>
          <div> 
            <div class="flex gap-4">
              <span class="">SKU:</span>
              <span class="text-[#B6B6B6]">FWM15VKT</span>
            </div>
          </div>
        </div>
    <div>
    </div>
    </div>

  

</div>
     
  <div class="border-2 rounded-lg border-[#F2F3F4] h-[190px]">

      <div class="ml-[50px] mt-[10px]">
        <div>
          <div class="flex gap-[30px] m-[30px]">
          <span class="border border-[#F2F3F4] rounded-[30px]  w-[140px] h-[35px] flex justify-center items-center shadow-md text-[#B6B6B6] hover:text-[#3BB77E] hover:border-black">Description</span>
          <span class="border border-[#F2F3F4] rounded-[30px]  w-[140px] h-[35px] flex justify-center items-center shadow-md text-[#B6B6B6] hover:text-[#3BB77E] hover:border-black">Additional info</span>
          <span class="border border-[#F2F3F4] rounded-[30px]  w-[120px] h-[35px] flex justify-center items-center shadow-md text-[#B6B6B6] hover:text-[#3BB77E] hover:border-black">Reviews</span>
        </div>
        <span class="font-[Lato] text-[#7E7E7E]">
          Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.

          Spluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because. 
        </span>
      </div>
    </div>
    


  </div>

</div>


</template>

<style scoped>
 
</style>