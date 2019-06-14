<template lang="html">
  <div class="app-container">
    <div v-html="data.content" class="content"></div>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleShow } from '../../../api/content';
export default {
  data() {
    return {
      data:''
    }
  },
  created() {
    this.getArticle();
  },
  methods: {
    getArticle(){
      if(this.$route.query && this.$route.query.id){
        articleShow({id:this.$route.query.id}).then(res => {
          if(res.status == 200 && res.data){
            if(res.data.status){
              this.$data.data = res.data.result;
            }else {
              Message({
                message: res.data.errMessage,
                type: 'error',
                duration: 1 * 1000
              })
            }
          }
        })
      }
    }
  }
}
</script>

<style lang="css" scoped>
  .content {
    width: 100%;
  }
  .content p {
    width: 100%;
    line-height: 48px;
    font-size: 32px;
    color: #000000;
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: justify;
  }
</style>
