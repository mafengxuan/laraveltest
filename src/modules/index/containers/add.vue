<template lang="html">
  <div id="add">
    <div class="">
      <quill-editor v-model="content"
                    ref="myQuillEditor"
                    class="editer"
                    :options="editorOption">
      </quill-editor>
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
      <div class="ql-toolbar ql-snow" style="float: left;border: 0;padding: 0;" @click="chooseType">
        <div class="ql-formats">
          <button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button>
        </div>
      </div>
      <div class="push">发布</div>
      <div class="save" @click="save">保存草稿</div>
    </div>
  </div>
</template>

<script>
import "../css/add.css";
import { quillEditor } from 'vue-quill-editor' //调用编辑器
import '../css/quillcore.css';
import '../css/quillsnow.css';
import '../css/quillbubble.css';
import toast from '../../../common/components/toast';
import { mapGetters, mapActions, mapMutations } from 'vuex';

export default {
  components: {
    //使用编辑器
    quillEditor
  },
  data(){
    return {
      content:null,
      editorOption:{
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block']
          ]
        }
      },
      imgList:[]
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
      console.log(files);
      console.log(files.type);
      if(!/image\/jpeg|image\/png|image\/jpg/.test(files.type)){
        toast('不支持的图片格式',{delay:1500});
        return;
      }
      if(files.size/1024 > 1024*2){
        toast('图片过大不支持上传',{delay:1500});
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
      return;
      this.addAticle({
        qrCode:'test',
        image:'test',
        content: this.$data.content
      });
    }
  },
  created() {
    window.scrollTo(0,0);
  }
}
</script>
