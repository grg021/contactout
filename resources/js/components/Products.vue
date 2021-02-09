<template>
  <div class="grid grid-cols-3 grid-flow-row gap-4">
    <div v-for="item in items" :key="item.id">
      <product :item="item" />
    </div>
  </div>
</template>

<script>
import Product from "./Product"
export default {
  name: "Products",
  props: ['items'],
  components: {
    Product
  },
}
</script>

<style scoped>

</style>
