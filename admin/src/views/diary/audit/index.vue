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
      <el-button type="primary" style="margin-left:20px;" @click="selectList" class="point">筛选</el-button>
    </div>
    <el-table v-loading="listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="id" label="序号" sortable></el-table-column>
      <el-table-column prop="user.nickname" label="微信昵称"></el-table-column>
      <el-table-column prop="user.name" label="姓名"></el-table-column>
      <el-table-column prop="mobile" label="电话"></el-table-column>
      <el-table-column prop="" label="主治医生"></el-table-column>
      <el-table-column prop="user.created_at" label="上传时间" width="180"></el-table-column>
      <el-table-column prop="" label="查看文章" width="90">
        <template slot-scope="scope">
          <el-tag type="primary" class="point"><a :href="'/admin#/article/content?id='+scope.row.id">查看</a></el-tag>
        </template>
      </el-table-column>
      <el-table-column label="操作">
        <template slot-scope="scope">
          <el-tag type="success"><div @click="dialogShow(scope.row.id)" class="point">通过审核</div></el-tag>
          <el-tag type="warning"><div @click="rejectShow(scope.row.id)" class="point">驳回</div></el-tag>
        </template>
      </el-table-column>
    </el-table>
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
import { mapGetters } from 'vuex';
import store from '../../../store'
export default {
  data() {
    return {
      listLoading: true,
      name:'',
      dateVal:'',
      dialogVisible: false,
      id:'',
      type:'',
      remark:''
    }
  },
  computed: {
    ...mapGetters([
      'list',
      'messages',
      'errCode',
      'audit',
      'reject'
    ])
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData (){
      this.$store.dispatch('getList', {type:0,nickname:'',sDate: '',eDate: ''}).then(res => {
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
    },
    dialogShow(id) {
      this.$data.id = id;
      this.$data.dialogVisible = true;
      this.$data.type = 'audit';
    },
    dialogSure() {
      this.$data.dialogVisible = false;
      if(this.$data.type == 'audit'){
        this.fetchAudit();
      }else if(this.$data.type == 'reject'){
        this.fetchReject();
      }
    },
    // 通过审核
    fetchAudit() {
      var that = this;
      this.$store.dispatch('setAudit', this.$data.id).then(() => {
        Message({
          message: that.audit,
          type: 'success',
          duration: 1 * 1000
        })
        that.fetchData();
      })
    },
    selectList() {
      if(!this.$data.name && !this.$data.dateVal){
        return;
      }
      if(this.$data.dateVal){
        this.$store.dispatch('getList',{
          type:0,
          nickname:this.$data.name,
          sDate: this.$data.dateVal[0]?this.dateToString(this.$data.dateVal[0]):'',
          eDate: this.$data.dateVal[1]?this.dateToString(this.$data.dateVal[1]):''
        })
      }else {
        this.$store.dispatch('getList',{
          type:0,
          nickname:this.$data.name,
          sDate: '',
          eDate: ''
        })
      }
    },
    dateToString(date){
      var year = date.getFullYear();
      var month = date.getMonth() + 1;
      var day = date.getDate();
      return year+'-'+month+'-'+day
    },
    // 驳回
    rejectShow(id) {
      this.$data.id = id;
      this.$data.dialogVisible = true;
      this.$data.type = 'reject';
    },
    fetchReject(){
      var that = this;
      this.$store.dispatch('setReject', {
        id: this.$data.id,
        remark: this.$data.remark
      }).then(() => {
        Message({
          message: that.reject,
          type: 'success',
          duration: 1 * 1000
        })
        that.fetchData();
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
