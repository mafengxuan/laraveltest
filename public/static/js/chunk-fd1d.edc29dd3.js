(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-fd1d"],{ITmv:function(t,s,i){},qOQc:function(t,s,i){"use strict";var a=i("ITmv");i.n(a).a},qVV7:function(t,s,i){"use strict";i.r(s);var a=i("X3IP"),e=i("vDqi"),n=i.n(e);var c={data:function(){return{data:""}},created:function(){this.getArticle()},methods:{getArticle:function(){var t=this;this.$route.query&&this.$route.query.id&&function(t){return n.a.get("/api/admin/article/show/"+t.id)}({id:this.$route.query.id}).then(function(s){200==s.status&&s.data&&(s.data.status?t.$data.data=s.data.result:Object(a.Message)({message:s.data.errMessage,type:"error",duration:1e3}))})}}},r=(i("qOQc"),i("KHd+")),o=Object(r.a)(c,function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{staticClass:"app-container"},[i("div",{staticClass:"content",domProps:{innerHTML:t._s(t.data.content)}}),t._v(" "),i("div",{staticClass:"reply"},[t._m(0),t._v(" "),i("ul",[i("li",[t._m(1),t._v(" "),t._m(2),t._v(" "),i("div",{staticClass:"btn"},[i("el-button",{attrs:{plain:""}},[t._v("回复")])],1),t._v(" "),i("div",{staticStyle:{clear:"both"}}),t._v(" "),i("div",{staticClass:"huifu"},[t._v("官方回复")])]),t._v(" "),i("li",[t._m(3),t._v(" "),t._m(4),t._v(" "),i("div",{staticClass:"btn"},[i("el-button",{attrs:{plain:""}},[t._v("回复")])],1),t._v(" "),i("div",{staticStyle:{clear:"both"}}),t._v(" "),i("div",{staticClass:"huifu"},[t._v("官方回复")])])])])])},[function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"top"},[s("span",[this._v("文章留言(1007)")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"img_box"},[s("img",{attrs:{src:"https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=949383615,3755507436&fm=58",alt:""}})])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"info_box"},[s("div",{staticClass:"info_box_top"},[this._v("名字")]),this._v(" "),s("div",{staticClass:"info_box_bottom"},[this._v("内容")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"img_box"},[s("img",{attrs:{src:"https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=949383615,3755507436&fm=58",alt:""}})])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"info_box"},[s("div",{staticClass:"info_box_top"},[this._v("名字")]),this._v(" "),s("div",{staticClass:"info_box_bottom"},[this._v("内容")])])}],!1,null,"88931a50",null);o.options.__file="index.vue";s.default=o.exports}}]);