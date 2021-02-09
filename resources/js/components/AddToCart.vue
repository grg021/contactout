<template>
  <button @click="addToCart()">Add to Cart</button>
</template>

<script>

import { addToCart } from "../api/cart";

export default {
  name: "AddToCart",
  props: ['product'],
  methods: {
    addToCart() {
      addToCart(this.product).then(res => {
        console.log(res);
      })
    }
  }
}
</script>

<style scoped>

</style>
