<template lang="html">
  <div id="index">
    <!-- 标签 -->
    <div class="label_box">
      <div class="inner clearfix">
        <ul class="tab_box clearfix">
          <li @click="listTypeChange('new')" :class="listType=='new'?'active':''">最新 <span></span> <i></i> </li>
          <li @click="listTypeChange('hot')" :class="listType=='hot'?'active':''">最热 <span></span> <i></i></li>
          <li @click="listTypeChange('quality')" :class="listType=='quality'?'active':''">精选 <span></span> <i></i></li>
          <li @click="listTypeChange('collect')" :class="listType=='collect'?'active':''">收藏 <i></i></li>
        </ul>
        <div class="label_btn" @click="layerShow">标签</div>
      </div>
    </div>
    <!-- 列表 -->
    <div class="list_box">
      <ul>
        <li v-for="(item,index) in list" :key="index">
          <router-link :to="'/Detail?id='+item.id">
            <div class="top_box">
              <div class="logo_box">
                <img :src="item.user.imgUrl" alt="">
              </div>
              <div class="info_box">
                <div class="title">{{item.user.nickName}}</div>
                <div class="time">更新时间：{{item.user.updated_at}}</div>
              </div>
            </div>
            <div class="inner" v-html="item.content">{{item.content}}</div>
            <div class="label_inner">
              <span class="bg_r" v-for="(val,key) in item.user.tag.split(',')" :key="key">{{val}}</span>
              <!-- <span class="bg_y">23岁</span>
              <span class="bg_g">隐适美</span>
              <span class="bg_o">地包天</span>
              <span class="bg_b">牙齿突出</span>
              <span class="bg_gray">矫正完毕</span> -->
            </div>
            <div class="img_box">
              <div class="list" v-for='(val,key) in item.image'><img :src="'/storage/'+val" alt=""></div>
              <div class="list"></div>
            </div>
          </router-link>
          <div class="icon_box">
            <div class="i_inner" @click="shareTo">
              <img src="../images/icon/share.png" alt="">
              <span>{{item.forwardNum}}</span>
            </div>
            <div class="i_inner">
              <router-link :to="'/Detail?id='+item.id+'&b=1'">
                <img src="../images/icon/message.png" alt="">
                <span>{{item.commentsNum}}</span>
              </router-link>
            </div>
            <div v-if="!isPraise" class="i_inner" @click='praise($event)' :data-id="item.id">
              <img src="../images/icon/good.png" alt="" :data-id="item.id">
              <span :data-id="item.id">{{item.praiseNum}}</span>
            </div>
            <div  v-else class="i_inner" :data-id="item.id">
              <img src="../images/icon/goodD.png" alt="" :data-id="item.id">
              <span :data-id="item.id">{{item.praiseNum}}</span>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="bomb_layer" :hidden="!type">
      <div class="mark" @click="layerHide"></div>
      <div class="content">
        <div class="top_box">
          <ul>
            <li v-for="(item,index) in tags" :key="index">
              <div class="type">{{item.label}}</div>
              <div class="btn_box">
                <span class="btn" v-for="(val,i) in item.data" :ref='"item"+item.id' @click="checkTags(val.value,item.id,i)">{{val.value}}</span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
              </div>
            </li>
          </ul>
        </div>
        <div class="set_btn">
          <div class="restart_btn" @click="reset">重置</div>
          <div class="finish_btn" @click="finishCheck">完成</div>
        </div>
      </div>
    </div>
    <div class="share_box" :hidden="!shareType" @click="shareHiden">
      <img src="../images/share.png" alt="">
    </div>
    <loading v-if="!list"></loading>
  </div>
</template>

<script>
import '../css/home.css';
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';
import loading from '../../../common/components/loading';
import toast from '../../../common/components/toast';
import { setPraise } from '../api/home';
export default {
  components: {
    loading
  },
  data() {
    return {
      type: false,
      listType: 'new',
      tagData: {},
      shareType: false,
      isPraise: false
    }
  },
  computed: {
    ...mapGetters({
      tags:'Home/tags',
      list:'Home/list'
    })
  },
  mounted() {

  },
  methods: {
    ...mapActions({
      addAticle: 'Home/getList',
      showTags: 'Home/showTags'
    }),
    ...mapMutations({
      clearList: 'Home/clearList'
    }),
    layerShow() {
      this.$data.type = true;
    },
    layerHide() {
      this.$data.type = false;
    },
    addAticleFun(data) {
      this.addAticle({
        showList: data
      })
    },
    listTypeChange(data) {
      if(data == this.$data.listType){return;}
      this.clearList();
      this.$data.listType = data;
      this.addAticle({
        showList: data
      })
    },
    checkTags(val,id,index) {
      console.log(val)
      console.log(this.$refs['item'+id])
      for(var i = 0;i<this.$refs['item'+id].length;i++){
        this.$refs['item'+id][i].setAttribute("class", 'btn');
      }
      this.$refs['item'+id][index].setAttribute("class", 'btn active');
      this.$data.tagData[id] = val;
    },
    reset() {
      for(var key in this.$refs){
        for(var i=0;i<this.$refs[key].length;i++){
          this.$refs[key][i].setAttribute("class", 'btn');
          this.$data.tagData = {};
        }
      }
    },
    finishCheck() {
      var data = '';
      for(var key in this.$data.tagData){
        data += this.$data.tagData[key]+',';
      }
      data = data.substring(0,data.length-1)
      if(data.split(',').length < 5){
        toast('请将标签选择完整',{delay:1500});
        return;
      }
    },
    shareTo (){
      this.$data.shareType = true;
    },
    shareHiden (){
      this.$data.shareType = false;
    },
    praise (e){
      console.log(e.target.dataset)
      setPraise({
        id:e.target.dataset.id
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.isPraise = true;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    }
  },
  created() {
    window.scrollTo(0,0);
    this.addAticleFun('new');
    this.showTags()
  }
}
</script>
