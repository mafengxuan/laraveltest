(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-1f96"],{"8mHd":function(t,e,a){"use strict";var s=a("ReCg");a.n(s).a},ReCg:function(t,e,a){},qVV7:function(t,e,a){"use strict";a.r(e);var s=a("X3IP"),i=a("vDqi"),r=a.n(i);var n={data:function(){return{data:"",msg:"",commentId:"",dialogVisible:!1,dialogreply:!1,remark:"",replay:{content:"",commentId:"",reUserId:"",reNickname:""}}},created:function(){this.getArticle()},methods:{getArticle:function(){var t=this;this.$route.query&&this.$route.query.id&&(function(t){return r.a.get("/api/admin/article/show/"+t.id)}({id:this.$route.query.id}).then(function(e){200==e.status&&e.data&&(e.data.status?t.$data.data=e.data.result:Object(s.Message)({message:e.data.errMessage,type:"error",duration:1e3}))}),function(t){return r.a.get("/api/admin/commentsList/"+t.id)}({id:this.$route.query.id}).then(function(e){e.data.status?t.$data.msg=e.data.result:Object(s.Message)({message:e.data.errMessage,type:"error",duration:1e3})}))},deleteMsg:function(t){this.$data.commentId=t,this.$data.dialogVisible=!0},deleteMsgSure:function(){var t=this;this.$data.dialogVisible=!1,function(t){return r.a.post("/api/admin/comment/"+t.id)}({id:this.$data.commentId}).then(function(e){e.data.status?(Object(s.Message)({message:e.data.result,type:"success",duration:1e3}),t.getArticle()):Object(s.Message)({message:e.data.errMessage,type:"error",duration:1e3})})},replayMsg:function(t){if(!t||!t.preventDefault)return window.event.returnValue=!1,!1;t.preventDefault(),this.$data.dialogreply=!0,console.log(t.target.dataset),this.$data.replay.commentId=t.target.dataset.commentid,this.$data.replay.reUserId=t.target.dataset.reuserid,this.$data.replay.reNickname=t.target.dataset.renickname},replayMsgSure:function(){var t=this;this.$data.remark?function(t){return r.a.post("/api/admin/addReply",t)}({content:this.$data.remark,commentId:this.$data.replay.commentId,reUserId:this.$data.replay.reUserId,reNickname:this.$data.replay.reNickname}).then(function(e){200==e.status&&e.data&&(e.data.status?(Object(s.Message)({message:e.data.result,type:"success",duration:1e3}),t.$data.dialogreply=!1,t.getArticle()):Object(s.Message)({message:e.data.errMessage,type:"error",duration:1e3}))}):Object(s.Message)({message:"请输入内容",type:"error",duration:1e3})},goBack:function(){this.$router.go(-1)}}},o=(a("8mHd"),a("KHd+")),l=Object(o.a)(n,function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"app-container"},[a("el-button",{staticStyle:{"margin-bottom":"20px"},attrs:{type:"primary"},on:{click:t.goBack}},[t._v("返回")]),t._v(" "),a("div",{staticClass:"content",domProps:{innerHTML:t._s(t.data.content)}}),t._v(" "),a("div",{staticClass:"reply"},[a("div",{staticClass:"top"},[a("span",[t._v("文章留言("+t._s(t.msg.length)+")")])]),t._v(" "),a("ul",t._l(t.msg,function(e,s){return a("li",{key:s},[a("div",{staticClass:"img_box"},[a("img",{attrs:{src:e.user.imgUrl,alt:""}})]),t._v(" "),a("div",{staticClass:"info_box"},[a("div",{staticClass:"info_box_top"},[t._v(t._s(e.user.nickname)+" "+t._s(e.created_at))]),t._v(" "),a("div",{staticClass:"info_box_bottom"},[t._v(t._s(e.content))])]),t._v(" "),a("div",{staticClass:"btn"},[a("el-button",{staticStyle:{position:"relative",width:"70px",height:"40px","line-height":"0",top:"2px"},attrs:{plain:""}},[a("div",{staticStyle:{position:"absolute",left:"0",width:"70px",height:"40px"},attrs:{"data-commentId":e.id,"data-reUserId":e.user.userId,"data-reNickname":e.user.nickname},on:{click:function(e){t.replayMsg(e)}}},[t._v("回复")])]),t._v(" "),a("el-button",{attrs:{type:"danger",plain:""},on:{click:function(a){t.deleteMsg(e.id)}}},[t._v("删除")])],1),t._v(" "),a("div",{staticStyle:{clear:"both"}}),t._v(" "),e.reply.length?a("div",{},t._l(e.reply,function(e,s){return a("div",{staticClass:"huifu"},[t._v(t._s(e.nickname)+": "+t._s(e.content))])})):t._e()])}))]),t._v(" "),a("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible,width:"30%","before-close":t.handleClose},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("span",[t._v("确定删除")]),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:t.deleteMsgSure}},[t._v("确 定")])],1)]),t._v(" "),a("el-dialog",{attrs:{title:"提示",visible:t.dialogreply,width:"30%","before-close":t.handleClose},on:{"update:visible":function(e){t.dialogreply=e}}},[a("el-input",{staticStyle:{"margin-top":"20px"},attrs:{placeholder:"请输入内容"},model:{value:t.remark,callback:function(e){t.remark=e},expression:"remark"}}),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogreply=!1}}},[t._v("取 消")]),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:t.replayMsgSure}},[t._v("确 定")])],1)],1)],1)},[],!1,null,"12d45e05",null);l.options.__file="index.vue";e.default=l.exports}}]);