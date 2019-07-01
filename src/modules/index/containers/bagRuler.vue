<template lang="html">
  <div class="redRuler">
    <div class="ruler-top clearfix">
      <div class="ruler_left">活动规则</div>
      <div class="ruler_btn" @click="myRedBag">我的红包</div>
    </div>
    <div v-html='content' class="ruler_content"></div>
    <div class="my_bag" v-if="ruler">
      <div class="my_bag_box">
        <div class="my_bag_title">我的红包 <i class="cubeic-close" @click="myRedBagClose"></i>  </div>
        <div class="my_bag_content">
          <ul>
            <li class="clearfix" v-for="(item,index) in rulerList" :key="index">
              <div class="time">{{item.created_at.split(' ')[0]}}</div>
              <div class="date">矫正日记</div>
              <div class="money">{{item.price}}元</div>
              <div class="btn" v-if="!item.status" :data-id="item.id" :data-articleId="item.articleId" :data-userId="item.userId" :data-price="item.price" @click="getPrice($event)">点击领取</div>
              <div class="" v-else style="flex: 3;text-align: center;opacity: 0.4;">已领取</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <loading v-if='loadings'></loading>
  </div>
</template>

<script>
import loading from '../../../common/components/loading';
import toast from '../../../common/components/toast';
import { getRuler,getRulerList,receiveMoney } from '../api/redbag';
import "../css/redbag.css";
export default {
  components: {
    loading
  },
  data() {
    return {
      content:"",
      rulerList:'',
      ruler: false,
      loadings: false
    }
  },
  methods: {
    myRedBag() {
      this.$data.loadings = true;
      getRulerList().then(res => {
        this.$data.loadings = false;
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.ruler = true;
            this.$data.rulerList = res.data.result;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    myRedBagClose() {
      this.$data.ruler = false;
    },
    getPrice(e) {
      console.log(e.target.dataset);
      receiveMoney({
        id: e.target.dataset.id,
        userId: e.target.dataset.userid,
        price: e.target.dataset.price,
        articleId: e.target.dataset.articleid
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            toast(res.data.result,{delay:1500});
            this.$data.ruler = false;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    }
  },
  created() {
    getRuler().then(res => {
      if(res.status == 200 && res.data){
        if(res.data.status){
          this.$data.content = res.data.result.content;
        }else {
          toast(res.data.errMessage,{delay:1500});
        }
      }
    })
  }
}
</script>

<style lang="css" scoped>
  .redRuler {
    background: #fff;
    padding: 0.2rem;
    font-size: 0.3rem;
    line-height: 0.44rem;
  }
  .redRuler .ruler-top {
    width: 100%;
    margin-bottom: 0.36rem;
    margin-top: 0.3rem;
  }
  .redRuler .ruler-top .ruler_left {
    float: left;
    font-size: 0.32rem;
    padding-left: 0.1rem;
    color: #000;
    border-left: 0.08rem solid #07bed1;
  }
  .redRuler .ruler-top .ruler_btn {
    float: right;
    width: 1.15rem;
    height: 0.36rem;
    line-height: 0.36rem;
    font-size: 0.24rem;
    color: #ff0000;
    text-align: center;
    border: 1px solid #ff0000;
    border-radius: 0.08rem;
  }
  .ruler_content {
    padding: 0 0.2rem;
  }
  .ruler_content p {
    margin-bottom: 0.2rem;
    text-indent: 2em;
  }
</style>
