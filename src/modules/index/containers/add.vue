<template lang="html">
  <div id="add">
    <div class="">
      <quill-editor v-model="content"
                    ref="myQuillEditor"
                    class="editer"
                    :options="editorOption">
      </quill-editor>
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
              ['bold', 'italic', 'underline', 'strike','image'],        // toggled buttons
              ['blockquote', 'code-block']
            ]
          }
        }
    }
  },
  methods: {
    ...mapActions({
      addAticle: 'Add/addAticle'
    }),
    save() {
      this.addAticle({
        qrCode:'test',
        image:'test',
        content:'123'
      });
    }
  }
}
</script>
