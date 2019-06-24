<template lang="html">
  <div id="messages">
    <ul v-if="messages">
      <li v-for="(item,index) in messages" :key="index">
        <router-link :to="'/Detail?id='+item.id">
          <div class="top_box">
            <div class="logo_box">
              <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
            </div>
            <div class="info_box">
              <div class="title">劲小松33</div>
              <div class="time">2018年6月26日 09:00</div>
            </div>
            <div class="reply_box">
              <div class="reply_btn" @click="showPrompt($event)">回复</div>
            </div>
          </div>
          <div class="inner">{{item.content}}</div>
          <div class="reply_con" v-if="item.reply.length">
            <span v-for="(val,i) in item.reply"><i class="c_0" style="color:#07bed1;">{{val.nickname}}：</i>{{val.content}}</span>
          </div>
        </router-link>
      </li>
    </ul>
    <loading v-if="!messages"></loading>
  </div>
</template>

<script>
import '../css/messages.css'
import { getMsg } from '../api/messages';
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
        onConfirm: (e, promptValue) => {
          this.$createToast({
            type: 'warn',
            time: 1000,
            txt: `Prompt value: ${promptValue || ''}`
          }).show()
        }
      }).show();
      return;
    }
  }
}
</script>
