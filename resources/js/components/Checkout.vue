<template>
  <button @click="checkout()">Checkout</button>
</template>

<script>
import { checkoutCart } from "../api/cart";

export default {
  name: "Checkout",
  methods: {
    checkout() {
      checkoutCart().then(res => {
        console.log(res);
      })
    }
  }
}
</script>

<style scoped>

</style>
