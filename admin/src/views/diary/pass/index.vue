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
    <el-table v-loading="!listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="" label="序号"></el-table-column>
      <el-table-column prop="" label="微信昵称"></el-table-column>
      <el-table-column prop="" label="姓名"></el-table-column>
      <el-table-column prop="" label="电话"></el-table-column>
      <el-table-column prop="" label="审核时间"></el-table-column>
      <el-table-column prop="" label="阅读量" sortable></el-table-column>
      <el-table-column prop="" label="转发" sortable></el-table-column>
      <el-table-column prop="" label="评论" sortable></el-table-column>
      <el-table-column prop="" label="赞" sortable></el-table-column>
      <el-table-column prop="" label="收藏" sortable></el-table-column>
      <el-table-column prop="" label="红包">
        <template slot-scope="scope">
          <el-button type="text" size="small">发红包</el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="红包记录"></el-table-column>
      <el-table-column prop="" label="排序"></el-table-column>
      <el-table-column prop="" label="下线"></el-table-column>
      <el-table-column prop="" label="查看文章">
        <template slot-scope="scope">
          <el-button type="text" size="small">查看</el-button>
        </template>
      </el-table-column>
      <el-table-column prop="" label="加精">
        <template slot-scope="scope">
          <el-button type="text" size="small">取消</el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listLoading: true,
      list:''
    }
  }
}
</script>

<style lang="css" scoped>
</style>
