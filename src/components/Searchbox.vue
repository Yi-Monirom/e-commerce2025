
<!-- SearchBox Component -->
<template id="search-box-template" class="flex justify-center mt-6 ">
  <div class="flex items-center bg-white border-2 border-gray-300 rounded-lg overflow-hidden max-w-2xl w-full">
    <select class="px-4 py-3 border-r border-gray-300 focus:outline-none bg-white text-sm">
      <option>All Categories</option>
      <option>Vegetables</option>
      <option>Fruits</option>
      <option>Meat & Seafood</option>
      <option>Bakery</option>
    </select>
    <input 
      type="text"
      v-model="searchQuery"
      placeholder="Search for items"
      class="flex-1 px-4 py-3 focus:outline-none text-sm"
    />
    <button class="px-6 py-3 hover:bg-gray-50 transition">
      <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </button>
  </div>
</template>
<script>
export default {
    name: "SearchBox",
  data() {
    
    return {
      searchQuery: ''
    }
  }
}
</script>