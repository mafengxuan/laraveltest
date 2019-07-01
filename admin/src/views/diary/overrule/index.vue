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
      <el-table-column prop="id" label="序号" sortable></el-table-column>
      <el-table-column prop="user.nickname" label="微信昵称"></el-table-column>
      <el-table-column prop="user.name" label="姓名"></el-table-column>
      <el-table-column prop="user.mobile" label="电话"></el-table-column>
      <el-table-column prop="user.created_at" label="上传时间" width="180"></el-table-column>
      <el-table-column prop="article.auditTime" label="审核时间"></el-table-column>
      <el-table-column prop="" label="驳回原因" width="90">
        <template slot-scope="scope">
          <el-tag type="primary"><div @click="showOverrule(scope.row.remark)" class="point">查看原因</div></el-tag>
        </template>
      </el-table-column>
      <el-table-column label="操作">
        <template slot-scope="scope">
          <el-tag type="danger"><div class="point" @click="reAuditData(scope.row.id)">重新审核</div></el-tag>
        </template>
      </el-table-column>
      <el-table-column label="查看文章">
        <template slot-scope="scope">
          <el-tag type="success"><div class="point"><a :href="'/admin#/article/content?id='+scope.row.id">查看</a></div></el-tag>
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
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="dialogSure">确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      title="驳回原因"
      :visible.sync="overruleVisible"
      width="30%">
      <span>{{remark}}</span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { articleList,reAudit } from '../../../api/overrule';
export default {
  data() {
    return {
      listLoading: true,
      overruleVisible: false,
      remark:'',
      list:'',
      name:'',
      dateVal:''
    }
  },
  computed: {

  },
  created() {
    this.getList();
  },
  methods: {
    getList() {
      articleList({type:2,nickname:'',sDate: '',eDate: ''}).then(res => {
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
    selectList() {
      if(!this.$data.name && !this.$data.dateVal){
        return;
      }
      if(this.$data.dateVal){
        articleList({
          type:2,
          nickname:this.$data.name,
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
          type:2,
          nickname:this.$data.name,
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
    showOverrule(remark) {
      this.$data.overruleVisible = true;
      this.$data.remark = remark;
    },
    reAuditData(id) {
      reAudit({id:id}).then(res => {
        if(res.status == 200 && res.data){
          if(res.data.status){
            Message({
              message: res.data.result,
              type: 'success',
              duration: 1 * 1000
            })
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
