(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-063d"],{KHf9:function(t,e,a){"use strict";a.r(e);var i=a("X3IP"),s=a("t3Un"),l=a("vDqi"),r=a.n(l);var o={data:function(){return{list:"",listLoading:!0,dialogVisible:!1,fullscreenLoading:!1,form:{title:"",url:"",order:"",image:""},id:"",formLabelWidth:"80px",type:"add",deleteVisible:!1}},created:function(){this.getList()},methods:{addNewData:function(){this.$data.dialogVisible=!0,this.$data.type="add"},fileChange:function(t){var e=this,a=t.target.files[0];if(!/image\/jpeg|image\/png|image\/jpg/.test(a.type))return Object(i.Message)({message:"不支持的图片格式",type:"error",duration:1e3}),void(this.$refs.file.value="");if(a.size/1024>2048)return Object(i.Message)({message:"图片过大不支持上传",type:"error",duration:1e3}),void(this.$refs.file.value="");this.$data.fullscreenLoading=!0;var s=new FormData;s.append("files[]",a),function(t){return r.a.post("/api/uploadImage",t)}(s).then(function(t){e.$data.fullscreenLoading=!1,200==t.status&&t.data&&(t.data.status?e.form.image=t.data.result:Object(i.Message)({message:t.data.errMessage,type:"error",duration:1e3}))})},add:function(){var t=this;"add"==this.$data.type?function(t){return r.a.post("/api/admin/discovery/storeSlideShow",t)}({title:this.form.title,url:this.form.url,order:this.form.order,image:this.form.image}).then(function(e){t.$data.dialogVisible=!1,200==e.status&&e.data&&(e.data.status?(Object(i.Message)({message:e.data.result,type:"success",duration:1e3}),t.getList()):Object(i.Message)({message:e.data.errMessage,type:"error",duration:1e3}))}):"update"==this.$data.type&&function(t,e){return r.a.post("/api/admin/discovery/update/"+t,e)}(this.$data.id,this.$data.form).then(function(e){t.$data.dialogVisible=!1,200==e.status&&e.data&&(e.data.status?(Object(i.Message)({message:e.data.result,type:"success",duration:1e3}),t.getList()):Object(i.Message)({message:e.data.errMessage,type:"error",duration:1e3}))})},getList:function(){var t=this;(function(t){return Object(s.a)({url:"/api/admin/discovery/showList/"+t,method:"get"})})(1).then(function(e){e.status?(t.$data.list=e.result,t.$data.listLoading=!1):Object(i.Message)({message:e.errMessage,type:"error",duration:1e3})})},update:function(t){this.$data.form={title:t.title,url:t.url,order:t.order,image:t.image},this.$data.id=t.id,this.$data.type="update",this.$data.dialogVisible=!0},deleteData:function(t){this.$data.id=t,this.$data.deleteVisible=!0},deleteSure:function(){var t=this;this.$data.deleteVisible=!1,function(t){return r.a.post("/api/admin/discovery/destroy/"+t)}(this.$data.id).then(function(e){200==e.status&&e.data&&(e.data.status?(Object(i.Message)({message:e.data.result,type:"success",duration:1e3}),t.getList()):Object(i.Message)({message:e.data.errMessage,type:"error",duration:1e3}))})}}},n=(a("XJey"),a("KHd+")),d=Object(n.a)(o,function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"app-container"},[a("div",{staticClass:"filter-container"},[a("el-button",{attrs:{type:"primary"},on:{click:t.addNewData}},[t._v("新增")])],1),t._v(" "),a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],staticStyle:{width:"100%"},attrs:{data:t.list,border:""}},[a("el-table-column",{attrs:{prop:"image",label:"图片",sortable:""},scopedSlots:t._u([{key:"default",fn:function(t){return[a("div",{staticClass:"img_box"},[a("img",{attrs:{src:"/storage"+t.row.image,alt:""}})])]}}])}),t._v(" "),a("el-table-column",{attrs:{prop:"title",label:"标题"}}),t._v(" "),a("el-table-column",{attrs:{prop:"url",label:"链接"}}),t._v(" "),a("el-table-column",{attrs:{prop:"order",label:"排序"}}),t._v(" "),a("el-table-column",{attrs:{label:"操作"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){t.update(e.row)}}},[t._v("修改")]),t._v(" "),a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){t.deleteData(e.row.id)}}},[t._v("删除")])]}}])})],1),t._v(" "),a("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("el-form",{attrs:{model:t.form}},[a("el-form-item",{attrs:{label:"标题","label-width":t.formLabelWidth}},[a("el-input",{staticStyle:{width:"300px"},attrs:{"auto-complete":"off"},model:{value:t.form.title,callback:function(e){t.$set(t.form,"title",e)},expression:"form.title"}})],1),t._v(" "),a("el-form-item",{attrs:{label:"链接地址","label-width":t.formLabelWidth}},[a("el-input",{staticStyle:{width:"300px"},attrs:{"auto-complete":"off"},model:{value:t.form.url,callback:function(e){t.$set(t.form,"url",e)},expression:"form.url"}})],1),t._v(" "),a("el-form-item",{attrs:{label:"排序","label-width":t.formLabelWidth}},[a("el-input",{staticStyle:{width:"50px"},attrs:{"auto-complete":"off"},model:{value:t.form.order,callback:function(e){t.$set(t.form,"order",e)},expression:"form.order"}})],1),t._v(" "),a("el-form-item",{attrs:{label:"素材图片","label-width":t.formLabelWidth}},[a("div",{staticClass:"img_box"},[a("img",{attrs:{src:"/storage"+t.form.image,alt:""}})]),t._v(" "),a("input",{directives:[{name:"loading",rawName:"v-loading.fullscreen.lock",value:t.fullscreenLoading,expression:"fullscreenLoading",modifiers:{fullscreen:!0,lock:!0}}],ref:"file",attrs:{type:"file",id:"upload_file",multiple:""},on:{change:function(e){t.fileChange(e)}}})])],1),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:t.add}},[t._v("确 定")])],1)],1),t._v(" "),a("el-dialog",{attrs:{title:"提示",visible:t.deleteVisible,width:"30%"},on:{"update:visible":function(e){t.deleteVisible=e}}},[a("span",[t._v("确定删除")]),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.deleteVisible=!1}}},[t._v("取 消")]),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:t.deleteSure}},[t._v("确 定")])],1)])],1)},[],!1,null,null,null);d.options.__file="index.vue";e.default=d.exports},XJey:function(t,e,a){"use strict";var i=a("z/CX");a.n(i).a},"z/CX":function(t,e,a){}}]);