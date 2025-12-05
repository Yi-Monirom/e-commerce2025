<script>
import { useProductStore } from "@/Store/Products";
import { defineComponent } from "vue";

export default defineComponent({
  name: "GroupPage",

  computed: {
    // get group name from route
    groupName() {
      return this.$route.params.name;
    },

    // filter products dynamically
    filteredProducts() {
      const store = useProductStore();
      const groupName = route.params.name;

      const filteredProducts = computed(() =>
        store.getProductsByGroup(groupName)
      );
      if (!this.groupName || this.groupName.toLowerCase() === "all") {
        return store.products; // show all products if group=all
      }

      return store.products.filter(
        (p) => p.group.toLowerCase() === this.groupName.toLowerCase()
      );
    }
  }
});
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">
      {{ groupName }} Products
    </h1>

    <Products :products="filteredProducts" />
  </div>
</template>
