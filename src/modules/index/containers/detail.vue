<template lang="html">
  <div id="detail">
    <div class="content">
      <div class="top_box">
        <div class="logo_box" v-if="info.user">
          <img :src="info.user.imgUrl" alt="">
        </div>
        <div class="info_box">
          <div class="title" v-if="info.user">{{info.user.nickname}}</div>
          <div class="time">更新时间：{{info.updated_at}}</div>
        </div>
      </div>
      <div class="inner" v-if="info.user">{{info.user.content}}</div>
      <!-- <div v-html="info.content" class="content"></div>
      <div class="collection" @click="collect">{{info.collected?'已收藏':'收藏'}}</div>
      <div style="clear:both;"></div> -->
      <div class="label_inner" v-if="info.tag">
        <span class="bg_r" v-for="(val,key) in info.tag.split(',')" :key="key">{{val}}</span>
      </div>
      <div class="img_box" v-if="info.image && info.image.length">
        <div class="list" v-for="(item,index) in info.image" :key="index">
          <img class="img_n" :src="'/storage/'+item" alt="">
        </div>
        <div class="list"></div>
      </div>
    </div>
    <div class="editDetail_title">矫正历程</div>
    <div class="editDetail_list" v-for="(val,key) in info.detail" :key="key">
      <div class="title"><img src="../images/time.png" alt="">  <span>{{val.title}}</span></div>
      <ul>
        <li>
          <div class="content" v-html="val.content"></div>
          <div class="img_boxs">
            <div class="img_box_list" v-if='val.image.length == 1'>
              <img :src="'/storage/'+val.image[0]" alt="">
            </div>
            <div class="img_box_list_two" v-if='val.image.length == 2'>
              <div class="one"><img :src="'/storage/'+val.image[0]" alt=""></div>
              <div class="two"><img :src="'/storage/'+val.image[1]" alt=""></div>
            </div>
            <div class="img_box_list_three clearfix" v-if='val.image.length == 3'>
              <div class="one"><img :src="'/storage/'+val.image[0]" alt=""></div>
              <div class="img_box_list_three_right">
                <div class="two"><img :src="'/storage/'+val.image[1]" alt=""></div>
                <div class="three"><img :src="'/storage/'+val.image[2]" alt=""></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- <div class="load_more">加载更多</div> -->
    <div style="height:0.8rem;background:#fff;"></div>
    <div class="message_title" v-if='info'>
      <span>全部回复({{msg.length}})</span>
      <!-- <span class="good_box"><img src="../images/icon/good.png" alt=""> <span>{{msg.praiseNum}}</span></span> -->
    </div>
    <div class="message" v-if='info'>
      <ul v-if="msg">
        <li v-for="(item,index) in msg" :key="index">
          <div class="top_box clearfix">
            <div class="logo_box">
              <img :src="item.user.imgUrl" alt="">
            </div>
            <div class="info_box">
              <div class="title">{{item.user.nickname}}</div>
              <div class="time">{{item.id}}楼 {{item.created_at}}</div>
            </div>
            <div class="reply_box">
              <!-- <div class="reply_btn"><img src="../images/icon/goodD.png" alt=""> <span>1350</span>  </div> -->
            </div>
          </div>
          <div class="inner">{{item.content}}</div>
          <div class="reply_con" v-if="item.reply.length">
            <div v-for="(val,key) in item.reply" :key="key" @click="replyInfo($event)" :data-reUserId="val.reUserId" :data-reNickname="val.reNickname" :data-commentId="val.commentId" :data-userId="val.userId">
              <i class="c_0" :data-reUserId="val.reUserId" :data-reNickname="val.reNickname" :data-commentId="val.commentId" :data-userId="val.userId">{{val.nickname}}：</i>{{val.content}}
              <!-- <div class="look_to">查看全部评论 ></div> -->
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- <div style="height:1.24rem;"></div> -->
    <!-- <div class="reply_b">
      <div class="con">
        <div class="con_in"><input type="text" placeholder="说说你的看法..." name="" v-model="content"></div>
        <div class="" @click="pushSay">发表</div>
      </div>
    </div> -->
    <div style="height: 1.1rem;"></div>
    <div class="editDetail_footer_box">
      <div class="pinlun" @click="showPrompt()"><span>发表评论</span></div>
      <div class="start">
        <div class="num"  @click="collect">{{info.collected?'已收藏':'收藏'}}</div>
        <img src="../images/start.png" alt="">
      </div>
      <div class="good"  @click='praise'>
        <div class="num">{{info.praiseNum}}</div>
        <img src="../images/good_b.png" alt="">
      </div>
    </div>
    <loading v-if='!info'></loading>
  </div>
</template>

<script>
import "../css/detail.css";
import { mapGetters, mapActions, mapMutations } from 'vuex';
import loading from '../../../common/components/loading';
import { commentsList,addComments,collect,setPraise,addReply } from '../api/detail';
import toast from '../../../common/components/toast';
export default {
  components: {
    loading
  },
  data() {
    return {
      content:'',
      msg:"",
      isPraise: false
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
      clearList: 'Detail/clearList',
      setCollect: 'Detail/setCollect'
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
            this.getCommentsList();
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
          this.$data.content = '';
        }
      })
    },
    collect() {
      var parames = '';
      if(this.info.collected){
        parames = {
          id:this.$route.query.id,
          cancel:1
        }
      }else {
        parames = {
          id:this.$route.query.id
        }
      }
      collect(parames).then(res => {
        this.setCollect(this.info.collected)
      })
    },
    praise() {

    },
    showPrompt() {
      var that = this;
      this.dialog = this.$createDialog({
        type: 'prompt',
        title: '回复',
        prompt: {
          value: '',
          placeholder: '请输入'
        },
        onConfirm: (en, promptValue) => {
          if(!promptValue){
            toast('请输入内容',{delay:1500});
            return;
          }
          this.$data.content = promptValue;
          that.pushSay();
        }
      }).show();
      return;
    },
    replyInfo(event) {
      this.$createDialog({
        type: 'prompt',
        title: '回复',
        prompt: {
          value: '',
          placeholder: '请输入'
        },
        onConfirm: (en, promptValue) => {
          if(!promptValue){
            toast('请输入内容',{delay:1500});
            return;
          }

          addReply({
            userId: event.target.dataset.userid,
            commentId: event.target.dataset.commentid,
            reUserId: event.target.dataset.reuserid,
            reNickname: event.target.dataset.renickname,
            content: promptValue
          }).then(res => {
            if(res.status == 200 && res.data){
              if(res.data.status){
                this.getCommentsList();
              }else {
                toast(res.data.errMessage,{delay:1500});
              }
              this.$data.content = '';
            }
          })

        }
      }).show();
    }
  }
}
</script>
