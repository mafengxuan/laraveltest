<template>
  <div class="dashboard-container">
    <div style="margin-bottom: 15px;">Your name：{{ name }} </div>
    <div style="margin-bottom: 15px;">Your roles：<span v-for="role in roles" key="123">{{ [role] }}</span> </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import { Message } from 'element-ui'

export default {
  name: 'Dashboard',
  components: {

  },
  data() {
    return {

    }
  },
  computed: {

  },
  created() {

  },
  methods: {

  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.dashboard {
  &-container {
    margin: 30px;
  }
  &-text {
    font-size: 30px;
    line-height: 46px;
  }
}
</style>
