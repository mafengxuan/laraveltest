<template lang="html">
  <div class="app-container">
    <quill-editor v-model="content"
                  ref="myQuillEditor"
                  class="editer"
                  :options="editorOption"
                  autofocus>
    </quill-editor>
    <div>
      <input @change="fileChange($event)" ref="file" type="file" id="quill-upload" style="display:none;" name="" value="">
    </div>
    <el-button type="primary" style="margin-top:60px;" @click="save">保存</el-button>
  </div>
</template>

<script>
import { quillEditor } from 'vue-quill-editor' //调用编辑器
import '../../../css/quillcore.css';
import '../../../css/quillsnow.css';
import '../../../css/quillbubble.css';
import { Message } from 'element-ui';
import { getRuler,rulerUpdate } from '../../../api/ruler';
import { uploadImage } from '../../../api/banner';

// 工具栏配置
const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{'header': 1}, {'header': 2}],               // custom button values
  [{'list': 'ordered'}, {'list': 'bullet'}],
  [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
  [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
  [{'direction': 'rtl'}],                         // text direction

  [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
  [{'header': [1, 2, 3, 4, 5, 6, false]}],

  [{'color': []}, {'background': []}],          // dropdown with defaults from theme
  [{'font': []}],
  [{'align': []}],
  ['link', 'image', 'video'],
  ['clean']                                         // remove formatting button
]


export default {
  components: {
    //使用编辑器
    quillEditor
  },
  data(){
    return {
      content:'',
      image:'',
      editorOption:{
        modules: {
          toolbar: {
            container: toolbarOptions,  // 工具栏
            handlers: {
              'image': function (value) {
                  if (value) {
                      document.querySelector('#quill-upload').click()
                  } else {
                      this.quill.format('image', false);
                  }
              }
            }
          }
        }
      }
    }
  },
  created() {
    this.getRulers();
  },
  methods: {
    getRulers() {
      getRuler({id:1}).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.content = res.data.result.content;
          }else {
            Message({
              message: res.data.errMessage,
              type: 'error',
              duration: 1 * 1000
            })
          }
        }
      })
    },
    save() {
      rulerUpdate({id:1,content:this.$data.content}).then(res => {
        if(res.data.status){
          Message({
            message: res.data.result,
            type: 'success',
            duration: 1 * 1000
          })
        }else {
          Message({
            message: res.data.errMessage,
            type: 'error',
            duration: 1 * 1000
          })
        }
      })
    },
    fileChange(el) {
      var files = el.target.files[0];
      if(!/image\/jpeg|image\/png|image\/jpg/.test(files.type)){
        Message({
          message: '不支持的图片格式',
          type: 'error',
          duration: 1 * 1000
        })
        this.$refs.file.value = ''
        return;
      }
      if(files.size/1024 > 1024*2){
        Message({
          message: '图片过大不支持上传',
          type: 'error',
          duration: 1 * 1000
        })
        this.$refs.file.value = ''
        return;
      }
      this.$data.fullscreenLoading = true;
      var formData = new FormData();
      formData.append('files[]', files);
      uploadImage(formData).then(res => {
        this.$data.fullscreenLoading = false;
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.image = res.data.result;
            this.$data.content += '<img src=/storage/'+this.image+'/>'
          }else {
            Message({
              message: res.data.errMessage,
              type: 'error',
              duration: 1 * 1000
            })
          }
        }
      });
    },
  }
}
</script>

<style lang="css" scoped>
.quill-editor {
  height: 460px;
}
</style>
