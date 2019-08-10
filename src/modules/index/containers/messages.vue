<template lang="html">
  <div id="messages">
    <ul v-if="messages">
      <li v-for="(item,index) in messages" :key="index">
        <router-link :to="'/Detail?id='">
          <div class="top_box">
            <div class="logo_box">
              <img :src="item.imgUrl" alt="">
            </div>
            <div class="info_box">
              <div class="title">{{item.nickname}}</div>
              <div class="time">{{item.created_at.date}}</div>
            </div>
            <div class="reply_box">
              <div class="reply_btn" @click="showPrompt($event)" :data-reId="item.reId" :data-commentId="item.commentId" :data-reUserId="item.userId" :data-reNickname="item.nickname">回复</div>
            </div>
          </div>
          <div class="inner">{{item.content}}</div>
          <div class="reply_con" v-if="item.reContent">
            <!-- <span v-for="(val,i) in item.reply"><i class="c_0" style="color:#07bed1;">{{val.nickname}}：</i>{{val.content}}</span> -->
            <span><i class="c_0" style="color:#07bed1;">{{item.reNickname}}：</i>{{item.reContent}}</span>
          </div>
        </router-link>
      </li>
    </ul>
    <loading v-if="!messages"></loading>
  </div>
</template>

<script>
import '../css/messages.css'
import { getMsg,addReply } from '../api/messages';
import toast from '../../../common/components/toast';
import loading from '../../../common/components/loading';
export default {
  components: {
    loading
  },
  data() {
    return {
      messages:''
    }
  },
  created() {
    window.scrollTo(0,0);
    this.getMessages();
  },
  methods: {
    getMessages() {
      getMsg().then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.messages = res.data.result;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    showPrompt(e) {
      if ( e && e.preventDefault ) {
              //阻止默认浏览器动作(W3C)
              e.preventDefault();
      }else{
          //IE中阻止函数器默认动作的方式
          window.event.returnValue = false;
          return false;
      }
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
          console.log(123)
          addReply({
            content: promptValue,
            reId: e.target.dataset.reid,
            commentId:e.target.dataset.commentid,
            reUserId:e.target.dataset.reuserid,
            reNickname:e.target.dataset.renickname,
          }).then(res => {
            if(res.status == 200 && res.data){
              if(res.data.status){
                toast(res.data.result,{delay:1500});
                this.getMessages();
              }else {
                toast(res.data.errMessage,{delay:1500});
              }
            }
          })
        }
      }).show();
      return;
    }
  }
}
</script>
