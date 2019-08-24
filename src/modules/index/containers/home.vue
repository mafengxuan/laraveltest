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
    <div class="list_box" v-if="lists.length">
      <ul>
        <li v-for="(item,index) in lists" :key="index">
          <router-link :to="'/Detail?id='+item.id">
            <div class="top_box">
              <div class="logo_box" v-if="item.user">
                <img :src="item.user.imgUrl" alt="">
              </div>
              <div class="info_box">
                <div class="title" v-if="item.user">{{item.user.nickname}}</div>
                <div class="time" v-if="item.user">更新时间：{{item.user.updated_at}}</div>
              </div>
            </div>
            <div class="inner" v-if="item.user" v-html="item.content">{{item.content}}</div>
            <div class="label_inner" v-if="item.user">
              <span class="bg_r" v-for="(val,key) in item.tag.split(',')" :key="key">{{val}}</span>
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
            <div class="i_inner" @click="shareTo(item.id)">
              <img src="../images/icon/share.png" alt="">
              <span>{{item.forwardNum}}</span>
            </div>
            <div class="i_inner">
              <router-link :to="'/Detail?id='+item.id+'&b=1'">
                <img src="../images/icon/message.png" alt="">
                <span>{{item.commentsNum}}</span>
              </router-link>
            </div>
            <div v-if="!item.praise" class="i_inner">
              <img src="../images/icon/good.png" alt="" :ref='"good"+item.id' @click='praise($event)' :data-id="item.id" :data-Num="item.praiseNum" :data-praise="1">
              <img src="../images/icon/goodD.png" :ref='"goodD"+item.id' alt=""style="display:none;" @click='praise($event)' :data-id="item.id" :data-Num="item.praiseNum" :data-praise="1">
              <span :ref='"praise"+item.id'>{{item.praiseNum}}</span>
            </div>
            <div  v-else class="i_inner">
              <img src="../images/icon/good.png" :ref='"good"+item.id' alt="" style="display:none;" :data-id="item.id" :data-Num="item.praiseNum" :data-praise="0" @click='praise($event)'>
              <img src="../images/icon/goodD.png" :ref='"goodD"+item.id' alt="" :data-id="item.id" :data-Num="item.praiseNum" :data-praise="0" @click='praise($event)'>
              <span :ref='"praise"+item.id'>{{item.praiseNum}}</span>
            </div>
          </div>
        </li>
      </ul>
      <!-- 底部提示信息 -->
      <div class="bottom-tip no_more">
        <span class="loading-hook">{{pullupMsg}}</span>
      </div>
    </div>
    <div v-if="!lists.length && listType=='collect'" style="margin-top: 2.2rem;">
      <div class="no_tip">您还没有收藏过日记哦</div>
      <div class="no_tip">去   <span class="btn" @click="listTypeChange('new')"> 首页 </span>  看看吧</div>
    </div>
    <div class="bomb_layer" :hidden="!type">
      <div class="mark" @click="layerHide"></div>
      <div class="content">
        <div class="top_box">
          <ul>
            <li v-for="(item,index) in tags" :key="index">
              <div class="type">{{item.label}}</div>
              <div class="btn_box">
                <span class="btn" v-for="(val,i) in item.data" :ref='"item"+item.id' @click="checkTags(item.key,val.value,item.id,i)">{{val.value}}</span>
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
    <div class="redbag">
      <a href="#/BagRuler"><img src="../images/redbag.png" alt=""></a>
    </div>
  </div>
</template>

