<template>
  <div class="container">
    <h1>{{showTitle}}</h1>
  </div>
</template>

<script>
export default {
  computed: {
    showTitle() {
      return this.$store.getters.showmsg;
    }
  }
};
</script>
