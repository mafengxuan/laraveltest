<template lang="html">
  <div class="app-container">
    <div v-html="data.content" class="content"></div>
    <div class="reply">
      <div class="top"><span>文章留言({{msg.length}})</span></div>
      <ul>
        <li v-for="(item,index) in msg" :key="index">
          <div class="img_box">
            <img src="https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=949383615,3755507436&fm=58" alt="">
          </div>
          <div class="info_box">
            <div class="info_box_top">名字 {{item.created_at}}</div>
            <div class="info_box_bottom">{{item.content}}</div>
          </div>
          <div class="btn">
            <el-button plain>回复</el-button>
            <el-button type="danger" plain @click="deleteMsg(item.id)">删除</el-button>
          </div>
          <div style="clear:both;"></div>
          <div class="huifu" v-if="item.reply.length">官方回复</div>
        </li>
      </ul>
    </div>
    <el-dialog
      title="提示"
      :visible.sync="dialogVisible"
      width="30%"
      :before-close="handleClose">
      <span>确定删除</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="deleteMsgSure">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleShow,articleMsg,deleteMsg } from '../../../api/content';
export default {
  data() {
    return {
      data:'',
      msg:"",
      commentId:'',
      dialogVisible: false
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
        articleMsg({id:this.$route.query.id}).then(res => {
          if(res.data.status){
            this.$data.msg = res.data.result;
          }else {
            Message({
              message: res.data.errMessage,
              type: 'error',
              duration: 1 * 1000
            })
          }
        })
      }
    },
    deleteMsg(id){
      this.$data.commentId = id;
      this.$data.dialogVisible = true;
    },
    deleteMsgSure(){
      this.$data.dialogVisible = false;
      deleteMsg({id:this.$data.commentId}).then(res => {
        if(res.data.status){
          Message({
            message: res.data.result,
            type: 'success',
            duration: 1 * 1000
          })
          this.getArticle();
        }else {
          Message({
            message: res.data.errMessage,
            type: 'error',
            duration: 1 * 1000
          })
        }
      })
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
  .reply {
    width: 100%;
  }
  .reply .top {
    width: 100%;
    height: 50px;
    line-height: 50px;
    background: #f7f7f7;
    text-align: left;
    font-size: 14px;
    color: #606266;
  }
  .reply .top span {
    margin-left: 40px;
  }
  .reply ul {
    width: 100%;
    padding: 0;
    margin:0;
  }
  .reply ul li {
    list-style-type:none;
    padding: 20px 0;
    padding-left: 45px;
  }
  .reply ul li:nth-child(even) {
    background: #f7f7f7;
  }
  .reply ul li .img_box {
    float: left;
    width: 52px;
    height: 52px;
    text-align: center;
    line-height: 52px;
  }
  .reply ul li .img_box img {
    display: inline-block;
    max-width: 100%;
    max-height: 100%;
  }
  .reply ul li .info_box {
    float: left;
    padding-left: 20px;
  }
  .reply ul li .info_box .info_box_top {
    font-size: 14px;
    color: #909399;
    margin-top: 5px;
  }
  .reply ul li .info_box .info_box_bottom {
    font-size: 14px;
    margin-top: 5px;
  }
  .reply ul li .btn {
    float: right;
    margin-top: 5px;
    margin-right: 30px;
  }
  .reply ul li .huifu {
    padding-left: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 14px;
    color: #606266;
  }
</style>
