<!-- <template lang="html"> -->
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
import { checkLogin } from '../api/app'
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
    checkLogin().then(res => {
      if(res.status == 200 && res.data){
        if(res.data.status){

        }else {
          location.href = '/api/wechat?returnUrl='+ encodeURIComponent(window.location.href);
        }
      }
    })
  },
  methods: {
    isShowFooter(data) {
      if(/\/Detail|\/add|\/BagRuler|\/NewAdd|\/editDetail/.test(data)){
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
