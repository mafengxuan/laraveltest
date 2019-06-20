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
              <router-link to="/add" v-if="!Object.keys(info.article).length">
                <div class="">发布</div>
                <div class="">日记</div>
              </router-link>
              <router-link to="/add" v-else>
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
      <ul v-if="tags">
        <li class="clearfix">
          <div class="f_left">{{tags[0].label}}</div>
          <div class="f_right">
            <div class="con">
              <!-- <select  v-model="sex" style="border:0;outline: none;background:#fff;text-align:right;">
                <option v-for="(val,key) in tags[0].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>
              </select> -->
              <cube-select
                v-model="sex"
                :options="tagsArr[0]"
                @change="save">
              </cube-select>
            </div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">{{tags[1].label}}</div>
          <div class="f_right">
            <div class="con" @click="selectData">
              <!-- <select  v-model="age" style="border:0;outline: none;background:#fff;text-align:right;">
                <option v-for="(val,key) in tags[1].data" :key="key" :data-val="val.value" style="color:#666;margin: 0px" >{{val.value}}</option>
              </select> -->
              <cube-select
                v-model="age"
                :options="tagsArr[1]"
                @change="save">
              </cube-select>
            </div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">{{tags[2].label}}</div>
          <div class="f_right">
            <div class="con">
              <!-- <select  v-model="correct_time" style="border:0;outline: none;background:#fff;text-align:right;">
                <option v-for="(val,key) in tags[2].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>
              </select> -->
              <cube-select
                v-model="correct_time"
                :options="tagsArr[2]"
                @change="save">
              </cube-select>
            </div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">{{tags[3].label}}</div>
          <div class="f_right">
            <div class="con">
              <!-- <select  v-model="tooth_socket" style="border:0;outline: none;background:#fff;text-align:right;">
                <option v-for="(val,key) in tags[3].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>
              </select> -->
              <cube-select
                v-model="tooth_socket"
                :options="tagsArr[3]"
                @change="save">
              </cube-select>
            </div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">{{tags[4].label}}</div>
          <div class="f_right">
            <div class="con">
              <!-- <select  v-model="tooth_question" style="border:0;outline: none;background:#fff;text-align:right;">
                <option v-for="(val,key) in tags[4].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>
              </select> -->
              <cube-select
                v-model="tooth_question"
                :options="tagsArr[4]"
                @change="save">
              </cube-select>
            </div>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
        <li class="clearfix">
          <div class="f_left">日记简介</div>
          <div class="f_right">
            <textarea name="date" v-model="content" placeholder="16~48个字内" @blur="save"></textarea>
            <img src="../images/icon/right.png" alt="">
          </div>
        </li>
      </ul>
    </div>
    <!-- <div class="save" @click="save">保存</div> -->
    <loading v-if='!info && !tags'></loading>
  </div>
</template>

<script>
import "../css/personal.css";
import loading from '../../../common/components/loading';
import { mapGetters, mapActions, mapMutations } from 'vuex';
import { updateUserInfo,showTags } from '../api/personal';
import toast from '../../../common/components/toast';

export default {
  components: {
    loading
  },
  data() {
    return {
      options: [2013, 2014, 2015, 2016, 2017, 2018],
      value: 2016,
      sex:'',
      age:'',
      correct_time:'',
      tooth_socket:'',
      tooth_question:'',
      content:'',
      tags:'',
      tagsArr:""
    }
  },
  computed: {
    ...mapGetters({
      info:'Personal/userInfo'
    })
  },
  methods: {
    ...mapActions({
      showTags: 'Home/showTags'
    }),
    ...mapActions({
      userInfo: 'Personal/userInfo',
    }),
    initData() {
      this.$data.sex = this.info.sex;
      this.$data.age = this.info.age;
      this.$data.correct_time = this.info.correct_time;
      this.$data.tooth_socket = this.info.tooth_socket;
      this.$data.tooth_socket = this.info.tooth_socket;
      this.$data.content = this.info.content;
    },
    initTags(result) {
      console.log(result);
      var tags = {};
      for(var i=0;i<result.length;i++){
        var data = [];
        for(var j=0;j<result[i].data.length;j++){
          data.push(result[i].data[j].value);
        }
        tags[i] = data;
      }
      this.$data.tagsArr = tags;
    },
    save() {
      updateUserInfo({
        sex:this.$data.sex,
        age:this.$data.age,
        correct_time:this.$data.correct_time,
        tooth_socket:this.$data.tooth_socket,
        tooth_question:this.$data.tooth_question,
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
    },
    selectData(e) {
      // document.getElementsByTagName('select')[1].click()
    }
  },
  created() {
    window.scrollTo(0,0);
    this.userInfo().then(res => {
      this.initData();
    });
    showTags().then(res => {
      if(res.status == 200 && res.data){
        if(res.data.status){
          this.initTags(res.data.result);
          this.$data.tags = res.data.result;
        }else {
          toast(res.data.errMessage,{delay:1500});
        }
      }
    })
  }
}
</script>
<style>
  .cube-select {
    border:0;
    padding: 0;
  }
  .cube-select:after {
    border: 0;
  }
  .cube-select .cube-select-icon {
    display: none;
  }
  .cube-picker-confirm {
    color: #07bed1;
  }
</style>
