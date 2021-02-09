<template>
  <div>
    <h1>Home Count - {{ count }}</h1>
    <button @click="count++">Increment Count</button>
  </div>
</template>

<script>
export default {
  name: "Home",
  methods: {

  },
  computed: {
    count: {
      get () {
        return this.$store.getters.count
      },
      set (value) {
        this.$store.commit('increment')
      }
    }
  }
}
</script>

<style scoped>

</style>
