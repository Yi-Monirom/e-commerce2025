<template>
    <div class="min-h-screen p-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">
                    <!-- Product Card -->
                    <div v-for="product in products" :key="product.id" 
                         class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-lg transition-shadow duration-200 relative group">
                        
                        <!-- Badge -->                        <div v-if="product.badge" 
                             :class="[product.badge.color, 'absolute top-3 left-3 text-white text-xs font-semibold px-2 py-1 rounded-md z-10']">
                            {{ product.badge.text }}
                        </div>

                        <!-- Product Image -->
                        <div class="relative mb-4 overflow-hidden rounded-lg bg-gray-50">
                            <!-- <img class="image" 
                                 :src="http://localhost:3000/${extract_img(image)}" alt="product_image"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                             <img :src="product.image" 
                                 :alt="product.name"
                                 class=""> --> 
                            <img :src="`http://localhost:3000/${extract_img(product.image)}`" 
                                 :alt="product.name"
                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <!-- Brand -->
                        <p class="text-gray-500 text-xs mb-1">{{ product.brand }}</p>

                        <!-- Product Name -->
                        <h3 class="text-sm font-medium text-gray-800 mb-2 line-clamp-2 h-10">
                            {{ product.name }}
                        </h3>

                        <!-- Rating -->
                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex gap-0.5">
                                <svg v-for="star in 5" :key="star"
                                     :class="[star <= Math.floor(product.rating) ? 'fill-amber-400 text-amber-400' : 'fill-gray-300 text-gray-300', 'w-3 h-3']"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                            </div>
                            <span class="text-xs text-gray-500">({{ product.rating }})</span>
                        </div>

                        <!-- Weight -->
                        <p class="text-xs text-gray-500 mb-3">{{ product.weight }}</p>

                        <!-- Price and Action -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="text-lg font-bold text-gray-900">
                                    ${{ product.price?.toFixed(2) ?? '0.00' }}
                                </span>
                                <span class="text-sm text-gray-400 line-through">
                                    ${{ product.originalPrice?.toFixed(2) ?? '0.00' }}
                                </span>
                            </div>

                            <!-- Quantity Selector (for first product) -->
                            <div v-if="product.id === 1" class="flex items-center border border-gray-300 rounded-md">
                                <button @click="decrementQuantity(product.id)" 
                                        class="px-2 py-1 hover:bg-gray-100 text-gray-600">
                                    -
                                </button>
                                <span class="px-3 py-1 text-sm font-medium">{{ product.quantity }}</span>
                                <button @click="incrementQuantity(product.id)" 
                                        class="px-2 py-1 hover:bg-gray-100 text-gray-600">
                                    +
                                </button>
                            </div>

                            <!-- Add Button -->
                            <button v-else @click="addToCart(product.id)"
                                    class="flex items-center gap-1 bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-md text-sm font-medium hover:bg-emerald-100 transition-colors">
                                Add
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "Products",
    
    props: {
        products: {
            type: Array,
            required: true,
        },
    },
    methods: {
         extract_img(input) {
        if (!input) return "no-image.png";

        // Ensure it's a string like: ["uploads\\product\\file.png"]
        let cleaned = input
            .replace('[\"', '')
            .replace('\"]', '');

        // Split if more than one image
        const parts = cleaned.split('","');

        // Get first part and fix Windows path "\" → "/"
        return parts[0].replace(/\\/g, "/");
    },
        incrementQuantity(productId) {
            const product = this.products.find(p => p.id === productId);
            if (product) {
                product.quantity += 1;
            }
        },
        decrementQuantity(productId) {
            const product = this.products.find(p => p.id === productId);
            if (product && product.quantity > 1) {
                product.quantity -= 1;
            }
        },
        addToCart(productId) {
            alert(`Product ${productId} added to cart!`);
        },
    },
};
</script>