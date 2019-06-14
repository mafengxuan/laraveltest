<template lang="html">
  <div id="messages">
    <ul>
      <li>
        <div class="top_box">
          <div class="logo_box">
            <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
          </div>
          <div class="info_box">
            <div class="title">劲小松33</div>
            <div class="time">2018年6月26日 09:00</div>
          </div>
          <div class="reply_box">
            <div class="reply_btn">回复</div>
          </div>
        </div>
        <div class="inner">10月有矫正牙齿的想法，与老公商量后决定实行！想彻底整顿一下自己的口腔问题想彻底整顿一下自己的口腔问题</div>
        <div class="reply_con">
          <span>我的介绍，牙齿不齐、龅牙，我的介绍，牙齿我的介绍不齐、龅牙我的介绍，牙齿不齐、龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的</span>
        </div>
      </li>
      <li>
        <div class="top_box">
          <div class="logo_box">
            <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
          </div>
          <div class="info_box">
            <div class="title">劲小松</div>
            <div class="time">2018年6月26日 09:00</div>
          </div>
          <div class="reply_box">
            <div class="reply_btn">回复</div>
          </div>
        </div>
        <div class="inner">10月有矫正牙齿的想法，与老公商量后决定实行！想彻底整顿一下自己的口腔问题想彻底整顿一下自己的口腔问题</div>
        <div class="reply_con">
          <span>我的介绍，牙齿不齐、龅牙，我的介绍，牙齿我的介绍不齐、龅牙我的介绍，牙齿不齐、龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的</span>
        </div>
      </li>
      <li>
        <div class="top_box">
          <div class="logo_box">
            <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
          </div>
          <div class="info_box">
            <div class="title">劲小松</div>
            <div class="time">2018年6月26日 09:00</div>
          </div>
          <div class="reply_box">
            <div class="reply_btn">回复</div>
          </div>
        </div>
        <div class="inner">10月有矫正牙齿的想法，与老公商量后决定实行！想彻底整顿一下自己的口腔问题想彻底整顿一下自己的口腔问题</div>
        <div class="reply_con">
          <span>我的介绍，牙齿不齐、龅牙，我的介绍，牙齿我的介绍不齐、龅牙我的介绍，牙齿不齐、龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的</span>
        </div>
      </li>
      <li>
        <div class="top_box">
          <div class="logo_box">
            <img src="http://lichenglong.pw/img/lcl.jpg" alt="">
          </div>
          <div class="info_box">
            <div class="title">劲小松</div>
            <div class="time">2018年6月26日 09:00</div>
          </div>
          <div class="reply_box">
            <div class="reply_btn">回复</div>
          </div>
        </div>
        <div class="inner">10月有矫正牙齿的想法，与老公商量后决定实行！想彻底整顿一下自己的口腔问题想彻底整顿一下自己的口腔问题</div>
        <div class="reply_con">
          <span>我的介绍，牙齿不齐、龅牙，我的介绍，牙齿我的介绍不齐、龅牙我的介绍，牙齿不齐、龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的龅牙我的介绍我的</span>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import '../css/messages.css'
import { getMsg } from '../api/messages';
import toast from '../../../common/components/toast';
export default {
  data() {
    return {

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
            
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    }
  }
}
</script>
