(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-908a"],{"20Jq":function(t,e,a){},"RU/L":function(t,e,a){a("Rqdy");var s=a("WEpk").Object;t.exports=function(t,e,a){return s.defineProperty(t,e,a)}},Rqdy:function(t,e,a){var s=a("Y7ZC");s(s.S+s.F*!a("jmDH"),"Object",{defineProperty:a("2faE").f})},SEkw:function(t,e,a){t.exports={default:a("RU/L"),__esModule:!0}},UTZR:function(t,e,a){"use strict";var s=a("20Jq");a.n(s).a},YEIV:function(t,e,a){"use strict";e.__esModule=!0;var s=function(t){return t&&t.__esModule?t:{default:t}}(a("SEkw"));e.default=function(t,e,a){return e in t?(0,s.default)(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}},fBxe:function(t,e,a){t.exports=a.p+"static/img/time.1676cc2.png"},qVV7:function(t,e,a){"use strict";a.r(e);var s=a("YEIV"),i=a.n(s),r=a("X3IP"),n=a("vDqi"),o=a.n(n);var l={data:function(){return i()({data:"",msg:"",commentId:"",dialogVisible:!1,dialogreply:!1,remark:"",replay:{content:"",commentId:"",reUserId:"",reNickname:""},id:"",type:""},"dialogVisible",!1)},created:function(){this.getArticle()},methods:{getArticle:function(){var t=this;this.$route.query&&this.$route.query.id&&(function(t){return o.a.get("/api/admin/article/show/"+t.id)}({id:this.$route.query.id}).then(function(e){200==e.status&&e.data&&(e.data.status?t.$data.data=e.data.result:Object(r.Message)({message:e.data.errMessage,type:"error",duration:1e3}))}),function(t){return o.a.get("/api/admin/commentsList/"+t.id)}({id:this.$route.query.id}).then(function(e){e.data.status?t.$data.msg=e.data.result:Object(r.Message)({message:e.data.errMessage,type:"error",duration:1e3})}))},deleteMsg:function(t){this.$data.commentId=t,this.$data.dialogVisible=!0},deleteMsgSure:function(){var t=this;this.$data.dialogVisible=!1,function(t){return o.a.post("/api/admin/comment/"+t.id)}({id:this.$data.commentId}).then(function(e){e.data.status?(Object(r.Message)({message:e.data.result,type:"success",duration:1e3}),t.getArticle()):Object(r.Message)({message:e.data.errMessage,type:"error",duration:1e3})})},replayMsg:function(t){if(!t||!t.preventDefault)return window.event.returnValue=!1,!1;t.preventDefault(),this.$data.dialogreply=!0,console.log(t.target.dataset),this.$data.replay.commentId=t.target.dataset.commentid,this.$data.replay.reUserId=t.target.dataset.reuserid,this.$data.replay.reNickname=t.target.dataset.renickname},replayMsgSure:function(){var t=this;this.$data.remark?function(t){return o.a.post("/api/admin/addReply",t)}({content:this.$data.remark,commentId:this.$data.replay.commentId,reUserId:this.$data.replay.reUserId,reNickname:this.$data.replay.reNickname}).then(function(e){200==e.status&&e.data&&(e.data.status?(Object(r.Message)({message:e.data.result,type:"success",duration:1e3}),t.$data.dialogreply=!1,t.getArticle()):Object(r.Message)({message:e.data.errMessage,type:"error",duration:1e3}))}):Object(r.Message)({message:"请输入内容",type:"error",duration:1e3})},goBack:function(){this.$router.go(-1)},pass:function(t){this.$data.id=t.target.dataset.id,this.$data.dialogVisible=!0,this.$data.type="audit"},bohui:function(t){this.$data.id=t.target.dataset.id,this.$data.dialogVisible=!0,this.$data.type="reject"},dialogSure:function(){this.$data.dialogVisible=!1,"audit"==this.$data.type?this.fetchAudit():"reject"==this.$data.type&&this.fetchReject()},fetchAudit:function(){var t=this;(function(t){return o.a.post("/api/admin/detail/audit/"+t.id)})({id:this.$data.id}).then(function(e){200==e.status&&e.data&&(e.data.status?(Object(r.Message)({message:e.data.result,type:"success",duration:1e3}),t.getArticle()):Object(r.Message)({message:e.data.errMessage,type:"error",duration:1e3}))})},fetchReject:function(){var t=this;(function(t){return o.a.post("/api/admin/detail/reject/"+t.id,{remark:t.remark})})({id:this.$data.id,remark:this.$data.remark}).then(function(e){200==e.status&&e.data&&(e.data.status?(Object(r.Message)({message:e.data.result,type:"success",duration:1e3}),t.getArticle()):Object(r.Message)({message:e.data.errMessage,type:"error",duration:1e3}))})}}},d=(a("UTZR"),a("KHd+")),c=Object(d.a)(l,function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"app-container"},[s("el-button",{staticStyle:{"margin-bottom":"20px"},attrs:{type:"primary"},on:{click:t.goBack}},[t._v("返回")]),t._v(" "),s("div",{staticClass:"top_box"},[t.data.user?s("div",{staticClass:"logo_box"},[s("img",{attrs:{src:t.data.user.imgUrl,alt:""}})]):t._e(),t._v(" "),s("div",{staticClass:"info_box"},[t.data.user?s("div",{staticClass:"title"},[t._v(t._s(t.data.user.nickname))]):t._e(),t._v(" "),s("div",{staticClass:"time"},[t._v("更新时间："+t._s(t.data.updated_at))])])]),t._v(" "),t.data.user?s("div",{staticClass:"detail inner"},[t._v(t._s(t.data.user.content))]):t._e(),t._v(" "),s("div",{staticClass:"editDetail_title"},[t._v("矫正历程")]),t._v(" "),t._l(t.data.detail,function(e,i){return s("div",{key:i,staticClass:"editDetail_list"},[s("div",{staticClass:"title"},[s("img",{attrs:{src:a("fBxe"),alt:""}}),t._v(" "),s("span",[t._v(t._s(e.title)+" ")]),t._v(" "),1==e.status?s("el-tag",{attrs:{type:"success"}},[t._v("通过")]):t._e(),t._v(" "),2==e.status?s("el-tag",{attrs:{type:"danger"}},[t._v("驳回")]):t._e(),t._v(" "),3==e.status?s("el-tag",[t._v("待审核啊")]):t._e()],1),t._v(" "),s("ul",[s("li",[s("div",{staticClass:"content",domProps:{innerHTML:t._s(e.content)}}),t._v(" "),s("div",{staticClass:"img_boxs"},[1==e.image.length?s("div",{staticClass:"img_box_list"},[s("img",{attrs:{src:"/storage/"+e.image[0],alt:""}})]):t._e(),t._v(" "),2==e.image.length?s("div",{staticClass:"img_box_list_two"},[s("div",{staticClass:"one"},[s("img",{attrs:{src:"/storage/"+e.image[0],alt:""}})]),t._v(" "),s("div",{staticClass:"two"},[s("img",{attrs:{src:"/storage/"+e.image[1],alt:""}})])]):t._e(),t._v(" "),3==e.image.length?s("div",{staticClass:"img_box_list_three clearfix"},[s("div",{staticClass:"one"},[s("img",{attrs:{src:"/storage/"+e.image[0],alt:""}})]),t._v(" "),s("div",{staticClass:"img_box_list_three_right"},[s("div",{staticClass:"two"},[s("img",{attrs:{src:"/storage/"+e.image[1],alt:""}})]),t._v(" "),s("div",{staticClass:"three"},[s("img",{attrs:{src:"/storage/"+e.image[2],alt:""}})])])]):t._e()])])]),t._v(" "),s("el-row",{staticStyle:{"padding-left":"40px"}},[s("div",{staticClass:"el-button el-button--success",attrs:{"data-id":e.id},on:{click:function(e){t.pass(e)}}},[t._v("通过")]),t._v(" "),s("div",{staticClass:"el-button el-button--danger",attrs:{"data-id":e.id},on:{click:function(e){t.bohui(e)}}},[t._v("驳回")])])],1)}),t._v(" "),s("div",{staticClass:"reply"},[s("div",{staticClass:"top"},[s("span",[t._v("文章留言("+t._s(t.msg.length)+")")])]),t._v(" "),s("ul",t._l(t.msg,function(e,a){return s("li",{key:a},[s("div",{staticClass:"img_box"},[s("img",{attrs:{src:e.user.imgUrl,alt:""}})]),t._v(" "),s("div",{staticClass:"info_box"},[s("div",{staticClass:"info_box_top"},[t._v(t._s(e.user.nickname)+" "+t._s(e.created_at))]),t._v(" "),s("div",{staticClass:"info_box_bottom"},[t._v(t._s(e.content))])]),t._v(" "),s("div",{staticClass:"btn"},[s("el-button",{staticStyle:{position:"relative",width:"70px",height:"40px","line-height":"0",top:"2px"},attrs:{plain:""}},[s("div",{staticStyle:{position:"absolute",left:"0",top:"0",width:"70px",height:"40px","line-height":"40px"},attrs:{"data-commentId":e.id,"data-reUserId":e.user.userId,"data-reNickname":e.user.nickname},on:{click:function(e){t.replayMsg(e)}}},[t._v("回复")])]),t._v(" "),s("el-button",{attrs:{type:"danger",plain:""},on:{click:function(a){t.deleteMsg(e.id)}}},[t._v("删除")])],1),t._v(" "),s("div",{staticStyle:{clear:"both"}}),t._v(" "),e.reply.length?s("div",{},t._l(e.reply,function(e,a){return s("div",{staticClass:"huifu"},[t._v(t._s(e.nickname)+": "+t._s(e.content))])})):t._e()])}))]),t._v(" "),s("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible,width:"30%","before-close":t.handleClose},on:{"update:visible":function(e){t.dialogVisible=e}}},[s("span",[t._v("确定删除")]),t._v(" "),s("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[s("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),s("el-button",{attrs:{type:"primary"},on:{click:t.deleteMsgSure}},[t._v("确 定")])],1)]),t._v(" "),s("el-dialog",{attrs:{title:"提示",visible:t.dialogreply,width:"30%","before-close":t.handleClose},on:{"update:visible":function(e){t.dialogreply=e}}},[s("el-input",{staticStyle:{"margin-top":"20px"},attrs:{placeholder:"请输入内容"},model:{value:t.remark,callback:function(e){t.remark=e},expression:"remark"}}),t._v(" "),s("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[s("el-button",{on:{click:function(e){t.dialogreply=!1}}},[t._v("取 消")]),t._v(" "),s("el-button",{attrs:{type:"primary"},on:{click:t.replayMsgSure}},[t._v("确 定")])],1)],1),t._v(" "),s("el-dialog",{attrs:{title:"提示",visible:t.dialogVisible,width:"30%","before-close":t.handleClose},on:{"update:visible":function(e){t.dialogVisible=e}}},["audit"==t.type?s("span",[t._v("确定通过")]):t._e(),t._v(" "),"reject"==t.type?s("span",[t._v("确定驳回")]):t._e(),t._v(" "),"reject"==t.type?s("el-input",{staticStyle:{"margin-top":"20px"},attrs:{type:"textarea",rows:2,placeholder:"请输入内容"},model:{value:t.remark,callback:function(e){t.remark=e},expression:"remark"}}):t._e(),t._v(" "),s("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[s("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),s("el-button",{attrs:{type:"primary"},on:{click:t.dialogSure}},[t._v("确 定")])],1)],1)],2)},[],!1,null,"c45562d6",null);c.options.__file="index.vue";e.default=c.exports}}]);