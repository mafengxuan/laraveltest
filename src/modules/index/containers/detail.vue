<template lang="html">
  <div id="detail">
    <div class="content">
      <div class="top_box">
        <div class="logo_box" v-if="info.user">
          <img :src="info.user.imgUrl" alt="">
        </div>
        <div class="info_box">
          <div class="title" v-if="info.user">{{info.user.nickName}}</div>
          <div class="time">更新时间：{{info.updated_at}}</div>
        </div>
      </div>
      <div v-html="info.content" class="content"></div>
      <div class="collection">已收藏</div>
      <div style="clear:both;"></div>
    </div>
    <div style="height:0.8rem;background:#fff;"></div>
    <div class="message_title" v-if='info'>
      <span>全部回复({{msg.length}})</span>
      <span class="good_box"><img src="../images/icon/good.png" alt=""> <span>{{msg.praiseNum}}</span></span>
    </div>
    <div class="message" v-if='info'>
      <ul v-if="msg">
        <li v-for="(item,index) in msg" :key="index">
          <div class="top_box clearfix">
            <div class="logo_box">
              <img :src="item.user.imgUrl" alt="">
            </div>
            <div class="info_box">
              <div class="title">{{item.user.nickName}}</div>
              <div class="time">{{item.id}}楼 {{item.created_at}}</div>
            </div>
            <div class="reply_box">
              <div class="reply_btn"><img src="../images/icon/goodD.png" alt=""> <span>1350</span>  </div>
            </div>
          </div>
          <div class="inner">{{item.content}}</div>
          <div class="reply_con">
            <div v-for="(val,key) in item.reply" :key="key">
              <i class="c_0">{val.{nickname}}：</i>{{val.content}}
              <!-- <div class="look_to">查看全部评论 ></div> -->
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div style="height:1.24rem;"></div>
    <div class="reply_b">
      <div class="con">
        <div class="con_in"><input type="text" placeholder="说说你的看法..." name="" v-model="content"></div>
        <div class="" @click="pushSay">发表</div>
      </div>
    </div>
    <loading v-if='!info'></loading>
  </div>
</template>

<script>
import "../css/detail.css";
import { mapGetters, mapActions, mapMutations } from 'vuex';
import loading from '../../../common/components/loading';
import { commentsList,addComments } from '../api/detail';
import toast from '../../../common/components/toast';
export default {
  components: {
    loading
  },
  data() {
    return {
      content:'',
      msg:""
    }
  },
  computed: {
    ...mapGetters({
      info:'Detail/info'
    })
  },
  created() {
    window.scrollTo(0,0);
    this.clearList();
    this.getDetailData();
    this.getCommentsList();
  },
  methods: {
    ...mapActions({
      getDetail: 'Detail/getDetail'
    }),
    ...mapMutations({
      clearList: 'Detail/clearList'
    }),
    getDetailData() {
      this.getDetail(this.$route.query.id).then(res => {
        if(this.$route.query.b){
          // document.getElementsByTagName('img').onload=function(){
          //   // 加载完成
          //   window.scrollTo(0, document.documentElement.clientHeight);
          // };

          var img = [],
          flag = 0;
          var imgTotal = document.getElementsByTagName('img');
          for(var i = 0 ; i < imgTotal.length ; i++){
            img[i] = new Image();
            img[i].src = imgTotal[i].src;
            img[i].onload = function(){
               //第i张图片加载完成
               flag++
               if( flag == imgTotal.length ){
                  //全部加载完成
                  window.scrollTo(0, document.body.scrollHeight);
               }
            }
          }
        }
      });
    },
    getCommentsList() {
      commentsList({
        id: this.$route.query.id
      }).then(res => {
        console.log(res);
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.msg = res.data.result;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    pushSay() {
      addComments({
        articleId: this.$route.query.id,
        content: this.$data.content
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            toast(res.data.result,{delay:1500});
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    }
  }
}
</script>
