<template lang="html">
  <div id="personal">
    <div class="banner">
      <div class="inner">
        <div class="top_box">
          <div class="logo_box">
            <img :src="info.imgUrl" alt="">
          </div>
          <div class="info_box">
            <div class="title">{{info.nickName}}</div>
            <div class="time">更新时间：{{info.updated_at}}</div>
          </div>
        </div>
        <div class="bottom_box">
          <ul v-if="info">
            <li>
              <router-link to="/add" v-if="info.article">
                <div class="">发布</div>
                <div class="">日记</div>
              </router-link>
              <router-link to="/add" v-if="info && !info.article">
                <div class="">我的</div>
                <div class="">日记</div>
              </router-link>
            </li>
            <li>
              <div class="">{{info.article.forwardNum}}</div>
              <div class="">转发</div>
            </li>
            <li>
              <div class="">{{info.article.commentsNum}}</div>
              <div class="">评论</div>
            </li>
            <li>
              <div class="">{{info.article.praiseNum}}</div>
              <div class="">获赞</div>
            </li>
            <li>
              <div class="">收藏</div>
              <div class="">日记</div>
            </li>
          </ul>
        </div>
      </div>
      <img src="../images/personal/me.png" alt="">
    </div>
    <div class="personal_info">
      <ul>
        <li class="clearfix">
          <div class="f_left">性别</div>
          <div class="f_right">
            <!-- <span v-if="info.sex == 1">男</span>
            <span v-else>女</span> -->
            <div class="con">
              <select  v-model="sex" style="border:0;outline: none;width:100%;background:#fff;text-align:right;" dir="rtl">
                <option style="color:#666;margin: 0px" >男</option>
                <option style="color:#666;margin: 0px" >女</option>
              </select>
            </div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">年龄</div>
          <div class="f_right">
            <div class="con">{{info.age}}岁</div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">矫正时间</div>
          <div class="f_right">
            <div class="con">矫正完毕</div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">牙套类型</div>
          <div class="f_right">
            <div class="con">隐适美</div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">牙齿问题</div>
          <div class="f_right">
            <div class="con">{{info.tooth_question}}</div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">日记简介</div>
          <div class="f_right">
            <textarea name="date" placeholder="16~48个字内"></textarea>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
      </ul>
    </div>
    <loading v-if='!info'></loading>
  </div>
</template>

<script>
import "../css/personal.css";
import loading from '../../../common/components/loading';
import { mapGetters, mapActions, mapMutations } from 'vuex';
import { updateUserInfo } from '../api/personal';

export default {
  components: {
    loading
  },
  data() {
    return {
      sex:'',
      age:'',
      correcTime:'',
      tooth_socker:'',
      tooth_question:''
    }
  },
  computed: {
    ...mapGetters({
      tags:'Home/tags',
      info:'Personal/userInfo'
    })
  },
  methods: {
    ...mapActions({
      userInfo: 'Personal/userInfo',
    })
  },
  created() {
    window.scrollTo(0,0);
    this.userInfo();
  }
}
</script>
