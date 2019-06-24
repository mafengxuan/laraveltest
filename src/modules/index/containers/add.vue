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
      <div class="push" @click="push">发布</div>
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
import { storeExtInfo } from '../api/add';

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
      doctor:''
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
      console.log(this.$data.content);
      if(!this.$data.content){
        toast('内容不能为空',{delay:1500});
        return;
      }
      this.addAticle({
        qrCode:'test',
        image: this.$data.imgList,
        content: this.$data.content,
        isDraf:1
      }).then(res => {
        setTimeout(() => {
          this.$router.push('/');
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
    saveUserInfo(){
      storeExtInfo({
        name: this.$data.name,
        mobile: this.$data.mobile,
        doctor: this.$data.doctor
      }).then(res => {
        this.addAticle({
          qrCode:'test',
          image: this.$data.imgList,
          content: this.$data.content,
          isDraf:0
        }).then(res => {
          setTimeout(() => {
            this.$router.push('/');
          }, 1000)
        });
      })
    }
  },
  created() {
    window.scrollTo(0,0);
  },
  watch: {
    img(data){
      this.$data.imgList.push(data);
      var l = this.$data.imgList.length;
      this.$data.content += '<img index='+l+' src=/storage'+data+'>';
      this.$data.loading = false;
    }
  }
}
</script>
