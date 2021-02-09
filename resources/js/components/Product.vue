<template>
  <div class="p-6">
    <el-card>
      <div slot="header" class="clearfix">{{ item.name}}</div>
      <div class="text-grey-darker text-justify flex flex-col">
        <p class="font-bold text-sm uppercase mb-2 text-blue-darker">Item description:<p>
        <span class="text-grey-darker">
          {{ item.description }}
        </span>
        <div class="mt-4">
          <span class="uppercase bg-green font-bold p-2 text-xs shadow rounded">{{ item.price_in_usd }}</span>
          <span class="uppercase bg-yellow-dark text-grey-darkest font-bold p-2 text-xs shadow rounded">stock: {{ item.stock }}</span>
        </div>
      </div>
      <div class="mt-4">
        <add-to-cart :product="item" :disabled="!item.stock"></add-to-cart>
      </div>
    </el-card>
  </div>
</template>

<script>
import AddToCart from "./AddToCart";
export default {
  name: "product",
  props: ['item'],
  components: {
    AddToCart,
  }
}
</script>

<style scoped>

</style>
