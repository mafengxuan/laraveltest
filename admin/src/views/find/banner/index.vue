<template lang="html">
  <div class="app-container">
    <div class="filter-container">
      <el-button type="primary" @click="dialogVisible = true">新增</el-button>
    </div>
    <el-table v-loading="listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="image" label="图片" sortable>
        <template slot-scope="scope">
          <img :src="scope.row.image" alt="">
        </template>
      </el-table-column>
      <el-table-column prop="url" label="链接"></el-table-column>
      <el-table-column prop="order" label="排序"></el-table-column>
      <el-table-column label="操作">
        <template slot-scope="scope">
          <el-button type="text" size="small" @click="update(scope.row.id)">修改</el-button>
          <el-button type="text" size="small">删除</el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-dialog
      title="提示"
      :visible.sync="dialogVisible">
      <el-form :model="form">
        <el-form-item label="标题" :label-width="formLabelWidth">
          <el-input v-model="form.title" auto-complete="off" style="width:300px;"></el-input>
        </el-form-item>
        <el-form-item label="链接地址" :label-width="formLabelWidth">
          <el-input v-model="form.url" auto-complete="off" style="width:300px;"></el-input>
        </el-form-item>
        <el-form-item label="排序" :label-width="formLabelWidth">
          <el-input v-model="form.sort" auto-complete="off" style="width:50px;"></el-input>
        </el-form-item>
        <el-form-item label="素材图片" :label-width="formLabelWidth">
          <input @change="fileChange($event)" type="file" id="upload_file" ref="file" multiple/>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="add">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { storeSlideShow,showList } from '../../../api/banner';
export default {
  data() {
    return {
      list:'',
      listLoading: true,
      dialogVisible: false,
      form: {
        title:'',
        url:'',
        sort:'',
        img:''
      },
      formLabelWidth:"80px",
      id:''
    }
  },
  created() {
    this.getList();
  },
  methods: {
    fileChange(el) {
      var files = el.target.files[0];
      if(!/image\/jpeg|image\/png|image\/jpg/.test(files.type)){
        Message({
          message: '不支持的图片格式',
          type: 'error',
          duration: 1 * 1000
        })
        this.$refs.file.value = ''
        return;
      }
      if(files.size/1024 > 1024*2){
        Message({
          message: '图片过大不支持上传',
          type: 'error',
          duration: 1 * 1000
        })
        this.$refs.file.value = ''
        return;
      }
      var formData = new FormData();
      formData.append('files[]', files);
      this.form.img = formData;
      console.log(formData)
    },
    add() {
      storeSlideShow({
        title: this.form.title,
        url: this.form.url,
        order: this.form.sort,
        image: this.form.img
      }).then(res => {
        this.$data.dialogVisible = false;
        if(res.status){
          Message({
            message: res.result,
            type: 'success',
            duration: 1 * 1000
          })
          this.getList();
        }else {
          Message({
            message: res.errMessage,
            type: 'error',
            duration: 1 * 1000
          })
        }
      })
    },
    getList() {
      showList(1).then(res => {
        if(res.status){
          this.$data.list = res.result;
          this.$data.listLoading = false;
        }else {
          Message({
            message: res.errMessage,
            type: 'error',
            duration: 1 * 1000
          })
        }
      });
    },
    update(id) {
      this.$data.id = id;
    }
  }
}
</script>
<style>
  .filter-container {
    margin-bottom: 10px;
  }
</style>
