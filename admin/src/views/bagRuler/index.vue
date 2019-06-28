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
        end-placeholder="结束日期"
        style="margin-right:20px;">
      </el-date-picker>
      <el-select v-model="status" placeholder="请选择">
        <el-option
          v-for="item in options"
          :key="item.value"
          :label="item.label"
          :value="item.value">
        </el-option>
      </el-select>
      <el-button type="primary" style="margin-left:20px;" @click="selectList" class="point">筛选</el-button>
    </div>
    <el-table v-loading="listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="id" label="序号" sortable></el-table-column>
      <el-table-column prop="user.nickName" label="微信昵称"></el-table-column>
      <el-table-column prop="user.name" label="姓名"></el-table-column>
      <el-table-column prop="mobile" label="电话"></el-table-column>
      <el-table-column prop="user.created_at" label="上传时间" width="180"></el-table-column>
      <el-table-column prop="article.auditTime" label="审核时间"></el-table-column>
      <el-table-column prop="price" label="金额"></el-table-column>
      <el-table-column prop="" label="领取状态" width="90">
        <template slot-scope="scope">
          <div style="color:#909399;" v-if="scope.row.status">已领取</div>
          <div v-else style="color:#f56c6c;">未领取</div>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { moneyAllList } from '../../api/bagRuler'
export default {
  data() {
    return {
      listLoading:true,
      name:'',
      dateVal:'',
      list:'',
      options: [
        {
          value: '1',
          label: '已领取'
        },{
          value: '0',
          label: '未领取'
        }
      ],
      status:''
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      moneyAllList({
        nickName:'',
        status: '',
        sDate: '',
        eDate: ''
      }).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.$data.listLoading = false;
            this.$data.list = res.data.result;
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
      // if(!this.$data.name && !this.$data.dateVal){
      //   return;
      // }
      this.$data.listLoading = true;
      if(this.$data.dateVal){
        moneyAllList({
          nickName:this.$data.name,
          status: this.$data.status,
          sDate: this.$data.dateVal[0]?this.dateToString(this.$data.dateVal[0]):'',
          eDate: this.$data.dateVal[1]?this.dateToString(this.$data.dateVal[1]):''
        }).then(res => {
          if(res.data.status){
            this.$data.listLoading = false;
            this.$data.list = res.data.result;
          }else {
            Message({
              message: res.data.errMessage,
              type: 'error',
              duration: 1 * 1000
            })
          }
        })
      }else {
        moneyAllList({
          nickName:this.$data.name,
          status: this.$data.status,
          sDate: '',
          eDate: ''
        }).then(res => {
          if(res.data.status){
            this.$data.listLoading = false;
            this.$data.list = res.data.result;
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
}
</script>

<style lang="css" scoped>
.point {
  cursor: pointer;
}
</style>
