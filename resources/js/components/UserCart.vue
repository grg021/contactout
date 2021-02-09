<template>
  <div>
    <div class="max-w-xl mx-auto">
    <el-table
        :data="items"
        style="width: 100%">
      <el-table-column
          prop="name"
          label="Item">
      </el-table-column>
      <el-table-column
          prop="qty"
          label="Quantity"
          width="180">
        <template slot-scope="scope">
          {{ scope.row.qty }} x {{ scope.row.price_in_usd }}
        </template>
      </el-table-column>
      <el-table-column
          prop="amount"
          label="Amount"
          width="180">
      </el-table-column>
      <el-table-column
          fixed="right"
          label="Operations"
          width="120">
        <template slot-scope="scope">
          <el-button
              @click="removeItemFromCart(scope.row)"
              type="text">
            Remove
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    </div>
  <div class="text-center mt-4">
    <checkout v-on:checkout="clearCart" :total="total" :disabled="!items.length" />
  </div>
  </div>
</template>

<script>
import Product from "./Product";
import Checkout from "./Checkout";
import { removeItem } from "../api/cart"
export default {
  name: "UserCart",
  props: ['items', 'total'],
  components: {
    Product, Checkout
  },
  methods: {
    clearCart() {
      this.items = []
    },
    removeItemFromCart(item) {
      removeItem(item.id).then(res => {
        this.$message({
          message: 'Item removed from cart.',
          type: 'success'
        });

        const i = this.items.findIndex(_item => item.id == _item.id)
        if(i > -1) {
          this.items.splice(i, 1)
        }

      })
    }
  }
}
</script>

<style scoped>

</style>
