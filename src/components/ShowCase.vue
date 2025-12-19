<template id="showcase-template">
  <div>
    <div class="relative overflow-hidden py-16 px-8">
    <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-yellow-50 z-0"></div>
    <div class="absolute inset-0 bg-[url('../../public/image/pattern_bg.png')] bg-center bg-repeat opacity-30 z-0"></div>

    <div class="absolute top-0 left-0 w-64 h-64 bg-red-500 transform -rotate-12 -translate-x-32 -translate-y-32 z-10"></div>

    <div class="max-w-7xl mx-auto flex items-center justify-between relative z-20">
      <div class="flex-1 max-w-xl">
        <h2 class="text-5xl font-bold text-gray-900 mb-4 leading-tight">
          Don't miss amazing<br />grocery deals
        </h2>
        <p class="text-gray-600 mb-8 text-lg">Sign up for the daily newsletter</p>
        
        <div class="flex items-center space-x-4">
          <div class="flex-1 max-w-md relative">
            <input 
              type="email"
              v-model="email"
              placeholder="Your email address"
              class="w-full pl-12 pr-4 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
            />
            <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <button class="px-8 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition font-medium">
            Subscribe
          </button>
        </div>
      </div>

      <!-- Fruit Basket Image -->
      <div class="flex-1 flex justify-end">
        <div class="relative w-full max-w-lg">
          <img 
            src="../../image/apple.png"
            alt="Fresh fruits in basket"
            class="w-full h-auto object-contain drop-shadow-2xl"
          />
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
  import Searchbox from './Searchbox.vue';  
export default {
    name: "ShowCase",
    components: {
      Searchbox
    },
  data() {
    return {
      email: ''
    }
  }
}
</script>