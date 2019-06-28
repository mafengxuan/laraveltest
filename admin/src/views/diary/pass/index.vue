<template lang="html">
  <div class="app-container redBag_app">
    <div class="block" style="margin-bottom:20px;">
      <div class="el-input" style="float:left;width:180px;margin-right:20px;">
        <el-input v-model="name" placeholder="微信昵称"></el-input>
      </div>
      <el-date-picker
        v-model="dateVal"
        type="daterange"
        range-separator="至"
        start-placeholder="开始日期"
        end-placeholder="结束日期">
      </el-date-picker>
      <el-button type="primary" style="margin-left:20px;" @click="selectList">筛选</el-button>
    </div>
    <el-table v-loading="listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="id" label="序号"></el-table-column>
      <el-table-column prop="nickName" label="微信昵称"></el-table-column>
      <el-table-column prop="name" label="姓名"></el-table-column>
      <el-table-column prop="mobile" label="电话"></el-table-column>
      <el-table-column prop="auditTime" label="审核时间" width='160'></el-table-column>
      <el-table-column prop="viewNum" label="阅读量"></el-table-column>
      <el-table-column prop="forwardNum" label="转发" sortable></el-table-column>
      <el-table-column prop="commentsNum" label="评论" sortable></el-table-column>
      <el-table-column prop="praiseNum" label="赞" sortable></el-table-column>
      <el-table-column prop="" label="收藏" sortable></el-table-column>
      <el-table-column prop="" label="红包">
        <template slot-scope="scope">
          <el-button type="text" size="small" class="point" @click="senRedBagShow(scope.row)">发红包</el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="红包记录">
        <template slot-scope="scope">
          <div class="" style="text-align:center;cursor:pointer;" @click="showRedBagLog(scope.row)">
            <img src="../../../images/redbag.png" style="width:14px;display:inlin-block;" alt="">
          </div>
        </template>
      </el-table-column>
      <el-table-column prop="" label="排序" width="90">
        <template slot-scope="scope">
          <el-input :ref="'inputNum'+scope.row.id" :id="'inputNum'+scope.row.id" placeholder="" style="width:40px;float:left;"></el-input>
          <i class="el-icon-upload2 point" style="float:left;font-size:20px;margin-top: 10px;margin-left: 4px;" @click="orderTopTo(scope.row)"></i>
        </template>
      </el-table-column>
      <el-table-column prop="" label="下线">
        <template slot-scope="scope">
          <el-button type="text" size="small" class="point" v-if="!scope.row.isOnline" @click="onlineTo(scope.row)">上线</el-button>
          <el-button type="text" size="small" class="point" v-else @click="onlineTo(scope.row)">下线</el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="查看文章">
        <template slot-scope="scope">
          <el-button type="text" size="small" class="point"><a :href="'/admin#/article/content?id='+scope.row.id">查看</a></el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="加精">
        <template slot-scope="scope">
           <el-button class="point" type="primary" plain v-if="!scope.row.isQuality" @click="qualityTo(scope.row)">加精</el-button>
           <el-button class="point" type="primary" plain v-else @click="qualityTo(scope.row)">取消</el-button>
          <!-- <el-button type="text" size="small" class="point" v-if="!scope.row.isQuality" @click="qualityTo(scope.row)">加精</el-button>
          <el-button type="text" size="small" class="point" v-else @click="qualityTo(scope.row)">取消</el-button> -->
        </template>
      </el-table-column>
    </el-table>
    <el-dialog
      title="确定下线？"
      :visible.sync="dialogVisible"
      width="30%"
      :before-close="handleClose">
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="dialogSure">确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      title="红包记录"
      :visible.sync="redbagDialog"
      width="30%"
      :before-close="handleClose">
      <ul class="redBag_bx" style="padding:0;">
        <li> <span>时间</span> <span>金额</span> <span>状态</span> </li>
        <li v-for="(item,index) in redBagList" :key="index"> <span>{{item.created_at.split(' ')[0]}}</span> <span style="color:#ff0000;">{{item.price}}元</span> <span>{{item.status?'已领取':'未领取'}}</span> </li>
      </ul>
      <span slot="footer" class="dialog-footer">
        <el-button @click="redbagDialog = false">取 消</el-button>
        <el-button type="primary" >确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      title="发红包"
      :visible.sync="senRedBag"
      width="30%"
      :before-close="handleClose">
      <el-input
        placeholder="请输入红包金额"
        v-model="money"
        style="margin-top:20px;">
      </el-input>
      <span slot="footer" class="dialog-footer">
        <el-button @click="senRedBag = false">取 消</el-button>
        <el-button type="primary" @click="senRedBagTo">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleList,orderTop,quality,online,sendRedBag,getRedBagList } from '../../../api/pass';
