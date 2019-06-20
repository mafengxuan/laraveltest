<template lang="html">
  <div id="app">
    <!-- HeaderComponent -->
    <HeaderComponent :showBack='isFooter'></HeaderComponent>
    <router-view></router-view>
    <FooterComponent :show='isFooter' :name="footerName"></FooterComponent>
  </div>
</template>

<script>
import '../../../common/css/base.css';
import '../css/app.css';
import '../css/cube.css';
import flexible from '../../../common/utils/flexible';
import HeaderComponent from '../components/header/header.vue';
import FooterComponent from '../components/footer/footer.vue';
export default {
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      isFooter: true,
      footerName:'/'
    }
  },
  created() {
    flexible(750,750);
  },
  methods: {
    isShowFooter(data) {
      if(/\/Detail|\/add|\/BagRuler/.test(data)){
        this.$data.isFooter = false;
      }else {
        this.$data.isFooter = true;
      }
    }
  },
  watch: {
    $route (to, from){
      this.isShowFooter(to.path)
      this.$data.footerName = to.path;
    }
  }
}
</script>
