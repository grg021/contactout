<template>
  <div>
    <div v-for="item in items" :key="item.id">
      <div>{{ item.name }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "product"
}
</script>

<style scoped>

</style>
