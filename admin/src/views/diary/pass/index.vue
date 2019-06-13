<template lang="html">
  <div class="app-container">
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
      <el-table-column prop="" label="审核时间"></el-table-column>
      <el-table-column prop="" label="阅读量" sortable></el-table-column>
      <el-table-column prop="forwardNum" label="转发" sortable></el-table-column>
      <el-table-column prop="commentsNum" label="评论" sortable></el-table-column>
      <el-table-column prop="praiseNum" label="赞" sortable></el-table-column>
      <el-table-column prop="" label="收藏" sortable></el-table-column>
      <el-table-column prop="" label="红包">
        <template slot-scope="scope">
          <el-button type="text" size="small" class="point">发红包</el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="红包记录"></el-table-column>
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
          <el-button type="text" size="small" class="point">查看</el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="加精">
        <template slot-scope="scope">
          <el-button type="text" size="small" class="point" v-if="!scope.row.isQuality" @click="qualityTo(scope.row)">加精</el-button>
          <el-button type="text" size="small" class="point" v-else @click="qualityTo(scope.row)">取消</el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleList,orderTop,quality,online } from '../../../api/pass';
export default {
  data() {
    return {
      listLoading: true,
      list:'',
      name:'',
      dateVal:''
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
      console.log(!data.online);
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
    }
  }
}
</script>

<style lang="css" scoped>
.point {
  cursor: pointer;
}
</style>
