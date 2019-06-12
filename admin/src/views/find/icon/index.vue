<template lang="html">
  <div class="app-container">
    <div class="filter-container">
      <el-button type="primary" @click="addNewData">新增</el-button>
    </div>
    <el-table v-loading="listLoading" :data="list" border style="width: 100%">
      <el-table-column prop="image" label="图片" sortable>
        <template slot-scope="scope">
          <div class="img_box">
            <img :src="'/storage'+scope.row.image" alt="">
          </div>
        </template>
      </el-table-column>
      <el-table-column prop="title" label="标题"></el-table-column>
      <el-table-column prop="url" label="链接"></el-table-column>
      <el-table-column prop="order" label="排序"></el-table-column>
      <el-table-column label="操作">
        <template slot-scope="scope">
          <el-button type="text" size="small" @click="update(scope.row)">修改</el-button>
          <el-button type="text" size="small" @click="deleteData(scope.row.id)">删除</el-button>
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
          <el-input v-model="form.order" auto-complete="off" style="width:50px;"></el-input>
        </el-form-item>
        <el-form-item label="素材图片" :label-width="formLabelWidth">
          <div class="img_box">
            <img :src="'/storage'+form.image" alt="">
          </div>
          <input @change="fileChange($event)" type="file" id="upload_file" ref="file" v-loading.fullscreen.lock="fullscreenLoading" multiple/>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="add">确 定</el-button>
      </span>
    </el-dialog>

    <el-dialog
      title="提示"
      :visible.sync="deleteVisible"
      width="30%">
      <span>确定删除</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="deleteVisible = false">取 消</el-button>
        <el-button type="primary" @click="deleteSure">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
import { Message } from 'element-ui';
import { storeSlideIcon,uploadImage,showList,updateData,destory } from '../../../api/icon';
export default {
  data() {
    return {
      list:'',
      listLoading: true,
      dialogVisible: false,
      fullscreenLoading: false,
      form: {
        title:'',
        url:'',
        order:'',
        image:''
      },
      id:'',
      formLabelWidth:"80px",
      type: 'add',
      deleteVisible: false
    }
  },
  created() {
    this.getList();
  },
  methods: {
    addNewData() {
      this.$data.dialogVisible = true;
      this.$data.type = 'add';
    },
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
      this.$data.fullscreenLoading = true;
      var formData = new FormData();
      formData.append('files[]', files);
      uploadImage(formData).then(res => {
        this.$data.fullscreenLoading = false;
        if(res.status == 200 && res.data){
          if(res.data.status){
            this.form.image = res.data.result;
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
    add() {
      if(this.$data.type == 'add'){
        storeSlideIcon({
          title: this.form.title,
          url: this.form.url,
          order: this.form.order,
          image: this.form.image
        }).then(res => {
          this.$data.dialogVisible = false;
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
      }else if(this.$data.type == 'update'){
        updateData(this.$data.id,this.$data.form).then(res => {
          this.$data.dialogVisible = false;
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
    },
    getList() {
      showList(3).then(res => {
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
    update(data) {
      this.$data.form = {
        title: data.title,
        url: data.url,
        order:data.order,
        image: data.image
      };
      this.$data.id = data.id;
      // this.$refs.file.value = data.image;
      this.$data.type = 'update';
      this.$data.dialogVisible = true;
    },
    deleteData(id) {
      this.$data.id = id;
      this.$data.deleteVisible = true;
    },
    deleteSure() {
      this.$data.deleteVisible = false;
      destory(this.$data.id).then(res => {
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
<style>
  .filter-container {
    margin-bottom: 10px;
  }
  .img_box {
    width: 120px;
    height: 120px;
    font-size: 0;
    line-height: 120px;
    text-align: center;
    border: 1px solid #eee;
  }
  .img_box img {
    display: inline-block;
    max-width: 100%;
    max-height: 100%;
  }
</style>
