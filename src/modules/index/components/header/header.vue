<template lang="html">
  <div id="header">
    <div class="header">
      <div class="back" v-if="!showBack" @click="back">
        <img src="../../images/icon/back.png" alt="">
      </div>
      <div class="title">矫正日记</div>
    </div>
    <div style="width: 100%;height: 0.88rem;"></div>
  </div>
</template>

<script>
import './header.css';
export default {
  name: 'HeaderComponent',
  props: {
    showBack: {
      type: Boolean
    }
  },
  methods: {
    back() {
      this.$router.go(-1);
    }
  }
}
</script>
