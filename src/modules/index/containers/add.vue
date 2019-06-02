<template lang="html">
  <div id="add">
    <div class="">
      <quill-editor v-model="content"
                    ref="myQuillEditor"
                    class="editer"
                    :options="editorOption">
      </quill-editor>
    </div>
  </div>
</template>

<script>
import "../css/add.css";
import { quillEditor } from 'vue-quill-editor' //调用编辑器

export default {
  components: {
    //使用编辑器
    quillEditor
  },
  data(){
    return {
        content:null,
        editorOption:{}
    }
  },
}
</script>
