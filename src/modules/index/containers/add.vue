<template lang="html">
  <div id="add">
    <quill-editor v-model="content"
                  ref="myQuillEditor"
                  class="editer"
                  :options="editorOption"
                  autofocus
                  @change="onEditorChange($event)">
    </quill-editor>
    <div class="btn_box">
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
      <div class="upImg" @click="chooseType">
        <img src="../images/icon/upImg.png" alt="">
      </div>
      <div class="push" v-if="!isSave" @click="push">发布</div>
      <div class="push" v-else @click="updata">保存</div>
      <div class="save" @click="save">保存草稿</div>
    </div>
    <div class="Info_dialog" v-if="Info">
      <div class="Info_dialog_box">
        <div class="close cubeic-close" @click="Info=false"></div>
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
    <loading v-if="loading"></loading>
  </div>
</template>

<script>
import "../css/add.css";
import { quillEditor } from 'vue-quill-editor' //调用编辑器
import '../css/quillcore.css';
import '../css/quillsnow.css';
import '../css/quillbubble.css';
import toast from '../../../common/components/toast';
import loading from '../../../common/components/loading';
import { mapGetters, mapActions, mapMutations } from 'vuex';
import { storeExtInfo,getArticle,updateArticle } from '../api/add';

export default {
  components: {
    //使用编辑器
    quillEditor,
    loading
  },
  data(){
    return {
      content:'',
      editorOption:{
        placeholder: '来吧，尽情发挥吧...',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block']
          ]
        }
      },
      imgList:[],
      loading: false,
      Info: false,
      name:"",
      mobile:"",
      doctor:'',
      isSave: false,
      id:""
    }
  },
  computed: {
    ...mapGetters({
      img:'Add/img'
    })
  },
  methods: {
    ...mapActions({
      addAticle: 'Add/addAticle',
      uploadImage: 'Add/uploadImage'
    }),
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
      this.uploadImage(formData)
    },
    save() {
      if(!this.$data.content){
        toast('内容不能为空',{delay:1500});
        return;
      }
      this.addAticle({
        qrCode:'test',
        image: this.$data.imgList,
        content: this.$data.content,
        isDraft:1
      }).then(res => {
        setTimeout(() => {
          // this.$router.push('/');
        }, 1500)
      });
    },
    push() {
      if(!this.$data.content){
        toast('内容不能为空',{delay:1000});
        return;
      }
      this.$data.Info = true;
    },
    onEditorChange({ editor, html, text }) {
      console.log(html)
    },
    updata(){
      if(!this.$data.content){
        toast('内容不能为空',{delay:1000});
        return;
      }
      updateArticle({
        qrCode:'test',
        image: this.$data.imgList,
        content: this.$data.content,
        isDraft:0,
        id:this.$data.id
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            // toast(res.data.result,{delay:1500});
            this.$createDialog({
              type: 'alert',
              title: '发布成功',
              content: '工作人员会在工作日24小时内审核!',
              icon: 'cubeic-alert',
              onConfirm: () => {
              }
            }).show()
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      });
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
        this.addAticle({
          qrCode:'test',
          image: this.$data.imgList,
          content: this.$data.content,
          isDraft:0
        }).then(res => {
          this.$data.Info = false;
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
    }
  },
  created() {
    window.scrollTo(0,0);
    getArticle().then(res => {
      if(res.status == 200 && res.data){
        if(res.data.status){
          if(res.data.result && res.data.result.article && res.data.result.article.content){
            this.$data.content = res.data.result.article.content;
            this.$data.id = res.data.result.article.id;
            this.$data.isSave = true;
          }
        }else {
          toast(res.data.errMessage,{delay:1500});
        }
      }
    })
  },
  watch: {
    img(data){
      this.$data.imgList.push(data);
      var l = this.$data.imgList.length;
      this.$data.content += '<p><img index='+l+' src=/storage'+data+' /></p>'+'<p><br/></p>';
      this.$data.loading = false;
    }
  }
}
</script>
