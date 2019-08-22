<template lang="html">
  <div class="app-container">
    <el-button type="primary" style="margin-bottom: 20px;" @click="goBack">返回</el-button>
    <div class="top_box">
      <div class="logo_box" v-if="data.user">
        <img :src="data.user.imgUrl" alt="">
      </div>
      <div class="info_box">
        <div class="title" v-if="data.user">{{data.user.nickname}}</div>
        <div class="time">更新时间：{{data.updated_at}}</div>
      </div>
    </div>
    <div class="detail inner" v-if="data.user">{{data.user.content}}</div>

    <div class="editDetail_title">矫正历程</div>
    <div class="editDetail_list" v-for="(val,key) in data.my_detail" :key="key">
      <div class="title">
        <img src="../../../images/time.png" alt="">
        <span>{{val.title}} </span>
        <el-tag type="success" v-if="val.status == 1">通过</el-tag>
        <el-tag type="danger" v-if="val.status == 2">驳回</el-tag>
        <el-tag v-if="val.status == 3">待审核</el-tag>
      </div>
      <ul>
        <li>
          <div class="content" v-html="val.content"></div>
          <div class="img_boxs">
            <div class="img_box_list" v-if='val.image.length == 1'>
              <img :src="'/storage/'+val.image[0]" alt="">
            </div>
            <div class="img_box_list_two" v-if='val.image.length == 2'>
              <div class="one"><img :src="'/storage/'+val.image[0]" alt=""></div>
              <div class="two"><img :src="'/storage/'+val.image[1]" alt=""></div>
            </div>
            <div class="img_box_list_three clearfix" v-if='val.image.length == 3'>
              <div class="one"><img :src="'/storage/'+val.image[0]" alt=""></div>
              <div class="img_box_list_three_right">
                <div class="two"><img :src="'/storage/'+val.image[1]" alt=""></div>
                <div class="three"><img :src="'/storage/'+val.image[2]" alt=""></div>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <el-row style="padding-left: 40px;">
        <div :data-id="val.id" @click="pass($event)" class="el-button el-button--success">通过</div>
        <div :data-id="val.id" @click="bohui($event)" class="el-button el-button--danger">驳回</div>
      </el-row>
    </div>

    <div class="reply">
      <div class="top"><span>文章留言({{msg.length}})</span></div>
      <ul>
        <li v-for="(item,index) in msg" :key="index">
          <div class="img_box">
            <img :src="item.user.imgUrl" alt="">
          </div>
          <div class="info_box">
            <div class="info_box_top">{{item.user.nickname}} {{item.created_at}}</div>
            <div class="info_box_bottom">{{item.content}}</div>
          </div>
          <div class="btn">
            <el-button plain style="position:relative;width:70px;height:40px;line-height:0;top:2px;"><div @click="replayMsg($event)" :data-commentId="item.id" :data-reUserId="item.user.userId" :data-reNickname="item.user.nickname" style="position:absolute;left:0;top:0;width:70px;height:40px;line-height:40px;">回复</div></el-button>
            <el-button type="danger" plain @click="deleteMsg(item.id)">删除</el-button>
          </div>
          <div style="clear:both;"></div>
          <div class="" v-if="item.reply.length">
            <div class="huifu" v-for="(val,i) in item.reply">{{val.nickname}}: {{val.content}} <span class="el-tag el-tag--danger" style="cursor:pointer;" :data-Id="val.id" @click="delReply($event)">删除</span></div>
          </div>
        </li>
      </ul>
    </div>
    <!-- 删除评论 -->
    <el-dialog
      title="提示"
      :visible.sync="dialogVisibles"
      width="30%"
      :before-close="handleClose">
      <span>确定删除</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisibles = false">取 消</el-button>
        <el-button type="primary" @click="deleteMsgSure">确 定</el-button>
      </span>
    </el-dialog>
    <!-- 删除回复 -->
    <el-dialog
      title="提示"
      :visible.sync="replyHandle"
      width="30%">
      <span>确定删除</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="replyHandle = false">取 消</el-button>
        <el-button type="primary" @click="deleteRelySure">确 定</el-button>
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
    <el-dialog
      title="提示"
      :visible.sync="dialogVisible"
      width="30%"
      :before-close="handleClose">
      <span v-if='type == "audit"'>确定通过</span>
      <span v-if='type == "reject"'>确定驳回</span>
      <el-input
        type="textarea"
        :rows="2"
        placeholder="请输入内容"
        v-model="remark"
        style="margin-top:20px;"
        v-if='type == "reject"'>
      </el-input>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="dialogSure">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleShow,articleMsg,deleteMsg,addReply,audit,reject,deleteReply } from '../../../api/content';
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
      },
      id:'',
      type:'',
      dialogVisible: false,
      dialogVisibles: false,
      replyHandle: false,
      replyId:''
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
      this.$data.dialogVisibles = true;
    },
    deleteMsgSure(){
      this.$data.dialogVisibles = false;
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
    },
    pass(e) {
      this.$data.id = e.target.dataset.id;
      this.$data.dialogVisible = true;
      this.$data.type = 'audit';
      return;
    },
    bohui(e) {
      this.$data.id = e.target.dataset.id;
      this.$data.dialogVisible = true;
      this.$data.type = 'reject';
      return;
    },
    dialogSure() {
      this.$data.dialogVisible = false;
      if(this.$data.type == 'audit'){
        this.fetchAudit();
      }else if(this.$data.type == 'reject'){
        this.fetchReject();
      }
    },
    fetchAudit() {
      audit({
        id: this.$data.id
      }).then(res => {
        if(res.status == 200 && res.data){
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
        }
      })
    },
    fetchReject() {
      reject({
        id: this.$data.id,
        remark: this.$data.remark
      }).then(res => {
        if(res.status == 200 && res.data){
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
        }
      })
    },
    delReply(event) {
      console.log(event.target.dataset.id)
      this.$data.replyId = event.target.dataset.id;
      this.$data.replyHandle = true;
    },
    deleteRelySure() {
      this.$data.replyHandle = false;
      deleteReply({id:this.$data.replyId}).then(res => {
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
  /* editDetail_title */
  .editDetail_title {
    height: 70px;
    font-size: 30px;
    color: #000000;
    background: #fff;
    line-height: 70px;
    margin-top: 18px;
  }
  .editDetail_list {
    padding: 0 24px;
    padding-top: 30px;
    margin-bottom: 10px;
  }
  .editDetail_list .title {
    font-size: 26px;
    color: #000000;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
  }
  .editDetail_list .title img {
    width: 30px;
    margin-right: 12px;
  }
  .editDetail_list ul {
    margin-top: 20px;
  }
  .editDetail_list ul li {
    position: relative;
    width: 620px;
    background: #fff;
    padding-bottom: 30px;
    border-radius: 16px;
    background: #f2f3f7;
    list-style:none;
  }
  .editDetail_list ul li .content{
    padding: 0 35px;
    font-size: 28px;
    line-height: 40px;
    color: #000000;
    padding-top: 24px;
  }
  .editDetail_list ul li .content p {
    padding: 0;
    margin: 0;
  }
  .editDetail_list ul li .img_boxs {
    width: 550px;
    line-height: 550px;
    font-size: 0;
    margin: 0 auto;
    margin-top: 15px;
  }
  .editDetail_list ul li .img_boxs .img_box_list {
    width: 550px;
    height: 550px;
    line-height: 550px;
    border-radius: 16px;
    overflow: hidden;
  }
  .editDetail_list ul li .img_boxs .img_box_list img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
  }
  .editDetail_list ul li .img_boxs .img_box_list_two {
    width: 550px;
    margin: 0 auto;
    display: flex;
    display: -webkit-flex;
    align-items: center;
    -webkit-align-items: center;
    justify-content: space-between;
    -webkit-justify-content: space-between;
  }
  .editDetail_list ul li .img_boxs .img_box_list_two .one,.editDetail_list ul li .img_boxs .img_box_list_two .two {
    width: 270px;
    height: 270px;
    line-height: 270px;
    font-size: 0;
    border-radius: 8px;
    overflow: hidden;
  }
  .editDetail_list ul li .img_boxs .img_box_list_two img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three {
    width: 550px;
    margin: 0 auto;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three .one{
    float: left;
    width: 340px;
    height: 410px;
    line-height: 410px;
    font-size: 0;
    border-radius: 8px;
    overflow: hidden;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three .one img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three .img_box_list_three_right {
    float: right;
    width: 200px;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three .img_box_list_three_right .two,.editDetail_list ul li .img_boxs .img_box_list_three .img_box_list_three_right .three {
    width: 200px;
    height: 200px;
    line-height: 200px;
    font-size: 0;
    border-radius: 8px;
    overflow: hidden;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three .img_box_list_three_right img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
  }
  .editDetail_list ul li .img_boxs .img_box_list_three .img_box_list_three_right
   .three  {
    margin-top: 10px;
  }
  .el-button span {
    display: block;
    width: 100%;
    height: 100%;
  }
  .top_box {
    width: 100%;
    height:78px;
    isplay: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    margin-top: 16px;
  }
  .top_box .logo_box {
    width: 78px;
    height: 78px;
    text-align: center;
    line-height: 78px;
    font-size: 0;
    border-radius: 100%;
    overflow: hidden;
  }
  .top_box .logo_box img {
    display: inline-block;
    max-width: 100%;
    max-height: 100%;
  }
  .top_box .info_box {
    display: flex;
    display: -webkit-flex;
    align-items: flex-start;
    align-items: -webkit-flex-start;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-justify-content: center;
    flex-direction: column;
    -webkit-flex-direction: column;
    margin-left: 0.2rem;
  }
  .top_box .info_box .title {
    font-size: 30px;
    line-height: 40px;
  }
  .top_box .info_box .time {
    font-size: 24px;
    line-height: 30px;
    color: #777777;
    margin-top: 2px;
  }
  .detail.inner {
    width: 100%;
    line-height:48px;
    font-size: 32px;
    color: #000000;
    margin-top: 20px;
    text-align: justify;
  }
</style>
