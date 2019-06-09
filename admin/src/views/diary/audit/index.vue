<template lang="html">
  <div class="app-container">
    <div class="block" style="margin-bottom:20px;">
      <div class="el-input" style="float:left;width:180px;margin-right:20px;">
        <el-input v-model="input" placeholder="微信昵称"></el-input>
      </div>
      <el-date-picker
        v-model="value6"
        type="daterange"
        range-separator="至"
        start-placeholder="开始日期"
        end-placeholder="结束日期">
      </el-date-picker>
      <el-button type="primary" style="margin-left:20px;">筛选</el-button>
    </div>
    <el-table v-loading="listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="id" label="序号" sortable></el-table-column>
      <el-table-column prop="user.nickName" label="微信昵称"></el-table-column>
      <el-table-column prop="user.nickName" label="姓名"></el-table-column>
      <el-table-column prop="" label="电话"></el-table-column>
      <el-table-column prop="user.created_at" label="上传时间" width="180"></el-table-column>
      <el-table-column prop="" label="主治医生"></el-table-column>
      <el-table-column prop="" label="查看文章" width="90">
        <template slot-scope="scope">
          <el-tag type="primary">查看</el-tag>
        </template>
      </el-table-column>
      <el-table-column prop="" label="操作">
        <template slot-scope="scope">
          <el-tag type="success">通过审核</el-tag>
          <el-tag type="warning">驳回</el-tag>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { mapGetters } from 'vuex';
import store from '../../../store'
export default {
  data() {
    return {
      listLoading: true,
      input:''
    }
  },
  computed: {
    ...mapGetters([
      'list',
      'messages',
      'errCode'
    ])
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData (){
      this.$store.dispatch('getList', 0).then(res => {
        this.$data.listLoading = false;
        if(this.errCode == '001'){
          store.dispatch('FedLogOut').then(() => {
            Message({
              message: this.messages,
              type: 'error',
              duration: 1 * 1000
            })
            this.$router.push('/');
          })
        }else if(this.errCode){
          Message({
            message: this.messages,
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
</style>
