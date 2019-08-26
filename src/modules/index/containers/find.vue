<template lang="html">
  <div id="find">
    <div class="banner_box">
      <swiper :options="swiperOption" ref="mySwiper">
        <swiper-slide attr-show="1" ref='slide' v-for="(val,key) in slideShow" :key="key">
          <a :href="val.url"><img class="normal" :src="'/storage/'+val.image" alt=""/></a>
        </swiper-slide>
        <!-- Optional controls -->
        <div class="swiper-pagination"  slot="pagination"></div>
      </swiper>
    </div>
    <div class="nav">
      <ul class="inner">
        <li v-for="(val,key) in slideIcon" :key="key">
          <a :href="val.url">
            <div class="img_box"><img :src="'/storage/'+val.image" alt=""></div>
            <div class="name">{{val.title}}</div>
          </a>
        </li>
        <!-- <li>
          <div class="img_box"><img src="../images/icon/find_01.png" alt=""></div>
          <div class="name">正畸医生</div>
        </li>
        <li>
          <div class="img_box"><img src="../images/icon/find_02.png" alt=""></div>
          <div class="name">9.9元洁牙</div>
        </li>
        <li>
          <div class="img_box"><img src="../images/icon/find_03.png" alt=""></div>
          <div class="name">口腔商城</div>
        </li>
        <li>
          <div class="img_box"><img src="../images/icon/find_04.png" alt=""></div>
          <div class="name">预约挂号</div>
        </li> -->
      </ul>
    </div>
    <div class="list_box">
      <ul>
        <li class="clearfix" v-for="(val,key) in slideArticle" :key="key">
          <a :href="val.url">
            <div class="l_f">
              <p>{{val.title}}</p>
            </div>
            <div class="l_r">
              <img :src="'/storage/'+val.image" alt="">
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import '../css/swpier.css';
import "../css/find.css";
import { getBanner } from '../api/find';
import toast from '../../../common/components/toast';
import { wxshareTo } from '../../../common/utils/wxshare';
import logo from '../images/logo.PNG';
export default {
  data() {
    const that = this;
    return {
      swiperOption: {
        pagination: {
          el: '.swiper-pagination'
        },
        loop : false,
        //滑动之后回调函数
        updateOnImagesReady: true,
        on: {
          slideChangeTransitionEnd: function(){
            that.$data.slideIndex = this.realIndex + 1;
          }
        }
      },
      slideShow:'',
      slideIcon:'',
      slideArticle:''
    }
  },
  created() {
    window.scrollTo(0,0);
    this.getBannerData();
    this.wxShareFun();
  },
  methods: {
    getBannerData() {
      getBanner({type:1}).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.slideShow = res.data.result.slideShow;
            this.$data.slideIcon = res.data.result.slideIcon;
            this.$data.slideArticle = res.data.result.slideArticle;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    //微信分享
    wxShareFun() {
      var share_data  = {
        title:"我的牙齿矫正日记",
        desc:"牙齿矫正的小伙伴们都在这分享自己的矫正日记",
        imgUrl: logo,
        link: window.location.href
      };
      wxshareTo(share_data,function(){

      });
    }
  }
}
</script>
