<template>
  <div>
      <el-link v-if="disabled" href="/dashboard">View Products</el-link>
      <el-button type="warning" v-else @click="checkout()">Checkout and Pay {{ total }}</el-button>
  </div>

</template>

<script>
import { checkoutCart } from "../api/cart";

export default {
  name: "Checkout",
  props: ['disabled', 'total'],
  methods: {
    checkout() {
      checkoutCart().then(res => {
        this.$message({
          message: 'Item successfully checked out.',
          type: 'success'
        });
        this.$emit('checkout')
      }).catch(err => {
        this.$message({
          message: 'Something went wrong.',
          type: 'error'
        });
      })
    }
  }
}
</script>

<style scoped>

</style>
