<template>
  <el-button type="success" :disabled="disabled" @click="addToCart()">Add to Cart</el-button>
</template>

<script>

import { addToCart } from "../api/cart";

export default {
  name: "AddToCart",
  props: ['product', 'disabled'],
  methods: {
    addToCart() {
      addToCart(this.product).then(res => {
        this.$message({
          message: 'Item added to cart.',
          type: 'success'
        });
      }).catch(err => {
        this.$message({
          message: err.response.data.message,
          type: 'error'
        });
      })
    }
  }
}
</script>

<style scoped>

</style>
