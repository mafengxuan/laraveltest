<template lang="html">
  <div id="newAdd">
    <div class="newAdd_box">
      <div style="height:0.88rem;"></div>
      <quill-editor v-model="content"
                    ref="myQuillEditor"
                    class="editer"
                    :options="editorOption"
                    autofocus>
      </quill-editor>
      <input @change="fileChange($event)" type="file" id="upload_file" multiple style="display: none"/>
      <div class="addImg" @click="chooseType">
        <img src="../images/add.png" alt="">
      </div>
    </div>
  </div>
</template>

<script>
import "../css/newAdd.css";
import '../css/quillcore.css';
import '../css/quillsnow.css';
import '../css/quillbubble.css';
import { quillEditor } from 'vue-quill-editor'; //调用编辑器
import loading from '../../../common/components/loading';
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
      }
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
      // this.uploadImage(formData)
    }
  }
}
</script>
