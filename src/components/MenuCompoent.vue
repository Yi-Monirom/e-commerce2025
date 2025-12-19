<template>
  <div class="grid grid-cols-[auto_1/2fr_1fr_auto] grid-rows-2 gap-y-3 px-6 py-3 border-b">

    <!-- LOGO -->
    <div class="flex items-center gap-x-3 border-b border-gray-300">
      <img src="../../image/icon.png" alt="Logo" class="w-10 h-auto">
      <div class="leading-tight">
        <span class="block text-sm font-semibold">Melon</span>
        <span class="block text-xs text-gray-500">MART & GROCERY</span>
      </div>
    </div>

    <!-- SEARCH -->
    <div class="col-span-2 border-b border-gray-300">
      <SearchBox />
    </div>

    <!-- ACTIONS -->
    <div class="flex justify-end gap-x-8 text-sm col-span-2  col-end-6  items-center border-b border-gray-300">
      <MenuItem><span class="pi pi-user"> Account</span></MenuItem>
      <MenuItem><span class="pi pi-sync"> Compare</span></MenuItem>
      <MenuItem><span class="pi pi-heart"> Wishlist</span></MenuItem>
      <MenuItem><span class="pi pi-shopping-cart"> Cart</span></MenuItem>
      
      
      
    </div>

      <!-- BROWSE -->
      <MenuItem
        href="/categories"
        isButton
        hasPadding
        class="col-span-1  border-b border-gray-300 "
      >
        <span class="pi pi-microsoft"></span>
        <select class="  focus:outline-none ">
          <option>Browse All Categories</option>
          <option>Vegetables</option>
          <option>Fruits</option>
          <option>Meat & Seafood</option>
          <option>Bakery</option>
        </select>
      </MenuItem>

      <!-- HOT DEAL -->
      <MenuItem
        href="/hot-deals"
        className="px-4 py-5 border-b border-gray-300 "
      >
        <template #icon>
        <span class="pi pi-sparkles"></span>
        </template>Hot Deals
        
      </MenuItem>


    <!-- MENU LINKS -->
    <div class="col-span-2 py-2 flex gap-x-6 text-xs border-b border-gray-300">
      <MenuItem href="/">Home</MenuItem>
      <MenuItem href="/food">Food</MenuItem>
      <MenuItem href="/vegetables">Vegetables</MenuItem>
      <MenuItem href="/drink">Drink</MenuItem>
      <MenuItem href="/cookies">Cookies</MenuItem>
      <MenuItem href="/meat">Meat & Seafood</MenuItem>
      <MenuItem href="/bakery">Bakery</MenuItem>
    </div>

    <!-- CONTACT -->
    <div class="row-span-2 flex flex-col gap-0 mb-3 text-gray-700 border-b border-gray-300 ">

      <MenuItem 
       class="text-[18px] leading-tight ">
        <span class="pi pi-headphones"></span>
        <span class="text-[#3BB77E]">+990 -3888</span>
      </MenuItem>
      <span class="text-xs text-center">
        24/7 support center
      </span>

    </div>

  </div>
</template>

<script>
import MenuItem from "@/components/MenuItem.vue";
import SearchBox from "@/components/SearchBox.vue";

import 'primeicons/primeicons.css'

export default {
  name: "HeaderBar",
  components: {
    MenuItem,
    SearchBox
  }
};
</script>
