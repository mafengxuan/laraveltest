<template lang="html">
  <div class="app-container">
     <el-button type="primary" style="margin-bottom: 20px;" @click="goBack">返回</el-button>
    <div v-html="data.content" class="content"></div>
    <div class="reply">
      <div class="top"><span>文章留言({{msg.length}})</span></div>
      <ul>
        <li v-for="(item,index) in msg" :key="index">
          <div class="img_box">
            <img :src="item.user.imgUrl" alt="">
          </div>
          <div class="info_box">
            <div class="info_box_top">{{item.user.nickName}} {{item.created_at}}</div>
            <div class="info_box_bottom">{{item.content}}</div>
          </div>
          <div class="btn">
            <el-button plain style="position:relative;width:70px;height:40px;line-height:0;top:2px;"><div @click="replayMsg($event)" :data-commentId="item.id" :data-reUserId="item.user.userId" :data-reNickname="item.user.nickName" style="position:absolute;left:0;top;0;width:70px;height:40px;">回复</div></el-button>
            <el-button type="danger" plain @click="deleteMsg(item.id)">删除</el-button>
          </div>
          <div style="clear:both;"></div>
          <div class="" v-if="item.reply.length">
            <div class="huifu" v-for="(val,i) in item.reply">{{val.nickname}}: {{val.content}}</div>
          </div>
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
    <el-dialog
      title="提示"
      :visible.sync="dialogreply"
      width="30%"
      :before-close="handleClose">
      <el-input
        placeholder="请输入内容"
        v-model="remark"
        style="margin-top:20px;">
      </el-input>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogreply = false">取 消</el-button>
        <el-button type="primary" @click="replayMsgSure">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleShow,articleMsg,deleteMsg,addReply } from '../../../api/content';
export default {
  data() {
    return {
      data:'',
      msg:"",
      commentId:'',
      dialogVisible: false,
      dialogreply: false,
      remark:"",
      replay: {
        content:'',
        commentId:"",
        reUserId:"",
        reNickname:''
      }
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
    },
    replayMsg(e){
      if ( e && e.preventDefault ) {
              //阻止默认浏览器动作(W3C)
              e.preventDefault();
      }else{
          //IE中阻止函数器默认动作的方式
          window.event.returnValue = false;
          return false;
      }
      this.$data.dialogreply = true;
      console.log(e.target.dataset);
      this.$data.replay.commentId=e.target.dataset.commentid;
      this.$data.replay.reUserId=e.target.dataset.reuserid;
      this.$data.replay.reNickname=e.target.dataset.renickname;
    },
    replayMsgSure() {
      if(!this.$data.remark){
        Message({
          message: '请输入内容',
          type: 'error',
          duration: 1 * 1000
        })
        return;
      }
      addReply({
        content: this.$data.remark,
        commentId:this.$data.replay.commentId,
        reUserId:this.$data.replay.reUserId,
        reNickname:this.$data.replay.reNickname
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            Message({
              message: res.data.result,
              type: 'success',
              duration: 1 * 1000
            })
            this.$data.dialogreply = false;
            this.getArticle();
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
    goBack() {
      this.$router.go(-1);
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
