<template lang="html">
  <div id="editDetail">
    <div class="info_box" v-if="info && info.user">
      <div class="top_box">
        <div class="logo_box"><img :src="info.user.imgUrl" alt=""></div>
        <div class="info_boxs">
          <div class="title">{{info.user.nickname}}</div>
          <div class="time">更新时间：{{info.updated_at}}</div>
        </div>
      </div>
      <div class="inner" v-if="info.user">{{info.user.content}}</div>
      <div class="label_inner" v-if="info.tag">
        <span class="bg_r" v-for="(val,key) in info.tag.split(',')" :key="key">{{val}}</span>
      </div>
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
      <div class="img_box">
        <div class="list" v-if="info.image && info.image.length" v-for="(item,index) in imgList" :key="index">
          <div class="close cubeic-close" @click="deleImg($event)" :data-index="index"></div>
          <img class="img_n" :src="'/storage'+item" alt="">
        </div>
        <div class="list add" @click="chooseType">
          <div class="add_img">添加封面</div>
          <div class="add_img_box">
            <img src="../images/add_b.png" alt="">
          </div>
        </div>
        <div class="list add" @click="chooseType">
          <div class="add_img">添加封面</div>
          <div class="add_img_box">
            <img src="../images/add_b.png" alt="">
          </div>
        </div>
        <div class="list add" @click="chooseType">
          <div class="add_img">添加封面</div>
          <div class="add_img_box">
            <img src="../images/add_b.png" alt="">
          </div>
        </div>
        <div class="list"></div>
        <div class="list"></div>
      </div>
    </div>
    <div class="editDetail_title">矫正历程</div>
    <div class="editDetail_list" v-for="(val,key) in info.my_detail" :key="key">
      <div class="title"><img src="../images/time.png" alt="">  <span>{{val.title}}</span></div>
      <ul>
        <li>
          <div class="toEditBox">
            <router-link :to="'/NewAdd?id='+val.id">
              <img src="../images/edit.png" alt="">
            </router-link>
          </div>
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
    <div style="margin-top: .2rem;margin-bottom:0.3rem;">
      <!-- <div class="no_tip">您还没有矫正历程</div> -->
      <div class="no_tip">
        <router-link to="/NewAdd">
          <span class="btn">添加</span>
        </router-link>
      </div>
    </div>
    <div style="height: 0.8rem;"></div>
    <div class="btn_box">
      <div class="push" v-if="!isSave" @click="push">发布</div>
      <div class="push" v-else @click="updata">保存</div>
    </div>
    <div class="Info_dialog" v-if="Infos">
      <div class="Info_dialog_box">
        <div class="close cubeic-close" @click="Infos=false"></div>
        <div style="height:0.7rem;"></div>
        <div class="item">
          <span>您的姓名</span>
          <input type="text" name="" v-model="name">
        </div>
        <div class="item">
          <span>您的手机</span>
          <input type="text" name="" v-model="mobile">
        </div>
        <div class="item">
          <span>主治医生</span>
          <input type="text" name="" v-model="doctor">
        </div>
        <div class="btn" @click="saveUserInfo">提交</div>
        <div class="tip">请填写您在劲松口腔就诊时预留的姓名和电话，以及您的正畸医生姓名。</div>
      </div>
    </div>
    <loading v-if="!info"></loading>
  </div>
</template>

<script>
import "../css/editDetail.css";
import loading from '../../../common/components/loading';
import { getDetail,storeExtInfo,addAticle,uploadImage } from '../api/editDetail';
import toast from '../../../common/components/toast';

export default {
  components: {
    loading
  },
  data() {
    return {
      info:'',
      imgList:[],
      isSave: false,
      Infos: false,
      name:"",
      mobile:"",
      doctor:'',
      id:''
    }
  },
  methods: {
    getDetail (){
      var id=this.$route.query.id;
      getDetail(id).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.info = res.data.result;
            this.$data.id = res.data.result.id;
            this.$data.imgList = res.data.result.image;
            this.$data.isSave = true;
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    chooseType() {
      document.getElementById('upload_file').click();
    },
    fileChange(el) {
      var files = el.target.files[0];
      this.$data.loading = true;
      if(!/image\/jpeg|image\/png|image\/jpg/.test(files.type)){
        toast('不支持的图片格式',{delay:1500});
        this.$data.loading = false;
        return;
      }
      if(files.size/1024 > 1024*2){
        toast('图片过大不支持上传',{delay:1500});
        this.$data.loading = false;
        return;
      }
      var formData = new FormData();
      formData.append('files[]', files);
      uploadImage(formData).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.imgList.push(res.data.result);
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    },
    deleImg (e){
      var index = e.target.dataset.index;
      this.$data.imgList.splice(index, 1);
    },
    push() {
      this.$data.Infos = true;
    },
    saveUserInfo(){
      if(this.$data.name.length < 2 ){
        toast('请输入正确的姓名',{delay:1000});
        return;
      }
      var  re = /^1\d{10}$/;
      if(!re.test(this.$data.mobile)){
        toast('请输入正确的手机号',{delay:1000});
        return;
      }
      if(this.$data.doctor.length < 2 ){
        toast('请输入正确的姓名',{delay:1000});
        return;
      }
      storeExtInfo({
        name: this.$data.name,
        mobile: this.$data.mobile,
        doctor: this.$data.doctor
      }).then(res => {
        addAticle({
          qrCode:'',
          image: this.$data.imgList,
          content: '',
          status: 3
        }).then(res => {
          this.$data.Infos = false;
          setTimeout(() => {
            this.$createDialog({
              type: 'alert',
              title: '发布成功',
              content: '工作人员会在工作日24小时内审核!',
              icon: 'cubeic-alert',
              onConfirm: () => {
              }
            }).show()
          }, 0)
        });
      })
    },
    updata(){
      addAticle({
        qrCode:'',
        image: this.$data.imgList,
        content: '',
        status: 3,
        id:this.$data.id
      }).then(res => {
        this.$createDialog({
          type: 'alert',
          title: '发布成功',
          content: '工作人员会在工作日24小时内审核!',
          icon: 'cubeic-alert',
          onConfirm: () => {
          }
        }).show()
        // if(res.status == 200 && res.data){
        //   if(res.data.status){
        //     // toast(res.data.result,{delay:1500});
        //     this.$createDialog({
        //       type: 'alert',
        //       title: '发布成功',
        //       content: '工作人员会在工作日24小时内审核!',
        //       icon: 'cubeic-alert',
        //       onConfirm: () => {
        //       }
        //     }).show()
        //   }else {
        //     toast(res.data.errMessage,{delay:1500});
        //   }
        // }
      });
    }
  },
  created() {
    this.getDetail();
  },
}
</script>

<style lang="css" scoped>
</style>
