<template lang="html">
  <div id="newAdd">
    <div class="newAdd_box">
      <div style="height:0.88rem;"></div>
      <div class="time_box">
        <div class="text">矫正时间</div>
        <cube-select
          v-model="title"
          :options="tagsArr[2]"
          @change="tagsChage">
        </cube-select>
      </div>
      <quill-editor v-model="content"
                    ref="myQuillEditor"
                    class="editer"
                    :options="editorOption"
                    autofocus>
      </quill-editor>
      <div class="img_box">
        <div class="list" v-for="(item,index) in imgList" :key="index">
          <img class="img_n" :src="'/storage/'+item.src" alt="">
          <div class="close cubeic-close" :data-id="item.id" @click='closeImg($event)'></div>
        </div>
        <div class="addImg" @click="chooseType" v-if="imgList.length < 3">
          <img src="../images/add.png" alt="">
        </div>
        <div class="list" style="height:0;margin:0.padding:0;"></div>
      </div>
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
    </div>
    <div style="height:0.8rem;"></div>
    <div class="btn_box">
      <div class="push" @click="save">保存</div>
    </div>
    <loading v-if="loadings"></loading>
  </div>
</template>

<script>
import "../css/newAdd.css";
import '../css/quillcore.css';
import '../css/quillsnow.css';
import '../css/quillbubble.css';
import { quillEditor } from 'vue-quill-editor'; //调用编辑器
import loading from '../../../common/components/loading';
import { uploadImage,detailStore,getDetail,detailUpdate } from '../api/newAdd';
import { showTags } from '../api/personal';
import toast from '../../../common/components/toast';
export default {
  components: {
    //使用编辑器
    quillEditor,
    loading
  },
  data(){
    return {
      content:'',
      title: '',
      order:'',
      image:[],
      pid: '',
      editorOption:{
        placeholder: '来吧，尽情发挥吧...',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block']
          ]
        }
      },
      imgList: [],
      imgNum: '',
      tags:"",
      tagsArr:'',
      loadings: false
    }
  },
  methods: {
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
      this.$data.loadings = true;
      uploadImage(formData).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.imgNum = +this.$data.imgNum + 1;
            this.$data.imgList.push({
              id: this.$data.imgNum,
              src: res.data.result
            })
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
        this.$data.loadings = false;
      })
    },
    closeImg (event){
      this.$data.loadings = true;
      document.getElementById('upload_file').value = '';
      var id = event.target.dataset.id;
      for(var i=0;i<this.$data.imgList.length;i++) {
        if(id == this.$data.imgList[i].id){
          this.$data.imgList.splice(i, 1);
        }
      }
      this.$data.loadings = false;
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
    tagsChage(value, index, text){
      for(var i=0;i<this.$data.tags[2].data.length;i++){
        if(value == this.$data.tags[2].data[i].value) {
          this.$data.order = this.$data.tags[2].data[i].key;
        }
      }
    },
    save (){
      this.$data.image = [];
      for(var i=0;i<this.$data.imgList.length;i++){
        this.$data.image.push(this.$data.imgList[i].src);
      }
      if(!this.$data.title){
        toast('请选择矫正时间',{delay:1500});
        return;
      }
      if(!this.$data.content){
        toast('内容不能为空',{delay:1500});
        return;
      }
      if(!this.$data.image){
        toast('请上传图片',{delay:1500});
        return;
      }

      if(this.$route.query && this.$route.query.id){
        detailUpdate({
          title: this.$data.title,
          id: this.$route.query.id,
          content: this.$data.content,
          order: this.$data.order,
          pid: this.$data.pid,
          image: this.$data.image
        }).then(res => {
          if(res.status == 200 && res.data){
            if(res.data.status){
              toast(res.data.result,{delay:1500});
            }else {
              toast(res.data.errMessage,{delay:1500});
            }
          }
        })
      }else {
        detailStore({
          title: this.$data.title,
          content: this.$data.content,
          order: this.$data.order,
          image: this.$data.image
        }).then(res => {
          if(res.status == 200 && res.data){
            if(res.data.status){
              toast(res.data.result,{delay:1500});
            }else {
              toast(res.data.errMessage,{delay:1500});
            }
          }
        })
      }
    },
  },
  created() {
    var that = this;
    window.scrollTo(0,0);
    showTags().then(res => {
      if(res.status == 200 && res.data){
        if(res.data.status){
          that.initTags(res.data.result);
          that.$data.tags = res.data.result;
        }else {
          toast(res.data.errMessage,{delay:1500});
        }
      }
    });
    if(this.$route.query && this.$route.query.id){
      getDetail(this.$route.query.id).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.content = res.data.result.content;
            this.$data.title = res.data.result.title;
            this.$data.order = res.data.result.order;
            this.$data.pid = res.data.result.pid;
            for(var i=0;i<res.data.result.image.length;i++) {
              this.$data.imgList.push({
                id: i,
                src: res.data.result.image[i]
              })
            }
          }else {
            toast(res.data.errMessage,{delay:1500});
          }
        }
      })
    }
  }
}
</script>
