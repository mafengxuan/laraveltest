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
            <div class="label_inner" v-if='item.tags.length'>
              <span class="bg_r" v-for="(val,key) in item.tags" :key="key">男</span>
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
            <div class="i_inner">
              <img src="../images/icon/share.png" alt="">
              <span>{{item.forwardNum}}</span>
            </div>
            <div class="i_inner">
              <img src="../images/icon/message.png" alt="">
              <span>{{item.commentsNum}}</span>
            </div>
            <div class="i_inner">
              <img v-if='item.praiseNum' src="../images/icon/goodD.png" alt="">
              <img v-else src="../images/icon/good.png" alt="">
              <span>{{item.praiseNum}}</span>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="bomb_layer" v-if="type">
      <div class="mark" @click="layerHide"></div>
      <div class="content">
        <div class="top_box">
          <ul>
            <li v-for="(item,index) in tags" :key="index">
              <div class="type">{{item.label}}</div>
              <div class="btn_box">
                <span class="btn" v-for="(val,key) in item.data" :key="key" :data-key="val.key">{{val.value}}</span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
              </div>
            </li>
            <!-- <li>
              <div class="type">年龄</div>
              <div class="btn_box">
                <span class="btn active">0~12岁</span>
                <span class="btn">13~18岁</span>
                <span class="btn">19~24岁</span>
                <span class="btn">25~29岁</span>
                <span class="btn">30~35岁</span>
                <span class="btn">35岁以上</span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
              </div>
            </li>
            <li>
              <div class="type">矫正时间</div>
              <div class="btn_box">
                <span class="btn active">矫正完毕</span>
                <span class="btn">1~12个月</span>
                <span class="btn">12~24个月</span>
                <span class="btn">24个月以上</span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
              </div>
            </li>
            <li>
              <div class="type">牙套类型</div>
              <div class="btn_box">
                <span class="btn active">钢丝矫正</span>
                <span class="btn">时代天使</span>
                <span class="btn">冰晶托槽</span>
                <span class="btn">金属托槽</span>
                <span class="btn">陶瓷托槽</span>
                <span class="btn">隐适美</span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
              </div>
            </li>
            <li>
              <div class="type">牙齿问题</div>
              <div class="btn_box">
                <span class="btn active">地包天</span>
                <span class="btn">牙齿突出</span>
                <span class="btn">龅牙</span>
                <span class="btn">错位牙</span>
                <span class="btn">牙间隙</span>
                <span class="btn">牙列拥挤</span>
                <span class="btn">前牙开颌</span>
                <span class="btn">咬颌错乱</span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
                <span class="btn" style="height:0;margin:0;border:0"></span>
              </div>
            </li> -->
          </ul>
        </div>
        <div class="set_btn">
          <div class="restart_btn">重置</div>
          <div class="finish_btn">完成</div>
        </div>
      </div>
    </div>
    <loading v-if="!list"></loading>
  </div>
</template>

<script>
import '../css/home.css';
import { mapGetters, mapActions, mapMutations } from 'vuex';
import loading from '../../../common/components/loading';
export default {
  components: {
    loading
  },
  data() {
    return {
      type: false,
      listType: 'new',
      tagData:''
    }
  },
  computed: {
    ...mapGetters({
      list:'Home/list',
      tags:'Home/tags'
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
      console.log(data);
      if(data == this.$data.listType){return;}
      this.clearList();
      this.$data.listType = data;
      this.addAticle({
        showList: data
      })
    }
  },
  created() {
    window.scrollTo(0,0);
    this.addAticleFun('new');
    this.showTags();
  }
}
</script>
