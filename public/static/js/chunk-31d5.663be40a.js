(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-31d5"],{"1r/4":function(t,e,a){"use strict";a.r(e);var l=a("QbLZ"),s=a.n(l),r=a("X3IP"),n=a("L2JU"),o=a("Q2AE"),i={data:function(){return{listLoading:!0}},computed:s()({},Object(n.b)(["list","messages","errCode"])),created:function(){this.fetchData()},methods:{fetchData:function(){var t=this;this.$store.dispatch("getList",0).then(function(e){t.$data.listLoading=!1,"001"==t.errCode?o.a.dispatch("FedLogOut").then(function(){Object(r.Message)({message:t.messages,type:"error",duration:1e3}),t.$router.push("/")}):Object(r.Message)({message:t.messages,type:"error",duration:1e3})})}}},c=(a("q/wd"),a("KHd+")),p=Object(c.a)(i,function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"app-container"},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],staticStyle:{width:"100%"},attrs:{data:t.list,border:""}},[a("el-table-column",{attrs:{prop:"id",label:"序号",sortable:""}}),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"微信昵称"}}),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"姓名"}}),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"电话"}}),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"上传时间"}}),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"审核时间"}}),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"驳回原因 "}},[a("el-tag",{attrs:{type:"success"}},[t._v("查看原因")])],1),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"操作"}},[a("el-tag",{attrs:{type:"danger"}},[t._v("重新审核")])],1),t._v(" "),a("el-table-column",{attrs:{prop:"",label:"查看文章"}},[a("el-tag",{attrs:{type:"info"}},[t._v("查看")])],1)],1)],1)},[],!1,null,"2d28c32a",null);p.options.__file="index.vue";e.default=p.exports},YR6H:function(t,e,a){},"q/wd":function(t,e,a){"use strict";var l=a("YR6H");a.n(l).a}}]);