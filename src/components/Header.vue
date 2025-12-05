<template>
  <div class="w-full py-4 flex items-center justify-between bg-white shadow">
    <h2 class="text-xl font-semibold">{{ title }}</h2>

    <nav>
      <ul class="flex items-center gap-6 text-gray-600 font-medium">
        <li v-for="g in groups" 
            :key="g"
            class="cursor-pointer hover:text-green-600"
            @click="openGroup(g)">
          {{ g }}
        </li>
      </ul>
    </nav>
  </div>
</template>
<script>
import { useRouter } from "vue-router";
import { useProductStore } from "@/Store/Products";
export default {
  props: {
    groups: Array,

    title: {
      type: String,
      default: "Featured Categories"
    }
  },

  setup(props) {
    const router = useRouter();
    const store = useProductStore(); 

    const openGroup = (group) => {
      router.push(`/group/${group}`);
    };

    return { groups: store.groups,openGroup };
  }
}
</script>