<template lang="html">
  <div id="detail">
    <div class="content">
      <div class="top_box">
        <div class="logo_box">
          <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
        </div>
        <div class="info_box">
          <div class="title">劲小松</div>
          <div class="time">更新时间：{{info.updated_at}}</div>
        </div>
      </div>
      <div v-html="info.content" class="content"></div>
    </div>
    <div style="height:0.8rem;background:#fff;"></div>
    <div class="message_title" v-if='info'>
      <span>全部回复(1007)</span>
      <span class="good_box"><img src="../images/icon/good.png" alt=""> <span>1350</span></span>
    </div>
    <div class="message" v-if='info'>
      <ul>
        <li>
          <div class="top_box clearfix">
            <div class="logo_box">
              <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
            </div>
            <div class="info_box">
              <div class="title">劲小松33</div>
              <div class="time">1楼 2018年6月26日 09:00</div>
            </div>
            <div class="reply_box">
              <div class="reply_btn"><img src="../images/icon/goodD.png" alt=""> <span>1350</span>  </div>
            </div>
          </div>
          <div class="inner">10月有矫正牙齿的想法，与老公商量后决定实行！想彻底整顿一下自己的口腔问题想彻底整顿一下自己的口腔问题</div>
          <div class="reply_con">
            <div>
              <i class="c_0">劲小松：</i>我的介绍，牙齿不齐、龅牙，我的介绍，牙齿我的介绍不齐、龅牙我的介绍，牙齿不齐、龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的
              <div class="look_to">查看全部评论 ></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div style="height:1.24rem;"></div>
    <div class="reply_b">
      <div class="con">
        <div>说说你的看法......</div>
        <div class="">发表</div>
      </div>
    </div>
    <loading v-if='!info'></loading>
  </div>
</template>

<script>
import "../css/detail.css";
import { mapGetters, mapActions, mapMutations } from 'vuex';
import loading from '../../../common/components/loading';
export default {
  components: {
    loading
  },
  data() {
    return {

    }
  },
  computed: {
    ...mapGetters({
      info:'Detail/info'
    })
  },
  created() {
    window.scrollTo(0,0);
    this.getDetailData();
  },
  methods: {
    ...mapActions({
      getDetail: 'Detail/getDetail'
    }),
    getDetailData() {
      this.getDetail(this.$route.query.id);
    }
  }
}
</script>
