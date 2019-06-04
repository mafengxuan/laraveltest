<template lang="html">
  <div id="add">
    <div class="">
      <quill-editor v-model="content"
                    ref="myQuillEditor"
                    class="editer"
                    :options="editorOption"
                    autofocus
                    @change="onEditorChange($event)">
      </quill-editor>
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
      <div class="upImg" @click="chooseType">
        <img src="../images/icon/upImg.png" alt="">
      </div>
      <div class="push" @click="push">发布</div>
      <div class="save" @click="save">保存草稿</div>
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
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block']
          ]
        }
      },
      imgList:[],
      loading: false
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
      }
      this.addAticle({
        qrCode:'test',
        image: this.$data.imgList,
        content: this.$data.content,
        isDraf:1
      });
    },
    push() {
      console.log(this.$data.content);
      if(!this.$data.content){
        toast('内容不能为空',{delay:1500});
      }
      this.addAticle({
        qrCode:'test',
        image: this.$data.imgList,
        content: this.$data.content,
        isDraf:0
      });
    },
    onEditorChange({ editor, html, text }) {
      console.log(html)
    }
  },
  created() {
    window.scrollTo(0,0);
  },
  watch: {
    img(data){
      this.$data.imgList.push(data);
      var l = this.$data.imgList.length;
      this.$data.content += '<p><img index='+l+' src=/storage'+data+'></p>';
      this.$data.loading = false;
    }
  }
}
</script>