<script>
import '../css/home.css';
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex';
import loading from '../../../common/components/loading';
import toast from '../../../common/components/toast';
import { setPraise,showTagsList,getList,forward } from '../api/home';
import { throttle } from 'lodash';
import { wxshareTo } from '../../../common/utils/wxshare';
import logo from '../images/icon/share.png';
export default {
  components: {
    loading
  },
  data() {
    return {
      pullupMsg:"",
      type: false,
      listType: 'new',
      tagData: {},
      shareType: false,
      lists:'',
      page:1,
      count:""
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
      clearList: 'Home/clearList',
      setTagsList: 'Home/setTagsList'
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
      }).then(res => {
        this.$data.lists = this.list.data;
        this.$data.count = this.list.count;
        if(this.$data.lists.length < this.list.count){
          this.pullupMsg = '没有更多日记啦';
        }
      })
    },
    listTypeChange(data) {
      if(data == this.$data.listType){return;}
      this.clearList();
      this.$data.listType = data;
      this.addAticle({
        showList: data
      }).then(res => {
        this.$data.page = 1;
        // this.pullupMsg = '↓松开立即加载更多';
        this.$data.lists = this.list.data;
        this.$data.count = this.list.count;
        if(this.$data.lists.length < this.list.count){
          this.pullupMsg = '没有更多日记啦';
        }
      })
    },
    checkTags(key,val,id,index) {
      if(key == 'tooth_question'){
        var name = this.$refs['item'+id][index].getAttribute('class');
        if(name.indexOf('active') != -1){
          this.$refs['item'+id][index].setAttribute("class", 'btn');
          // this.$data.tagData.splice(id+index, 1);
          delete this.$data.tagData[id+index]
        }else {
          this.$refs['item'+id][index].setAttribute("class", 'btn active');
          this.$data.tagData[id+index] = val;
        }
      }else {
        for(var i = 0;i<this.$refs['item'+id].length;i++){
          this.$refs['item'+id][i].setAttribute("class", 'btn');
        }
        this.$refs['item'+id][index].setAttribute("class", 'btn active');
        this.$data.tagData[id] = val;
      }
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
      // if(data.split(',').length < 5){
      //   toast('请将标签选择完整',{delay:1500});
      //   return;
      // }
      this.$data.type = false;
      this.$data.listType = '';
      this.$data.lists = "";
      this.tagsList(data);
    },
    tagsList(data){
            console.log(123)
      showTagsList(data).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            // this.setTagsList(res.data.result);
            if(res.data.result.data.length < res.data.result.count){
              if(res.data.result.data.length > 0){
                this.$data.lists = res.data.result.data;
              }
              this.pullupMsg = '没有更多日记啦';
              return;
            }
            this.$data.page = 1;
            this.pullupMsg = '↓松开立即加载更多';
            this.$data.lists = res.data.result.data;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    shareTo (id){
      this.$data.shareType = true;
      forward({articleId:id});
    },
    shareHiden (){
      this.$data.shareType = false;
    },
    praise (e){
      var val = this.$refs['praise'+e.target.dataset.id][0].innerHTML;
      var params = '';
      if(+e.target.dataset.praise){
        params = {
          id: e.target.dataset.id
        }
        this.$refs['praise'+e.target.dataset.id][0].innerHTML = +val + 1;
        this.$refs['good'+e.target.dataset.id][0].setAttribute("data-praise", '0');
        this.$refs['goodD'+e.target.dataset.id][0].setAttribute("data-praise", '0');
        this.$refs['good'+e.target.dataset.id][0].style.display = 'none';
        this.$refs['goodD'+e.target.dataset.id][0].style.display = 'block';
      }else {
        params = {
          id: e.target.dataset.id,
          cancel:1
        }
        this.$refs['praise'+e.target.dataset.id][0].innerHTML = +val - 1 == 0 ? 0 : +val - 1;
        this.$refs['good'+e.target.dataset.id][0].setAttribute("data-praise", '1');
        this.$refs['goodD'+e.target.dataset.id][0].setAttribute("data-praise", '1');
        this.$refs['good'+e.target.dataset.id][0].style.display = 'block';
        this.$refs['goodD'+e.target.dataset.id][0].style.display = 'none';
      }
      setPraise(params).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){

          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    initScroll() {
      const that = this;
      //滚动事件触发
      window.onscroll = throttle(function() {
        if(that.getScrollTop() + that.getClientHeight() +30 >= that.getScrollHeight()) {
          if(that.pullupMsg == '没有更多日记啦'){return;}
          that.pullupMsg = '正在加载更多日记...';
          that.$data.page = that.$data.page + 1;
          getList({type:that.$data.listType,page:that.$data.page}).then(res => {
            if(res.status == 200 && res.data){
              if(res.data.status){
                if(res.data.result.data.length < res.data.result.count){
                  if(res.data.result.data.length){
                    that.$data.lists = that.$data.lists.concat(res.data.result.data);
                  }
                  that.pullupMsg = '没有更多日记啦';
                  return;
                }
                that.pullupMsg = '↓松开立即加载更多';
                that.$data.lists = that.$data.lists.concat(res.data.result.data);
                that.$data.count = res.data.result.count;
              }else {
                toast(res.data.errMessage,{delay:1500});
              }
            }
          })
        }
      },300);
    },
    //获取滚动条当前的位置
    getScrollTop() {
      var scrollTop = 0;
      if(document.documentElement && document.documentElement.scrollTop) {
          scrollTop = document.documentElement.scrollTop;
      } else if(document.body) {
          scrollTop = document.body.scrollTop;
      }
      return scrollTop;
    },
    //获取当前可视范围的高度
    getClientHeight() {
      var clientHeight = 0;
      if(document.body.clientHeight && document.documentElement.clientHeight) {
          clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
      } else {
          clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
      }
      return clientHeight;
    },
    //获取文档完整的高度
    getScrollHeight() {
      return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
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
  },
  created() {
    window.scrollTo(0,0);
    if(this.$route.query.type && this.$route.query.type == 'collect'){
      this.$data.listType = 'collect';
      this.addAticleFun('collect');
    }else {
      this.addAticleFun('new');
    }
    this.showTags();
    this.initScroll();
    this.wxShareFun()
  }
}
</script>
<style>
  .no_more {
    font-size: 0.26rem;
    color: #BABABA;
    text-align: center;
    padding-top: 0.2rem;
    padding-bottom: 0.2rem;
  }
</style>
