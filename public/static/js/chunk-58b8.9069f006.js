(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-58b8"],{"1r/4":function(e,t,a){"use strict";a.r(t);var s=a("QbLZ"),l=a.n(s),r=a("X3IP"),n=a("L2JU"),o=a("Q2AE"),i={data:function(){return{listLoading:!0}},computed:l()({},Object(n.b)(["list","messages","errCode"])),created:function(){this.fetchData()},methods:{fetchData:function(){var e=this;this.$store.dispatch("getList",0).then(function(t){e.$data.listLoading=!1,"001"==e.errCode?o.a.dispatch("FedLogOut").then(function(){Object(r.Message)({message:e.messages,type:"error",duration:1e3}),e.$router.push("/")}):e.errCode&&Object(r.Message)({message:e.messages,type:"error",duration:1e3})})}}},u=(a("o+hF"),a("KHd+")),c=Object(u.a)(i,function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"app-container"},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],staticStyle:{width:"100%"},attrs:{data:e.list,border:""}},[a("el-table-column",{attrs:{prop:"id",label:"序号",sortable:""}}),e._v(" "),a("el-table-column",{attrs:{prop:"user.nickName",label:"微信昵称"}}),e._v(" "),a("el-table-column",{attrs:{prop:"user.nickName",label:"姓名"}}),e._v(" "),a("el-table-column",{attrs:{prop:"",label:"电话"}}),e._v(" "),a("el-table-column",{attrs:{prop:"user.created_at",label:"上传时间"}}),e._v(" "),a("el-table-column",{attrs:{prop:"user.auditTime",label:"审核时间"}}),e._v(" "),a("el-table-column",{attrs:{prop:"",label:"驳回原因 "},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tag",{attrs:{type:"success"}},[e._v("查看原因")])]}}])}),e._v(" "),a("el-table-column",{attrs:{prop:"",label:"操作"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tag",{attrs:{type:"danger"}},[e._v("重新审核")])]}}])}),e._v(" "),a("el-table-column",{attrs:{prop:"",label:"查看文章"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tag",{attrs:{type:"info"}},[e._v("查看")])]}}])})],1)],1)},[],!1,null,"65a38954",null);c.options.__file="index.vue";t.default=c.exports},cxr0:function(e,t,a){},"o+hF":function(e,t,a){"use strict";var s=a("cxr0");a.n(s).a}}]);