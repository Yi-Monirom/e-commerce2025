<template id="menu-item-template">
  <div>
      <router-link
      :href="href" 
      :class="[
        'flex items-center space-x-2  transition',
        isActive ? 'text-green-600 border-b-2 border-green-600' : 'hover:text-green-600',
        isButton ? 'bg-[#3BB77E] text-white rounded' : '',
        hasPadding ? 'px-4 py-3':'',
        className,
        custClass
      ]"
    >
      <span v-if="$slots.icon" class="text-lg text-green-600">
        <slot name="icon"></slot>
      </span>
      <span class=" font-medium ">
        <slot></slot>
      </span>
    </router-link>
  </div>
  
  
</template>

<script>
export default {
    name: "MenuItem",
  props: {
    href: {
      type: String,
      required: true,
      
    },
    isActive: {
      type: Boolean,
      default: false
    },
    isButton: {
      type: Boolean,
      default: false
    },
    className: {
      type: String,
      default: ''
    },
    hasPadding: {
      type: Boolean,
      default: true
    }
  },
  data() {
    return {};
  }

}
</script>