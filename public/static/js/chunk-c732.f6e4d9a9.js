(window.webpackJsonp=window.webpackJsonp||[]).push([["chunk-c732"],{QiSC:function(e,t,a){"use strict";a.r(t);var n=a("lT11"),i=(a("GDbe"),a("mcph"),a("n3UK"),a("X3IP")),s=a("slJZ"),r=a("cJtM"),o=[["bold","italic","underline","strike"],["blockquote","code-block"],[{header:1},{header:2}],[{list:"ordered"},{list:"bullet"}],[{script:"sub"},{script:"super"}],[{indent:"-1"},{indent:"+1"}],[{direction:"rtl"}],[{size:["small",!1,"large","huge"]}],[{header:[1,2,3,4,5,6,!1]}],[{color:[]},{background:[]}],[{font:[]}],[{align:[]}],["link","image","video"],["clean"]],c={components:{quillEditor:n.quillEditor},data:function(){return{content:"",image:"",editorOption:{modules:{toolbar:{container:o,handlers:{image:function(e){e?document.querySelector("#quill-upload").click():this.quill.format("image",!1)}}}}}}},created:function(){this.getRulers()},methods:{getRulers:function(){var e=this;Object(s.a)({id:1}).then(function(t){200==t.status&&t.data&&(t.data.status?e.$data.content=t.data.result.content:Object(i.Message)({message:t.data.errMessage,type:"error",duration:1e3}))})},save:function(){Object(s.b)({id:1,content:this.$data.content}).then(function(e){e.data.status?Object(i.Message)({message:e.data.result,type:"success",duration:1e3}):Object(i.Message)({message:e.data.errMessage,type:"error",duration:1e3})})},fileChange:function(e){var t=this,a=e.target.files[0];if(!/image\/jpeg|image\/png|image\/jpg/.test(a.type))return Object(i.Message)({message:"不支持的图片格式",type:"error",duration:1e3}),void(this.$refs.file.value="");if(a.size/1024>2048)return Object(i.Message)({message:"图片过大不支持上传",type:"error",duration:1e3}),void(this.$refs.file.value="");this.$data.fullscreenLoading=!0;var n=new FormData;n.append("files[]",a),Object(r.e)(n).then(function(e){t.$data.fullscreenLoading=!1,200==e.status&&e.data&&(e.data.status?(t.image=e.data.result,t.$data.content+="<img src=/storage/"+t.image+"/>"):Object(i.Message)({message:e.data.errMessage,type:"error",duration:1e3}))})}}},l=(a("a+Xr"),a("KHd+")),u=Object(l.a)(c,function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"app-container"},[a("quill-editor",{ref:"myQuillEditor",staticClass:"editer",attrs:{options:e.editorOption,autofocus:""},on:{change:function(t){e.onEditorChange(t)}},model:{value:e.content,callback:function(t){e.content=t},expression:"content"}}),e._v(" "),a("div",[a("input",{ref:"file",staticStyle:{display:"none"},attrs:{type:"file",id:"quill-upload",name:"",value:""},on:{change:function(t){e.fileChange(t)}}})]),e._v(" "),a("el-button",{staticStyle:{"margin-top":"60px"},attrs:{type:"primary"},on:{click:e.save}},[e._v("保存")])],1)},[],!1,null,"dabd9fc8",null);u.options.__file="index.vue";t.default=u.exports},"a+Xr":function(e,t,a){"use strict";var n=a("s0fJ");a.n(n).a},s0fJ:function(e,t,a){}}]);