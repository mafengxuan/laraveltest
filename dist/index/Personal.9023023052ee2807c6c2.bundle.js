webpackJsonp([2],{102:function(n,t){t.f={}.propertyIsEnumerable},128:function(n,t){t.f=Object.getOwnPropertySymbols},255:function(n,t,e){"use strict";t.__esModule=!0;var a=e(256),i=function(n){return n&&n.__esModule?n:{default:n}}(a);t.default=i.default||function(n){for(var t=1;t<arguments.length;t++){var e=arguments[t];for(var a in e)Object.prototype.hasOwnProperty.call(e,a)&&(n[a]=e[a])}return n}},256:function(n,t,e){n.exports={default:e(257),__esModule:!0}},257:function(n,t,e){e(258),n.exports=e(13).Object.assign},258:function(n,t,e){var a=e(30);a(a.S+a.F,"Object",{assign:e(259)})},259:function(n,t,e){"use strict";var a=e(75),i=e(128),o=e(102),s=e(105),r=e(104),l=Object.assign;n.exports=!l||e(48)(function(){var n={},t={},e=Symbol(),a="abcdefghijklmnopqrst";return n[e]=7,a.split("").forEach(function(n){t[n]=n}),7!=l({},n)[e]||Object.keys(l({},t)).join("")!=a})?function(n,t){for(var e=s(n),l=arguments.length,c=1,d=i.f,f=o.f;l>c;)for(var u,p=r(arguments[c++]),v=d?a(p).concat(d(p)):a(p),h=v.length,g=0;h>g;)f.call(p,u=v[g++])&&(e[u]=p[u]);return e}:l},549:function(n,t,e){"use strict";function a(n){l||e(627)}Object.defineProperty(t,"__esModule",{value:!0});var i=e(597),o=e.n(i);for(var s in i)"default"!==s&&function(n){e.d(t,n,function(){return i[n]})}(s);var r=e(629),l=!1,c=e(47),d=a,f=c(o.a,r.a,!1,d,null,null);f.options.__file="src/modules/index/containers/personal.vue",function(){var t=e(15);t.install(e(17),!1),t.compatible&&(n.hot.accept(),n.hot.data?t.reload("data-v-fb3c8c62",f.options):t.createRecord("data-v-fb3c8c62",f.options),n.hot.dispose(function(n){l=!0}))}(),t.default=f.exports},558:function(n,t,e){t=n.exports=e(253)(!1),t.push([n.i,".loader_box{\n    width: 1rem;\n    height: 1rem;\n    position: fixed;\n    /*left: 0;*/\n    /*bottom: 0;*/\n    /*top: 0;*/\n    /*right:0;*/\n    background: rgba(111, 111, 111, .2);\n    border-radius: 4px;\n    margin: 1rem auto;\n    padding: 0.25rem;\n    display: -webkit-box;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n}\n.wrap-loading{\n    position: fixed;\n    left: 0;\n    bottom: 0;\n    top: 0;\n    right:0;\n    display: -webkit-box;\n    display: -ms-flexbox;\n    display: flex;\n    -webkit-box-align: center;\n        -ms-flex-align: center;\n            align-items: center;\n    -webkit-box-pack: center;\n        -ms-flex-pack: center;\n            justify-content: center;\n    z-index: 100;\n}\n.loader_box .loader{\n    border-color: #fff transparent #fff transparent;\n    border-width: 2px;\n    border-style: solid;\n    border-radius: 0.4rem;\n    display: block;\n    height: 0.5rem;\n    width: 0.5rem;\n    -webkit-animation: loading 1.5s linear infinite;\n    animation: loading 1.5s linear infinite;\n}\n@-webkit-keyframes loading {\n    0% {\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(0deg) translateZ(0) ;\n    }\n    50% {\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(180deg) translateZ(0);\n    }\n    100%{\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(360deg) translateZ(0) ;\n    }\n}\n@keyframes loading {\n    0% {\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(0deg) translateZ(0) ;\n    }\n    50% {\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(180deg) translateZ(0);\n    }\n    100%{\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(360deg) translateZ(0) ;\n    }\n}\n@keyframes loading {\n    0% {\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(0deg) translateZ(0) ;\n    }\n    50% {\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(180deg) translateZ(0);\n    }\n    100%{\n        border-color: #fff transparent #fff transparent;\n        -webkit-transform: rotate(360deg) translateZ(0) ;\n    }\n}\n",""])},559:function(n,t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),e(562),t.default={name:"loading",props:{hide:{type:Boolean,default:!1}}}},560:function(n,t,e){"use strict";function a(n){return n&&n.__esModule?n:{default:n}}Object.defineProperty(t,"__esModule",{value:!0});var i=e(561);Object.defineProperty(t,"default",{enumerable:!0,get:function(){return a(i).default}})},561:function(n,t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=e(559),i=e.n(a);for(var o in a)"default"!==o&&function(n){e.d(t,n,function(){return a[n]})}(o);var s=e(563),r=!1,l=e(47),c=l(i.a,s.a,!1,null,null,null);c.options.__file="src/common/components/loading/src/loading.vue",function(){var t=e(15);t.install(e(17),!1),t.compatible&&(n.hot.accept(),n.hot.data?t.reload("data-v-ebab1940",c.options):t.createRecord("data-v-ebab1940",c.options),n.hot.dispose(function(n){r=!0}))}(),t.default=c.exports},562:function(n,t,e){var a=e(558);"string"==typeof a&&(a=[[n.i,a,""]]);var i={};i.transform=void 0;var o=e(254)(a,i);a.locals&&(n.exports=a.locals),a.locals||n.hot.accept(558,function(){var t=e(558);"string"==typeof t&&(t=[[n.i,t,""]]),o(t)}),n.hot.dispose(function(){o()})},563:function(n,t,e){"use strict";var a=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",{staticClass:"wrap-loading"},[e("div",{directives:[{name:"show",rawName:"v-show",value:!n.hide,expression:"!hide"}],staticClass:"loader_box"},[e("div",{staticClass:"loader"})])])},i=[];a._withStripped=!0;var o={render:a,staticRenderFns:i};t.a=o,n.hot.accept(),n.hot.data&&e(15).rerender("data-v-ebab1940",o)},564:function(n,t,e){function a(n){for(var t=0;t<n.length;t++){var e=n[t],a=d[e.id];if(a){a.refs++;for(var i=0;i<a.parts.length;i++)a.parts[i](e.parts[i]);for(;i<e.parts.length;i++)a.parts.push(o(e.parts[i]));a.parts.length>e.parts.length&&(a.parts.length=e.parts.length)}else{for(var s=[],i=0;i<e.parts.length;i++)s.push(o(e.parts[i]));d[e.id]={id:e.id,refs:1,parts:s}}}}function i(){var n=document.createElement("style");return n.type="text/css",f.appendChild(n),n}function o(n){var t,e,a=document.querySelector("style["+m+'~="'+n.id+'"]');if(a){if(v)return h;a.parentNode.removeChild(a)}if(b){var o=p++;a=u||(u=i()),t=s.bind(null,a,o,!1),e=s.bind(null,a,o,!0)}else a=i(),t=r.bind(null,a),e=function(){a.parentNode.removeChild(a)};return t(n),function(a){if(a){if(a.css===n.css&&a.media===n.media&&a.sourceMap===n.sourceMap)return;t(n=a)}else e()}}function s(n,t,e,a){var i=e?"":a.css;if(n.styleSheet)n.styleSheet.cssText=_(t,i);else{var o=document.createTextNode(i),s=n.childNodes;s[t]&&n.removeChild(s[t]),s.length?n.insertBefore(o,s[t]):n.appendChild(o)}}function r(n,t){var e=t.css,a=t.media,i=t.sourceMap;if(a&&n.setAttribute("media",a),g.ssrId&&n.setAttribute(m,t.id),i&&(e+="\n/*# sourceURL="+i.sources[0]+" */",e+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(i))))+" */"),n.styleSheet)n.styleSheet.cssText=e;else{for(;n.firstChild;)n.removeChild(n.firstChild);n.appendChild(document.createTextNode(e))}}var l="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!l)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var c=e(567),d={},f=l&&(document.head||document.getElementsByTagName("head")[0]),u=null,p=0,v=!1,h=function(){},g=null,m="data-vue-ssr-id",b="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());n.exports=function(n,t,e,i){v=e,g=i||{};var o=c(n,t);return a(o),function(t){for(var e=[],i=0;i<o.length;i++){var s=o[i],r=d[s.id];r.refs--,e.push(r)}t?(o=c(n,t),a(o)):o=[];for(var i=0;i<e.length;i++){var r=e[i];if(0===r.refs){for(var l=0;l<r.parts.length;l++)r.parts[l]();delete d[r.id]}}}};var _=function(){var n=[];return function(t,e){return n[t]=e,n.filter(Boolean).join("\n")}}()},566:function(n,t,e){n.exports=e.p+"img/right.png"},567:function(n,t){n.exports=function(n,t){for(var e=[],a={},i=0;i<t.length;i++){var o=t[i],s=o[0],r=o[1],l=o[2],c=o[3],d={id:n+":"+i,css:r,media:l,sourceMap:c};a[s]?a[s].parts.push(d):e.push(a[s]={id:s,parts:[d]})}return e}},574:function(n,t,e){t=n.exports=e(253)(!0),t.push([n.i,"\n.cube-select {\n  border:0;\n  padding: 0;\n}\n.cube-select:after {\n  border: 0;\n}\n.cube-select .cube-select-icon {\n  display: none;\n}\n.cube-picker-confirm {\n  color: #07bed1;\n}\n","",{version:3,sources:["/Users/lichenglong/Documents/GitHub/laraveltest/src/modules/index/containers/src/modules/index/containers/personal.vue"],names:[],mappings:";AA8UA;EACA,SAAA;EACA,WAAA;CACA;AACA;EACA,UAAA;CACA;AACA;EACA,cAAA;CACA;AACA;EACA,eAAA;CACA",file:"personal.vue",sourcesContent:['<template lang="html">\n  <div id="personal">\n    <div class="banner">\n      <div class="inner">\n        <div class="top_box">\n          <div class="logo_box">\n            <img :src="info.imgUrl" alt="">\n          </div>\n          <div class="info_box">\n            <div class="title">{{info.nickname}}</div>\n            <div class="time">更新时间：{{info.updated_at}}</div>\n          </div>\n        </div>\n        <div class="bottom_box">\n          <ul v-if="info">\n            <li>\n              <div v-if="!info.article" @click="checkStoreTo(\'push\')">\n                <div class="">发布</div>\n                <div class="">日记</div>\n              </div>\n              <div v-else @click="checkStoreTo">\n                <div class="">我的</div>\n                <div class="">日记</div>\n              </div>\n            </li>\n            <li>\n              <div class="">{{info.article && info.article.forwardNum ? info.article.forwardNum:\'0\'}}</div>\n              <div class="">转发</div>\n            </li>\n            <li>\n              <div class="">{{info.article && info.article.commentsNum ? info.article.commentsNum: \'0\'}}</div>\n              <div class="">评论</div>\n            </li>\n            <li>\n              <div class="">{{info.article && info.article.praiseNum ? info.article.praiseNum:\'0\'}}</div>\n              <div class="">获赞</div>\n            </li>\n            <li>\n              <router-link to="/?type=collect">\n                <div class="">收藏</div>\n                <div class="">日记</div>\n              </router-link>\n            </li>\n          </ul>\n        </div>\n      </div>\n      <img src="../images/personal/me.png" alt="">\n    </div>\n    <div class="personal_info">\n      <ul v-if="tags">\n        <li class="clearfix">\n          <div class="f_left">{{tags[0].label}}</div>\n          <div class="f_right">\n            <div class="con">\n              \x3c!-- <select  v-model="sex" style="border:0;outline: none;background:#fff;text-align:right;">\n                <option v-for="(val,key) in tags[0].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>\n              </select> --\x3e\n              <cube-select\n                v-model="sex"\n                :options="tagsArr[0]"\n                @change="save">\n              </cube-select>\n            </div>\n            <img src="../images/icon/right.png" alt="">\n          </div>\n        </li>\n        <li class="clearfix">\n          <div class="f_left">{{tags[1].label}}</div>\n          <div class="f_right">\n            <div class="con">\n              \x3c!-- <select  v-model="age" style="border:0;outline: none;background:#fff;text-align:right;">\n                <option v-for="(val,key) in tags[1].data" :key="key" :data-val="val.value" style="color:#666;margin: 0px" >{{val.value}}</option>\n              </select> --\x3e\n              <cube-select\n                v-model="age"\n                :options="tagsArr[1]"\n                @change="save">\n              </cube-select>\n            </div>\n            <img src="../images/icon/right.png" alt="">\n          </div>\n        </li>\n        <li class="clearfix">\n          <div class="f_left">{{tags[2].label}}</div>\n          <div class="f_right">\n            <div class="con">\n              \x3c!-- <select  v-model="correct_time" style="border:0;outline: none;background:#fff;text-align:right;">\n                <option v-for="(val,key) in tags[2].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>\n              </select> --\x3e\n              <cube-select\n                v-model="correct_time"\n                :options="tagsArr[2]"\n                @change="save">\n              </cube-select>\n            </div>\n            <img src="../images/icon/right.png" alt="">\n          </div>\n        </li>\n        <li class="clearfix">\n          <div class="f_left">{{tags[3].label}}</div>\n          <div class="f_right">\n            <div class="con">\n              \x3c!-- <select  v-model="tooth_socket" style="border:0;outline: none;background:#fff;text-align:right;">\n                <option v-for="(val,key) in tags[3].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>\n              </select> --\x3e\n              <cube-select\n                v-model="tooth_socket"\n                :options="tagsArr[3]"\n                @change="save">\n              </cube-select>\n            </div>\n            <img src="../images/icon/right.png" alt="">\n          </div>\n        </li>\n        <li class="clearfix">\n          <div class="f_left">{{tags[4].label}}</div>\n          <div class="f_right">\n            <div class="con">\n              \x3c!-- <select  v-model="tooth_question" style="border:0;outline: none;background:#fff;text-align:right;">\n                <option v-for="(val,key) in tags[4].data" :key="key" style="color:#666;margin: 0px" >{{val.value}}</option>\n              </select> --\x3e\n              \x3c!-- <cube-select\n                v-model="tooth_question"\n                :options="tagsArr[4]"\n                @change="save">\n              </cube-select> --\x3e\n              <div @click="showPopup(\'myPopup\')">\n                {{tooth_question?tooth_question:\'请选择\'}}\n              </div>\n            </div>\n            <img src="../images/icon/right.png" alt="">\n          </div>\n        </li>\n        <li class="clearfix">\n          <div class="f_left">日记简介</div>\n          <div class="f_right">\n            <textarea name="date" v-model="content" placeholder="16~48个字内" @change="contentChange" @blur="save(\'content\')"></textarea>\n            <img src="../images/icon/right.png" alt="">\n          </div>\n        </li>\n      </ul>\n    </div>\n\n    <cube-popup type="my-popup" ref="myPopup">\n      <div class="cube-dialog-main">\n          \x3c!-- <span class="cube-dialog-close">\n            <i class="cubeic-close"></i>\n          </span> --\x3e\n          <div class="cube-dialog-prompt">\n            <h2 class="cube-dialog-title"><p class="cube-dialog-title-def">请选择牙齿问题</p></h2>\n            <div class="cube-dialog-content">\n              <cube-checker\n                v-if="tagsArr[4]"\n                v-model="tooth_questionList"\n                :options="tagsArr[4]" />\n            </div>\n            <div class="cube-dialog-btns border-right-1px">\n              <a href="javascript:;" class="cube-dialog-btn border-top-1px" @click="hidePopup(\'myPopup\')">取消</a>\n              <a href="javascript:;" class="cube-dialog-btn border-top-1px cube-dialog-btn_highlight" @click="save">确定</a>\n            </div>\n          </div>\n      </div>\n    </cube-popup>\n\n    <div class="protocol_box" v-if="protocol">\n      <div class="content">\n        <div class="title">劲松口腔矫正日记协议</div>\n        <div class="inner">知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙…其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙…其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛...</div>\n        <div class="btn" @click="sureCheckStoreTo">确定 {{time}}S</div>\n      </div>\n    </div>\n\n    \x3c!-- <div class="save" @click="save">保存</div> --\x3e\n    <loading v-if=\'!info && !tags\'></loading>\n  </div>\n</template>\n\n<script>\nimport "../css/personal.css";\nimport loading from \'../../../common/components/loading\';\nimport { mapGetters, mapActions, mapMutations } from \'vuex\';\nimport { updateUserInfo,showTags,checkStore } from \'../api/personal\';\nimport toast from \'../../../common/components/toast\';\n\nexport default {\n  components: {\n    loading\n  },\n  data() {\n    return {\n      sex:\'\',\n      age:\'\',\n      correct_time:\'\',\n      tooth_socket:\'\',\n      tooth_question:\'\',\n      content:\'\',\n      tags:\'\',\n      tagsArr:"",\n      tooth_questionList:[],\n      protocol: false,\n      time:5,\n      t:\'\'\n    }\n  },\n  computed: {\n    ...mapGetters({\n      info:\'Personal/userInfo\'\n    })\n  },\n  methods: {\n    ...mapActions({\n      showTags: \'Home/showTags\'\n    }),\n    ...mapActions({\n      userInfo: \'Personal/userInfo\',\n    }),\n    initData() {\n      this.$data.sex = this.info.sex;\n      this.$data.age = this.info.age;\n      this.$data.correct_time = this.info.correct_time;\n      this.$data.tooth_socket = this.info.tooth_socket;\n      this.$data.tooth_question = this.info.tooth_question;\n      this.$data.content = this.info.content;\n    },\n    initTags(result) {\n      var tags = {};\n      for(var i=0;i<result.length;i++){\n        var data = [];\n        for(var j=0;j<result[i].data.length;j++){\n          if(result[i].key == "tooth_question"){\n            var ques = {\n              text: result[i].data[j].value,\n              value: result[i].data[j].value\n            }\n            data.push(ques);\n          }else {\n            data.push(result[i].data[j].value);\n          }\n        }\n        tags[i] = data;\n      }\n      this.$data.tagsArr = tags;\n    },\n    save(content) {\n      console.log(123)\n      if(content == \'content\'){\n        if(this.$data.content.length < 16){\n          toast(\'至少输入16个字\',{delay:1500});\n          return;\n        }\n      }\n      this.$data.tooth_question = this.$data.tooth_questionList.join(\',\');\n      updateUserInfo({\n        sex:this.$data.sex,\n        age:this.$data.age,\n        correct_time:this.$data.correct_time,\n        tooth_socket:this.$data.tooth_socket,\n        tooth_question:this.$data.tooth_question,\n        content: this.$data.content\n      }).then(res => {\n        this.$refs[\'myPopup\'].hide();\n        if(res.status == 200 && res.data){\n          if(res.data.status){\n            toast(res.data.result,{delay:1500});\n          }else {\n            toast(res.data.errMessage,{delay:1500});\n          }\n        }\n      })\n    },\n    contentChange(){\n      console.log(this.$data.content)\n      this.$data.content = this.$data.content.substr(0,48);\n    },\n    showPopup(refId) {\n      const component = this.$refs[refId]\n      component.show();\n    },\n    hidePopup(refId) {\n      const component = this.$refs[refId]\n      component.hide();\n    },\n    checkStoreTo(type) {\n      checkStore().then(res => {\n        if(res.status == 200 && res.data){\n          if(res.data.status){\n            if(type == \'push\'){\n              this.$data.protocol = true;\n              this.timer();\n              return;\n            }\n            this.$router.push(\'/editDetail\');\n          }else {\n            toast(res.data.errMessage,{delay:1500});\n          }\n        }\n      })\n    },\n    timer(){\n      var that = this;\n      this.$data.t = setInterval(function(){\n        if(that.$data.time <= 0) {\n          // that.$data.protocol = false;\n          // that.checkStoreTo();\n          clearInterval(that.$data.t);\n          return;\n        }\n        that.$data.time--;\n      },1000)\n    },\n    sureCheckStoreTo() {\n      clearInterval(this.$data.t);\n      this.checkStoreTo();\n    }\n  },\n  created() {\n    window.scrollTo(0,0);\n    this.userInfo().then(res => {\n      this.initData();\n    });\n    showTags().then(res => {\n      if(res.status == 200 && res.data){\n        if(res.data.status){\n          this.initTags(res.data.result);\n          this.$data.tags = res.data.result;\n        }else {\n          toast(res.data.errMessage,{delay:1500});\n        }\n      }\n    })\n  }\n}\n<\/script>\n<style>\n  .cube-select {\n    border:0;\n    padding: 0;\n  }\n  .cube-select:after {\n    border: 0;\n  }\n  .cube-select .cube-select-icon {\n    display: none;\n  }\n  .cube-picker-confirm {\n    color: #07bed1;\n  }\n</style>\n'],sourceRoot:""}])},575:function(n,t,e){t=n.exports=e(253)(!1),t.push([n.i,"#personal {\n  width: 100%\n}\n#personal .banner {\n  position: relative;\n  height: 2.4rem;\n  background: #07bed1\n}\n#personal .banner .inner {\n  position: absolute;\n  top: 0;\n  width: 100%;\n  height: 2.4rem\n}\n#personal .banner .inner .top_box {\n  padding: 0 0.52rem;\n  height: 0.78rem;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: start;\n      -ms-flex-pack: start;\n          justify-content: flex-start;\n  margin-top: 0.24rem\n}\n#personal .banner .inner .top_box .logo_box {\n  width: 0.8rem;\n  height: 0.8rem;\n  text-align: center;\n  line-height: 0.8rem;\n  font-size: 0;\n  border-radius: 100%;\n  overflow: hidden\n}\n#personal .banner .inner .top_box .logo_box img {\n  display: inline-block;\n  max-width: 100%;\n  max-height: 100%;\n}\n#personal .banner .inner .top_box .info_box {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: start;\n      -ms-flex-align: start;\n          align-items: flex-start;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  margin-left: 0.2rem\n}\n#personal .banner .inner .top_box .info_box .title {\n  font-size: 0.38rem;\n  line-height: 0.5rem;\n  color: #fff;\n}\n#personal .banner .inner .top_box .info_box .time {\n  font-size: 0.24rem;\n  line-height: 0.3rem;\n  color: #fff;\n  margin-top: 0.04rem;\n}\n#personal .banner .inner .bottom_box {\n  width: 7.02rem;\n  margin: 0 auto;\n  margin-top: 0.34rem;\n  font-size: 0.28rem;\n  color: #fff\n}\n#personal .banner .inner .bottom_box ul {\n  width: 100%;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center\n}\n#personal .banner .inner .bottom_box ul li {\n  -webkit-box-flex: 2;\n      -ms-flex: 2;\n          flex: 2;\n  text-align: center;\n  line-height: 0.4rem\n}\n#personal .banner .inner .bottom_box ul li a {\n  color: #fff;\n}\n#personal .banner img {\n  width: 100%;\n}\n#personal .personal_info {\n  width: 100%\n}\n#personal .personal_info ul {\n  width: 7.02rem;\n  margin: 0 auto\n}\n#personal .personal_info ul li {\n  width: 100%;\n  padding: 0.22rem 0;\n  background: #fff;\n  margin-top: 0.1rem;\n  border-bottom: 1px solid #e5e5e5\n}\n#personal .personal_info ul li .f_left {\n  float: left;\n  font-size: 0.3rem;\n  color: #2a2a2a;\n  margin-left: 0.5rem;\n  line-height: 0.4rem;\n}\n#personal .personal_info ul li .f_right {\n  width: 5rem;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  float: right;\n  font-size: 0.28rem;\n  color: #666666;\n  margin-right: 0.22rem;\n  line-height: 0.4rem\n}\n#personal .personal_info ul li .f_right .con {\n  width: 4.5rem;\n  text-align: right;\n}\n#personal .personal_info ul li .f_right img {\n  width: 0.14rem;\n  margin-left: 0.2rem;\n}\n#personal .personal_info ul li .f_right textarea {\n  width: 4.1rem;\n  height: 1.6rem;\n  color: #666666;\n  resize:none;\n  outline:none;\n  border: 0;\n}\n#personal .personal_info ul li .f_right {\n  textarea::-webkit-input-placeholder {\n            text-align: right;\n  }\n  /* 使用webkit内核的浏览器 */\n  textarea:-moz-placeholder {\n            text-align: right;\n  }\n  /* Firefox版本4-18 */\n  textarea::-moz-placeholder {\n            text-align: right;\n  }\n  /* Firefox版本19+ */\n  textarea:-ms-input-placeholder {\n            text-align: right;\n  }\n}\n#personal .save {\n  width: 1.48rem;\n  height: 0.5rem;\n  text-align: center;\n  line-height: 0.5rem;\n  background: #eeeeee;\n  font-size: 0.3rem;\n  color: #07bed1;\n  border-radius: 0.08rem;\n  margin: 0 auto;\n  margin-top: 0.2rem;\n}\n#personal .cube-dialog-main {\n  width: 5.6rem;\n}\n#personal .cube-checker {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: start;\n      -ms-flex-pack: start;\n          justify-content: flex-start;\n  -ms-flex-wrap: wrap;\n      flex-wrap: wrap;\n  padding: 0 0.20rem;\n}\n#personal .cube-checker-item {\n  border: 1px solid #eee;\n  margin-bottom: 0.10rem;\n}\n#personal .cube-checker-item_active {\n  color: #07bed1;\n  border: 1px solid #07bed1;\n  background: none;\n}\n#personal .cube-checker-item_active:after {\n  border: none;\n}\n#personal .cube-dialog-btn_highlight {\n  color: #07bed1;\n}\n#personal .protocol_box {\n  position: fixed;\n  top: 0;\n  width: 100%;\n  height: 100%;\n  background: rgba(0, 0, 0, .5);\n  z-index: 100\n}\n#personal .protocol_box .content {\n  text-align: center;\n  position: absolute;\n  left: 50%;\n  top: 50%;\n  width: 5.5rem;\n  -webkit-transform: translate(-50%,-50%);\n          transform: translate(-50%,-50%);\n  background: #fff;\n  border-radius: 0.16rem\n}\n#personal .protocol_box .content .title {\n  width: 100%;\n  font-size: 0.3rem;\n  color: #000000;\n  text-align: center;\n  line-height: 0.4rem;\n  margin-top: 0.38rem;\n  margin-bottom: 0.3rem;\n}\n#personal .protocol_box .content .inner {\n  padding: 0 0.6rem;\n  font-size: 0.24rem;\n  color: #000000;\n  line-height: 0.34rem;\n  text-align: left;\n}\n#personal .protocol_box .content .btn {\n  display: inline-block;\n  height: 0.6rem;\n  line-height: 0.6rem;\n  padding: 0 0.46rem;\n  font-size: 0.3rem;\n  color: #ffffff;\n  background: #ff0000;\n  border-radius: 0.08rem;\n  margin: 0.4rem 0;\n}\nselect {\n  -webkit-appearance:none;\n     -moz-appearance:none;\n          appearance:none;\n}\n",""])},576:function(n,t,e){"use strict";function a(n){return r.default.post("/api/index/userInfo/update",n)}function i(n){return r.default.get("/api/index/userInfo/showTags")}function o(){return r.default.get("/api/index/userInfo/checkStore")}Object.defineProperty(t,"__esModule",{value:!0}),t.updateUserInfo=a,t.showTags=i,t.checkStore=o;var s=e(101),r=function(n){return n&&n.__esModule?n:{default:n}}(s)},597:function(n,t,e){"use strict";function a(n){return n&&n.__esModule?n:{default:n}}Object.defineProperty(t,"__esModule",{value:!0});var i=e(255),o=a(i);e(628);var s=e(560),r=a(s),l=e(103),c=e(576),d=e(74),f=a(d);t.default={components:{loading:r.default},data:function(){return{sex:"",age:"",correct_time:"",tooth_socket:"",tooth_question:"",content:"",tags:"",tagsArr:"",tooth_questionList:[],protocol:!1,time:5,t:""}},computed:(0,o.default)({},(0,l.mapGetters)({info:"Personal/userInfo"})),methods:(0,o.default)({},(0,l.mapActions)({showTags:"Home/showTags"}),(0,l.mapActions)({userInfo:"Personal/userInfo"}),{initData:function(){this.$data.sex=this.info.sex,this.$data.age=this.info.age,this.$data.correct_time=this.info.correct_time,this.$data.tooth_socket=this.info.tooth_socket,this.$data.tooth_question=this.info.tooth_question,this.$data.content=this.info.content},initTags:function(n){for(var t={},e=0;e<n.length;e++){for(var a=[],i=0;i<n[e].data.length;i++)if("tooth_question"==n[e].key){var o={text:n[e].data[i].value,value:n[e].data[i].value};a.push(o)}else a.push(n[e].data[i].value);t[e]=a}this.$data.tagsArr=t},save:function(n){var t=this;if(console.log(123),"content"==n&&this.$data.content.length<16)return void(0,f.default)("至少输入16个字",{delay:1500});this.$data.tooth_question=this.$data.tooth_questionList.join(","),(0,c.updateUserInfo)({sex:this.$data.sex,age:this.$data.age,correct_time:this.$data.correct_time,tooth_socket:this.$data.tooth_socket,tooth_question:this.$data.tooth_question,content:this.$data.content}).then(function(n){t.$refs.myPopup.hide(),200==n.status&&n.data&&(n.data.status?(0,f.default)(n.data.result,{delay:1500}):(0,f.default)(n.data.errMessage,{delay:1500}))})},contentChange:function(){console.log(this.$data.content),this.$data.content=this.$data.content.substr(0,48)},showPopup:function(n){this.$refs[n].show()},hidePopup:function(n){this.$refs[n].hide()},checkStoreTo:function(n){var t=this;(0,c.checkStore)().then(function(e){if(200==e.status&&e.data)if(e.data.status){if("push"==n)return t.$data.protocol=!0,void t.timer();t.$router.push("/editDetail")}else(0,f.default)(e.data.errMessage,{delay:1500})})},timer:function(){var n=this;this.$data.t=setInterval(function(){if(n.$data.time<=0)return void clearInterval(n.$data.t);n.$data.time--},1e3)},sureCheckStoreTo:function(){clearInterval(this.$data.t),this.checkStoreTo()}}),created:function(){var n=this;window.scrollTo(0,0),this.userInfo().then(function(t){n.initData()}),(0,c.showTags)().then(function(t){200==t.status&&t.data&&(t.data.status?(n.initTags(t.data.result),n.$data.tags=t.data.result):(0,f.default)(t.data.errMessage,{delay:1500}))})}}},627:function(n,t,e){var a=e(574);"string"==typeof a&&(a=[[n.i,a,""]]),a.locals&&(n.exports=a.locals);var i=e(564)("1cb749d7",a,!1,{});a.locals||n.hot.accept(574,function(){var t=e(574);"string"==typeof t&&(t=[[n.i,t,""]]),i(t)}),n.hot.dispose(function(){i()})},628:function(n,t,e){var a=e(575);"string"==typeof a&&(a=[[n.i,a,""]]);var i={};i.transform=void 0;var o=e(254)(a,i);a.locals&&(n.exports=a.locals),a.locals||n.hot.accept(575,function(){var t=e(575);"string"==typeof t&&(t=[[n.i,t,""]]),o(t)}),n.hot.dispose(function(){o()})},629:function(n,t,e){"use strict";var a=function(){var n=this,t=n.$createElement,a=n._self._c||t;return a("div",{attrs:{id:"personal"}},[a("div",{staticClass:"banner"},[a("div",{staticClass:"inner"},[a("div",{staticClass:"top_box"},[a("div",{staticClass:"logo_box"},[a("img",{attrs:{src:n.info.imgUrl,alt:""}})]),n._v(" "),a("div",{staticClass:"info_box"},[a("div",{staticClass:"title"},[n._v(n._s(n.info.nickname))]),n._v(" "),a("div",{staticClass:"time"},[n._v("更新时间："+n._s(n.info.updated_at))])])]),n._v(" "),a("div",{staticClass:"bottom_box"},[n.info?a("ul",[a("li",[n.info.article?a("div",{on:{click:n.checkStoreTo}},[a("div",{},[n._v("我的")]),n._v(" "),a("div",{},[n._v("日记")])]):a("div",{on:{click:function(t){n.checkStoreTo("push")}}},[a("div",{},[n._v("发布")]),n._v(" "),a("div",{},[n._v("日记")])])]),n._v(" "),a("li",[a("div",{},[n._v(n._s(n.info.article&&n.info.article.forwardNum?n.info.article.forwardNum:"0"))]),n._v(" "),a("div",{},[n._v("转发")])]),n._v(" "),a("li",[a("div",{},[n._v(n._s(n.info.article&&n.info.article.commentsNum?n.info.article.commentsNum:"0"))]),n._v(" "),a("div",{},[n._v("评论")])]),n._v(" "),a("li",[a("div",{},[n._v(n._s(n.info.article&&n.info.article.praiseNum?n.info.article.praiseNum:"0"))]),n._v(" "),a("div",{},[n._v("获赞")])]),n._v(" "),a("li",[a("router-link",{attrs:{to:"/?type=collect"}},[a("div",{},[n._v("收藏")]),n._v(" "),a("div",{},[n._v("日记")])])],1)]):n._e()])]),n._v(" "),a("img",{attrs:{src:e(630),alt:""}})]),n._v(" "),a("div",{staticClass:"personal_info"},[n.tags?a("ul",[a("li",{staticClass:"clearfix"},[a("div",{staticClass:"f_left"},[n._v(n._s(n.tags[0].label))]),n._v(" "),a("div",{staticClass:"f_right"},[a("div",{staticClass:"con"},[a("cube-select",{attrs:{options:n.tagsArr[0]},on:{change:n.save},model:{value:n.sex,callback:function(t){n.sex=t},expression:"sex"}})],1),n._v(" "),a("img",{attrs:{src:e(566),alt:""}})])]),n._v(" "),a("li",{staticClass:"clearfix"},[a("div",{staticClass:"f_left"},[n._v(n._s(n.tags[1].label))]),n._v(" "),a("div",{staticClass:"f_right"},[a("div",{staticClass:"con"},[a("cube-select",{attrs:{options:n.tagsArr[1]},on:{change:n.save},model:{value:n.age,callback:function(t){n.age=t},expression:"age"}})],1),n._v(" "),a("img",{attrs:{src:e(566),alt:""}})])]),n._v(" "),a("li",{staticClass:"clearfix"},[a("div",{staticClass:"f_left"},[n._v(n._s(n.tags[2].label))]),n._v(" "),a("div",{staticClass:"f_right"},[a("div",{staticClass:"con"},[a("cube-select",{attrs:{options:n.tagsArr[2]},on:{change:n.save},model:{value:n.correct_time,callback:function(t){n.correct_time=t},expression:"correct_time"}})],1),n._v(" "),a("img",{attrs:{src:e(566),alt:""}})])]),n._v(" "),a("li",{staticClass:"clearfix"},[a("div",{staticClass:"f_left"},[n._v(n._s(n.tags[3].label))]),n._v(" "),a("div",{staticClass:"f_right"},[a("div",{staticClass:"con"},[a("cube-select",{attrs:{options:n.tagsArr[3]},on:{change:n.save},model:{value:n.tooth_socket,callback:function(t){n.tooth_socket=t},expression:"tooth_socket"}})],1),n._v(" "),a("img",{attrs:{src:e(566),alt:""}})])]),n._v(" "),a("li",{staticClass:"clearfix"},[a("div",{staticClass:"f_left"},[n._v(n._s(n.tags[4].label))]),n._v(" "),a("div",{staticClass:"f_right"},[a("div",{staticClass:"con"},[a("div",{on:{click:function(t){n.showPopup("myPopup")}}},[n._v("\n              "+n._s(n.tooth_question?n.tooth_question:"请选择")+"\n            ")])]),n._v(" "),a("img",{attrs:{src:e(566),alt:""}})])]),n._v(" "),a("li",{staticClass:"clearfix"},[a("div",{staticClass:"f_left"},[n._v("日记简介")]),n._v(" "),a("div",{staticClass:"f_right"},[a("textarea",{directives:[{name:"model",rawName:"v-model",value:n.content,expression:"content"}],attrs:{name:"date",placeholder:"16~48个字内"},domProps:{value:n.content},on:{change:n.contentChange,blur:function(t){n.save("content")},input:function(t){t.target.composing||(n.content=t.target.value)}}}),n._v(" "),a("img",{attrs:{src:e(566),alt:""}})])])]):n._e()]),n._v(" "),a("cube-popup",{ref:"myPopup",attrs:{type:"my-popup"}},[a("div",{staticClass:"cube-dialog-main"},[a("div",{staticClass:"cube-dialog-prompt"},[a("h2",{staticClass:"cube-dialog-title"},[a("p",{staticClass:"cube-dialog-title-def"},[n._v("请选择牙齿问题")])]),n._v(" "),a("div",{staticClass:"cube-dialog-content"},[n.tagsArr[4]?a("cube-checker",{attrs:{options:n.tagsArr[4]},model:{value:n.tooth_questionList,callback:function(t){n.tooth_questionList=t},expression:"tooth_questionList"}}):n._e()],1),n._v(" "),a("div",{staticClass:"cube-dialog-btns border-right-1px"},[a("a",{staticClass:"cube-dialog-btn border-top-1px",attrs:{href:"javascript:;"},on:{click:function(t){n.hidePopup("myPopup")}}},[n._v("取消")]),n._v(" "),a("a",{staticClass:"cube-dialog-btn border-top-1px cube-dialog-btn_highlight",attrs:{href:"javascript:;"},on:{click:n.save}},[n._v("确定")])])])])]),n._v(" "),n.protocol?a("div",{staticClass:"protocol_box"},[a("div",{staticClass:"content"},[a("div",{staticClass:"title"},[n._v("劲松口腔矫正日记协议")]),n._v(" "),a("div",{staticClass:"inner"},[n._v("知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙…其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙…其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛？因为，我长了两颗大兔牙其实，从一开始我就觉得自己的牙齿很难看，想去做牙齿矫正去做牙齿矫正去做牙齿矫正矫...知道大家为什么都爱叫我小兔嘛...")]),n._v(" "),a("div",{staticClass:"btn",on:{click:n.sureCheckStoreTo}},[n._v("确定 "+n._s(n.time)+"S")])])]):n._e(),n._v(" "),n.info||n.tags?n._e():a("loading")],1)},i=[];a._withStripped=!0;var o={render:a,staticRenderFns:i};t.a=o,n.hot.accept(),n.hot.data&&e(15).rerender("data-v-fb3c8c62",o)},630:function(n,t,e){n.exports=e.p+"img/me.png"}});