export default {
  data() {
    return {
      listLoading: true,
      list:'',
      name:'',
      dateVal:'',
      dialogVisible: false,
      redbagDialog: false,
      senRedBag: false,
      redBagList:'',
      money:'',
      sendData: {
        articleId:'',
        userId:'',
        price:'',
        prevent: true
      }
    }
  },
  created() {
    this.getList();
  },
  methods: {
    getList() {
      articleList({type:1,nickName:'',sDate: '',eDate: ''}).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.list = res.data.result;
            this.$data.listLoading = false;
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
    orderTopTo(data) {
      var order = this.$refs['inputNum'+data.id].$el.children[0].value;
      if(!order) {
        Message({
          message: '请输入序号',
          type: 'error',
          duration: 1 * 1000
        })
        return;
      }
      orderTop({
        id: data.id,
        order: order
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.list = '';
            this.$data.listLoading = true;
            this.getList();
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
    qualityTo(data) {
      quality({
        id:data.id,
        quality: !data.isQuality
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.list = '';
            this.$data.listLoading = true;
            this.getList();
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
    onlineTo(data) {
      // this.$data.dialogVisible = true;
      // console.log(!data.online);
      online({
        id:data.id,
        online: !data.isOnline
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.list = '';
            this.$data.listLoading = true;
            this.getList();
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
    selectList() {
      if(!this.$data.name && !this.$data.dateVal){
        return;
      }
      if(this.$data.dateVal){
        articleList({
          type:1,
          nickName:this.$data.name,
          sDate: this.$data.dateVal[0]?this.dateToString(this.$data.dateVal[0]):'',
          eDate: this.$data.dateVal[1]?this.dateToString(this.$data.dateVal[1]):''
        }).then(res => {
          if(res.status == 200 && res.data){
            if(res.data.status){
              this.$data.list = res.data.result;
              this.$data.listLoading = false;
            }else {
              Message({
                message: res.data.errMessage,
                type: 'error',
                duration: 1 * 1000
              })
            }
          }
        });
      }else {
        articleList({
          type:1,
          nickName:this.$data.name,
          sDate: '',
          eDate: ''
        }).then(res => {
          if(res.status == 200 && res.data){
            if(res.data.status){
              this.$data.list = res.data.result;
              this.$data.listLoading = false;
            }else {
              Message({
                message: res.data.errMessage,
                type: 'error',
                duration: 1 * 1000
              })
            }
          }
        });
      }
    },
    showRedBagLog(data){
      getRedBagList({id:data.id}).then(res => {
        this.$data.redbagDialog = true;
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.redBagList = res.data.result;
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
    senRedBagShow(data) {
      this.$data.senRedBag = true;
      this.$data.sendData.articleId = data.id;
      this.$data.sendData.userId = data.userId;
    },
    senRedBagTo() {
      if(!this.$data.money){
        Message({
          message: '请输入金额',
          type: 'error',
          duration: 1 * 1000
        })
        return;
      }
      if(!this.$data.sendData.prevent) {return;}
      this.$data.sendData.prevent = false;
      sendRedBag({
        articleId:this.$data.sendData.articleId,
        userId:this.$data.sendData.userId,
        price:this.$data.money
      }).then(res => {
        this.$data.senRedBag = false;
        if(res.status == 200 && res.data){
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
        }
        this.$data.sendData.prevent = true;
      })
    }
  }
}
</script>

<style lang="css" scoped>
.point {
  cursor: pointer;
}
.redBag_bx {
  width: 100%;
}
.redBag_bx ul {
  padding: 0;
  margin: 0;
}
.redBag_bx li {
  width: 100%;
  height: 36px;
  line-height: 36px;
  list-style-type:none;
}
.redBag_bx li:nth-child(1) {
  height: 40px;
  line-height: 40px;
  color: #000;
  background: #fafafa;
}
.redBag_bx li span {
  display: inline-block;
  width: 30%;
  text-align: center;
  font-size: 14px;
}
</style>
