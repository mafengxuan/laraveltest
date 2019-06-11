<template lang="html">
  <div class="app-container">
    <el-table v-loading="!listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="id" label="序号" sortable></el-table-column>
      <el-table-column prop="startTime" label="微信昵称" sortable></el-table-column>
      <el-table-column prop="data[0].request-client-ip" label="姓名"></el-table-column>
      <el-table-column prop="data[0].request-method" label="电话"></el-table-column>
      <el-table-column prop="data[0].request-originalUrl" label="上传时间"></el-table-column>
      <el-table-column prop="data[0].request-query" label="审核时间"></el-table-column>
      <el-table-column prop="data[0].response-time" label="驳回原因 ">
        <el-tag type="success">查看原因</el-tag>
      </el-table-column>
      <el-table-column prop="data[0].user-agent" label="操作">
        <el-tag type="danger">重新审核</el-tag>
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
