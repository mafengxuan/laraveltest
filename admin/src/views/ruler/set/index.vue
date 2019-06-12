<template lang="html">
  <div class="app-container">
    <quill-editor v-model="content"
                  ref="myQuillEditor"
                  class="editer"
                  :options="editorOption"
                  autofocus
                  @change="onEditorChange($event)">
    </quill-editor>
    <el-button type="primary" style="margin-top:60px;">保存</el-button>
  </div>
</template>

<script>
import { quillEditor } from 'vue-quill-editor' //调用编辑器
import '../../../css/quillcore.css';
import '../../../css/quillsnow.css';
import '../../../css/quillbubble.css';
export default {
  components: {
    //使用编辑器
    quillEditor
  },
  data(){
    return {
      content:'',
      editorOption:{

      }
    }
  },
}
</script>

<style lang="css" scoped>
.quill-editor {
  height: 460px;
}
</style>
