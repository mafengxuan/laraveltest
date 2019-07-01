<template lang="html">
  <div id="personal">
    <div class="banner">
      <div class="inner">
        <div class="top_box">
          <div class="logo_box">
            <img :src="info.imgUrl" alt="">
          </div>
          <div class="info_box">
            <div class="title">{{info.nickname}}</div>
            <div class="time">更新时间：{{info.updated_at}}</div>
          </div>
        </div>
        <div class="bottom_box">
          <ul v-if="info">
            <li>
              <div v-if="!info.article" @click="checkStoreTo('push')">
                <div class="">发布</div>
                <div class="">日记</div>
              </div>
              <div v-else @click="checkStoreTo">
                <div class="">我的</div>
                <div class="">日记</div>
              </div>
            </li>
            <li>
              <div class="">{{info.article && info.article.forwardNum ? info.article.forwardNum:'0'}}</div>
              <div class="">转发</div>
            </li>
            <li>
              <div class="">{{info.article && info.article.commentsNum ? info.article.commentsNum: '0'}}</div>
              <div class="">评论</div>
            </li>
            <li>
              <div class="">{{info.article && info.article.praiseNum ? info.article.praiseNum:'0'}}</div>
              <div class="">获赞</div>
            </li>
            <li>
              <router-link to="/?type=collect">
                <div class="">收藏</div>
                <div class="">日记</div>
              </router-link>
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
            <div class="con">
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
              <!-- <cube-select
                v-model="tooth_question"
                :options="tagsArr[4]"
                @change="save">
              </cube-select> -->
              <div @click="showPopup('myPopup')">
                {{tooth_question?tooth_question:'请选择'}}
              </div>
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

    <cube-popup type="my-popup" ref="myPopup">
      <div class="cube-dialog-main">
          <!-- <span class="cube-dialog-close">
            <i class="cubeic-close"></i>
          </span> -->
          <div class="cube-dialog-prompt">
            <h2 class="cube-dialog-title"><p class="cube-dialog-title-def">请选择牙齿问题</p></h2>
            <div class="cube-dialog-content">
              <cube-checker
                v-if="tagsArr[4]"
                v-model="tooth_questionList"
                :options="tagsArr[4]" />
            </div>
            <div class="cube-dialog-btns border-right-1px">
              <a href="javascript:;" class="cube-dialog-btn border-top-1px" @click="hidePopup('myPopup')">取消</a>
              <a href="javascript:;" class="cube-dialog-btn border-top-1px cube-dialog-btn_highlight" @click="save">确定</a>
            </div>
          </div>
      </div>
    </cube-popup>

    <div class="protocol_box" v-if="protocol">
      <div class="content">
        <div class="title">劲松口腔矫正日记协议</div>
        <div class="inner">知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙…其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙…其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛...</div>
        <div class="btn" @click="sureCheckStoreTo">确定 {{time}}S</div>
      </div>
    </div>

    <!-- <div class="save" @click="save">保存</div> -->
    <loading v-if='!info && !tags'></loading>
  </div>
</template>

<script>
import "../css/personal.css";
import loading from '../../../common/components/loading';
import { mapGetters, mapActions, mapMutations } from 'vuex';
import { updateUserInfo,showTags,checkStore } from '../api/personal';
import toast from '../../../common/components/toast';

export default {
  components: {
    loading
  },
  data() {
    return {
      sex:'',
      age:'',
      correct_time:'',
      tooth_socket:'',
      tooth_question:'',
      content:'',
      tags:'',
      tagsArr:"",
      tooth_questionList:[],
      protocol: false,
      time:5,
      t:''
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
      this.$data.tooth_question = this.info.tooth_question;
      this.$data.content = this.info.content;
    },
    initTags(result) {
      var tags = {};
      for(var i=0;i<result.length;i++){
        var data = [];
        for(var j=0;j<result[i].data.length;j++){
          if(result[i].key == "tooth_question"){
            var ques = {
              text: result[i].data[j].value,
              value: result[i].data[j].value
            }
            data.push(ques);
          }else {
            data.push(result[i].data[j].value);
          }
        }
        tags[i] = data;
      }
      this.$data.tagsArr = tags;
    },
    save() {
      this.$data.tooth_question = this.$data.tooth_questionList.join(',');
      updateUserInfo({
        sex:this.$data.sex,
        age:this.$data.age,
        correct_time:this.$data.correct_time,
        tooth_socket:this.$data.tooth_socket,
        tooth_question:this.$data.tooth_question,
        content: this.$data.content
      }).then(res => {
        this.$refs['myPopup'].hide();
        if(res.status == 200 && res.data){
          if(res.data.status){
            toast(res.data.result,{delay:1500});
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    showPopup(refId) {
      const component = this.$refs[refId]
      component.show();
    },
    hidePopup(refId) {
      const component = this.$refs[refId]
      component.hide();
    },
    checkStoreTo(type) {
      checkStore().then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            if(type == 'push'){
              this.$data.protocol = true;
              this.timer();
              return;
            }
            this.$router.push('/add');
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    timer(){
      var that = this;
      this.$data.t = setInterval(function(){
        if(that.$data.time <= 0) {
          clearInterval(that.$data.t);
          return;
        }
        that.$data.time--;
      },1000)
    },
    sureCheckStoreTo() {
      clearInterval(this.$data.t);
      this.checkStoreTo();
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
