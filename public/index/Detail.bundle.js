webpackJsonp([7],{

/***/ 529:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_detail_vue__ = __webpack_require__(558);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_detail_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_detail_vue__);
/* harmony namespace reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_detail_vue__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_detail_vue__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_56b20d20_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_detail_vue__ = __webpack_require__(579);
var disposed = false
var normalizeComponent = __webpack_require__(38)
/* script */


/* template */

/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_lib_selector_type_script_index_0_detail_vue___default.a,
  __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_lib_template_compiler_index_id_data_v_56b20d20_hasScoped_false_buble_transforms_node_modules_vue_loader_lib_selector_type_template_index_0_detail_vue__["a" /* default */],
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "src/modules/index/containers/detail.vue"

/* hot reload */
if (true) {(function () {
  var hotAPI = __webpack_require__(11)
  hotAPI.install(__webpack_require__(17), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-56b20d20", Component.options)
  } else {
    hotAPI.reload("data-v-56b20d20", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

/* harmony default export */ __webpack_exports__["default"] = (Component.exports);


/***/ }),

/***/ 546:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(204)(false);
// imports


// module
exports.push([module.i, "#detail {\n  width: 100%\n}\n#detail .content {\n  padding: 0 0.24rem;\n  overflow: hidden;\n  background: #fff;\n}\n#detail .top_box {\n  width: 100%;\n  height: 0.78rem;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  -webkit-box-pack: start;\n      -ms-flex-pack: start;\n          justify-content: flex-start;\n  margin-top: 0.16rem\n}\n#detail .top_box .logo_box {\n  width: 0.78rem;\n  height: 0.78rem;\n  text-align: center;\n  line-height: 0.78rem;\n  font-size: 0;\n  border-radius: 100%;\n  overflow: hidden\n}\n#detail .top_box .logo_box img {\n  display: inline-block;\n  max-width: 100%;\n  max-height: 100%;\n}\n#detail .top_box .info_box {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: start;\n      -ms-flex-align: start;\n          align-items: flex-start;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  margin-left: 0.2rem\n}\n#detail .top_box .info_box .title {\n  font-size: 0.3rem;\n  line-height: 0.4rem;\n}\n#detail .top_box .info_box .time {\n  font-size: 0.24rem;\n  line-height: 0.3rem;\n  color: #777777;\n  margin-top: 0.02rem;\n}\n#detail .inner {\n  width: 100%;\n  line-height: 0.48rem;\n  font-size: 0.32rem;\n  color: #000000;\n  margin-top: 0.2rem;\n  margin-bottom: 0.2rem;\n  text-align: justify;\n}\n#detail .img_box {\n  width: 100%;\n  font-size: 0;\n  margin-bottom: 0.2rem\n}\n#detail .img_box img {\n  width: 100%;\n}\n#detail .text {\n  width: 100%;\n  font-size: 0.36rem;\n  color: #333333;\n  line-height: 0.46rem;\n  margin-bottom: 0.1rem;\n}\n", ""]);

// exports


/***/ }),

/***/ 558:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

__webpack_require__(578);

exports.default = {}; //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/***/ }),

/***/ 578:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(546);
if(typeof content === 'string') content = [[module.i, content, '']];
// Prepare cssTransformation
var transform;

var options = {}
options.transform = transform
// add the styles to the DOM
var update = __webpack_require__(205)(content, options);
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(true) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept(546546, function() {
			var newContent = __webpack_require__(546);
			if(typeof newContent === 'string') newContent = [[module.i, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 579:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { attrs: { id: "detail" } }, [
      _c("div", { staticClass: "content" }, [
        _c("div", { staticClass: "top_box" }, [
          _c("div", { staticClass: "logo_box" }, [
            _c("img", {
              attrs: { src: "http://lichenglong.pw/img/lcl.jpg", alt: "" }
            })
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "info_box" }, [
            _c("div", { staticClass: "title" }, [_vm._v("劲小松")]),
            _vm._v(" "),
            _c("div", { staticClass: "time" }, [
              _vm._v("更新时间：2018年6月26日")
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "inner" }, [
          _vm._v(
            "10月有矫正牙齿的想法，与老公商量后决定实行！想彻底整顿一下自己的口腔问题想彻底整顿一下自己的口腔问题"
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "img_box" }, [
          _c("img", {
            attrs: { src: "http://lichenglong.pw/img/lcl.jpg", alt: "" }
          })
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "text" }, [
          _vm._v("预约11月3日一家公立三甲医院"),
          _c("br"),
          _vm._v(
            "11月3日：初诊（挂号5元），拍片（270元），咬模（0元）大夫说需要先洗牙，预约11月10日谈正畸方案......"
          )
        ])
      ])
    ])
  }
]
render._withStripped = true
var esExports = { render: render, staticRenderFns: staticRenderFns }
/* harmony default export */ __webpack_exports__["a"] = (esExports);
if (true) {
  module.hot.accept()
  if (module.hot.data) {
    __webpack_require__(11)      .rerender("data-v-56b20d20", esExports)
  }
}

/***/ })

});
//# sourceMappingURL=Detail.bundle.js.map