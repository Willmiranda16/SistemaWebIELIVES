"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_HomeComponent_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/HomeComponent.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/HomeComponent.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return generator._invoke = function (innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; }(innerFn, self, context), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; this._invoke = function (method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); }; } function maybeInvokeDelegate(delegate, context) { var method = delegate.iterator[context.method]; if (undefined === method) { if (context.delegate = null, "throw" === context.method) { if (delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method)) return ContinueSentinel; context.method = "throw", context.arg = new TypeError("The iterator does not provide a 'throw' method"); } return ContinueSentinel; } var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, define(Gp, "constructor", GeneratorFunctionPrototype), define(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (object) { var keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      data: {},
      periodo: {
        descripcion: '',
        fecha_inicio: '',
        fecha_fin: '',
        estado: ''
      },
      update_data: {
        descripcion: '',
        fecha_inicio: '',
        fecha_fin: '',
        estado: '',
        id_periodo: ''
      },
      loading: false,
      buscando: false
    };
  },
  mounted: function mounted() {
    this.listar_datos();
  },
  methods: {
    listar_datos: function listar_datos() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.buscando = true;
                axios.get("/listar-periodos").then(function (response) {
                  $('#table-periodos').DataTable().destroy();
                  _this.data = response.data;
                  setTimeout(function () {
                    _this.buscando = false;
                  }, 500);
                })["catch"](function (error) {
                  console.log(error);
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/HomeComponent.vue?vue&type=template&id=696945b6&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/HomeComponent.vue?vue&type=template&id=696945b6& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
      _c = _vm._self._c;

  return _vm._m(0);
};

var staticRenderFns = [function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", [_c("div", {
    staticClass: "section-body"
  }, [_c("div", {
    staticClass: "container-fluid"
  }, [_c("div", {
    staticClass: "d-flex justify-content-between align-items-center"
  }, [_c("div", {
    staticClass: "header-action"
  }, [_c("h1", {
    staticClass: "page-title"
  }, [_vm._v("Inicio")]), _vm._v(" "), _c("ol", {
    staticClass: "breadcrumb page-breadcrumb d-none"
  }, [_c("li", {
    staticClass: "breadcrumb-item"
  }, [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_vm._v("Ericsson")])]), _vm._v(" "), _c("li", {
    staticClass: "breadcrumb-item"
  }, [_c("a", {
    attrs: {
      href: "#"
    }
  }, [_vm._v("University")])]), _vm._v(" "), _c("li", {
    staticClass: "breadcrumb-item active",
    attrs: {
      "aria-current": "page"
    }
  }, [_vm._v("Dashboard")])])]), _vm._v(" "), _c("ul", {
    staticClass: "nav nav-tabs page-header-tab"
  }, [_c("li", {
    staticClass: "nav-item"
  }, [_c("a", {
    staticClass: "nav-link active",
    attrs: {
      "data-toggle": "tab",
      href: "#admin-Dashboard"
    }
  }, [_vm._v("Dashboard")])]), _vm._v(" "), _c("li", {
    staticClass: "nav-item d-none"
  }, [_c("a", {
    staticClass: "nav-link",
    attrs: {
      "data-toggle": "tab",
      href: "#admin-Activity"
    }
  }, [_vm._v("Activity")])])])])])]), _vm._v(" "), _c("div", {
    staticClass: "section-body mt-4"
  }, [_c("div", {
    staticClass: "container-fluid"
  }, [_c("div", {
    staticClass: "row clearfix row-deck"
  }, [_c("div", {
    staticClass: "col-6 col-md-4 col-xl-3"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-body ribbon"
  }, [_c("div", {
    staticClass: "ribbon-box green",
    attrs: {
      "data-toggle": "tooltip",
      title: "Nuevos Periodos"
    }
  }, [_vm._v("5")]), _vm._v(" "), _c("a", {
    staticClass: "my_sort_cut text-muted",
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "fa fa-calendar-check-o"
  }), _vm._v(" "), _c("span", [_vm._v("Periodos")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 col-md-4 col-xl-3"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-body"
  }, [_c("a", {
    staticClass: "my_sort_cut text-muted",
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "fa fa-user-circle-o"
  }), _vm._v(" "), _c("span", [_vm._v("Usuarios")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 col-md-4 col-xl-3"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-body ribbon"
  }, [_c("div", {
    staticClass: "ribbon-box orange",
    attrs: {
      "data-toggle": "tooltip",
      title: "Nuevos Alumnos"
    }
  }, [_vm._v("8")]), _vm._v(" "), _c("a", {
    staticClass: "my_sort_cut text-muted",
    attrs: {
      href: "#"
    }
  }, [_c("i", {
    staticClass: "fa fa-users"
  }), _vm._v(" "), _c("span", [_vm._v("Alumnos")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-6 col-md-4 col-xl-3"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-body"
  }, [_c("a", {
    staticClass: "my_sort_cut text-muted",
    attrs: {
      href: ""
    }
  }, [_c("i", {
    staticClass: "fa fa-book"
  }), _vm._v(" "), _c("span", [_vm._v("Matriculas")])])])])])]), _vm._v(" "), _c("div", {
    staticClass: "tab-content"
  }, [_c("div", {
    staticClass: "tab-pane fade show active",
    attrs: {
      id: "admin-Dashboard",
      role: "tabpanel"
    }
  }, [_c("div", {
    staticClass: "row clearfix"
  }, [_c("div", {
    staticClass: "col-xl-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-header"
  }, [_c("h3", {
    staticClass: "card-title"
  }, [_vm._v("Reporte Academico")]), _vm._v(" "), _c("div", {
    staticClass: "card-options"
  }, [_c("a", {
    staticClass: "card-options-collapse",
    attrs: {
      href: "#",
      "data-toggle": "card-collapse"
    }
  }, [_c("i", {
    staticClass: "fe fe-chevron-up"
  })]), _vm._v(" "), _c("a", {
    staticClass: "card-options-fullscreen",
    attrs: {
      href: "#",
      "data-toggle": "card-fullscreen"
    }
  }, [_c("i", {
    staticClass: "fe fe-maximize"
  })]), _vm._v(" "), _c("a", {
    staticClass: "card-options-remove",
    attrs: {
      href: "#",
      "data-toggle": "card-remove"
    }
  }, [_c("i", {
    staticClass: "fe fe-x"
  })])])]), _vm._v(" "), _c("div", {
    staticClass: "card-body"
  }, [_c("div", {
    staticClass: "d-sm-flex justify-content-between"
  }, [_c("div", {
    staticClass: "font-12 mb-2"
  }, [_c("span", [_vm._v("Measure How Fast You’re Growing Monthly Recurring Revenue. "), _c("a", {
    attrs: {
      href: "#"
    }
  }, [_vm._v("Learn More")])])]), _vm._v(" "), _c("div", {
    staticClass: "selectgroup w250"
  }, [_c("label", {
    staticClass: "selectgroup-item"
  }, [_c("input", {
    staticClass: "selectgroup-input",
    attrs: {
      type: "radio",
      name: "intensity",
      value: "low",
      checked: ""
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "selectgroup-button"
  }, [_vm._v("1D")])]), _vm._v(" "), _c("label", {
    staticClass: "selectgroup-item"
  }, [_c("input", {
    staticClass: "selectgroup-input",
    attrs: {
      type: "radio",
      name: "intensity",
      value: "medium"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "selectgroup-button"
  }, [_vm._v("1W")])]), _vm._v(" "), _c("label", {
    staticClass: "selectgroup-item"
  }, [_c("input", {
    staticClass: "selectgroup-input",
    attrs: {
      type: "radio",
      name: "intensity",
      value: "high"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "selectgroup-button"
  }, [_vm._v("1M")])]), _vm._v(" "), _c("label", {
    staticClass: "selectgroup-item"
  }, [_c("input", {
    staticClass: "selectgroup-input",
    attrs: {
      type: "radio",
      name: "intensity",
      value: "veryhigh"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "selectgroup-button"
  }, [_vm._v("1Y")])])])]), _vm._v(" "), _c("div", {
    attrs: {
      id: "apex-chart-line-column"
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "card-footer"
  }, [_c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-xl-3 col-md-6 mb-2"
  }, [_c("div", {
    staticClass: "clearfix"
  }, [_c("div", {
    staticClass: "float-left"
  }, [_c("strong", [_vm._v("Fees")])]), _vm._v(" "), _c("div", {
    staticClass: "float-right"
  }, [_c("small", {
    staticClass: "text-muted"
  }, [_vm._v("35%")])])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-indigo",
    staticStyle: {
      width: "35%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "35",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })]), _vm._v(" "), _c("span", {
    staticClass: "text-uppercase font-10"
  }, [_vm._v("Compared to last year")])]), _vm._v(" "), _c("div", {
    staticClass: "col-xl-3 col-md-6 mb-2"
  }, [_c("div", {
    staticClass: "clearfix"
  }, [_c("div", {
    staticClass: "float-left"
  }, [_c("strong", [_vm._v("Donation")])]), _vm._v(" "), _c("div", {
    staticClass: "float-right"
  }, [_c("small", {
    staticClass: "text-muted"
  }, [_vm._v("61%")])])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-yellow",
    staticStyle: {
      width: "61%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "61",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })]), _vm._v(" "), _c("span", {
    staticClass: "text-uppercase font-10"
  }, [_vm._v("Compared to last year")])]), _vm._v(" "), _c("div", {
    staticClass: "col-xl-3 col-md-6 mb-2"
  }, [_c("div", {
    staticClass: "clearfix"
  }, [_c("div", {
    staticClass: "float-left"
  }, [_c("strong", [_vm._v("Income")])]), _vm._v(" "), _c("div", {
    staticClass: "float-right"
  }, [_c("small", {
    staticClass: "text-muted"
  }, [_vm._v("87%")])])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-green",
    staticStyle: {
      width: "87%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "87",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })]), _vm._v(" "), _c("span", {
    staticClass: "text-uppercase font-10"
  }, [_vm._v("Compared to last year")])]), _vm._v(" "), _c("div", {
    staticClass: "col-xl-3 col-md-6 mb-2"
  }, [_c("div", {
    staticClass: "clearfix"
  }, [_c("div", {
    staticClass: "float-left"
  }, [_c("strong", [_vm._v("Expense")])]), _vm._v(" "), _c("div", {
    staticClass: "float-right"
  }, [_c("small", {
    staticClass: "text-muted"
  }, [_vm._v("42%")])])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-pink",
    staticStyle: {
      width: "42%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "42",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })]), _vm._v(" "), _c("span", {
    staticClass: "text-uppercase font-10"
  }, [_vm._v("Compared to last year")])])])])])])]), _vm._v(" "), _c("div", {
    staticClass: "row clearfix row-deck"
  }, [_c("div", {
    staticClass: "col-xl-6 col-lg-6 col-md-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-header"
  }, [_c("h3", {
    staticClass: "card-title"
  }, [_vm._v("Exam Toppers")]), _vm._v(" "), _c("div", {
    staticClass: "card-options"
  }, [_c("a", {
    staticClass: "card-options-collapse",
    attrs: {
      href: "#",
      "data-toggle": "card-collapse"
    }
  }, [_c("i", {
    staticClass: "fe fe-chevron-up"
  })]), _vm._v(" "), _c("div", {
    staticClass: "item-action dropdown ml-2"
  }, [_c("a", {
    attrs: {
      href: "javascript:void(0)",
      "data-toggle": "dropdown"
    }
  }, [_c("i", {
    staticClass: "fe fe-more-vertical"
  })]), _vm._v(" "), _c("div", {
    staticClass: "dropdown-menu dropdown-menu-right"
  }, [_c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-eye"
  }), _vm._v(" View Details ")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-share-alt"
  }), _vm._v(" Share ")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-cloud-download"
  }), _vm._v(" Download")]), _vm._v(" "), _c("div", {
    staticClass: "dropdown-divider"
  }), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-copy"
  }), _vm._v(" Copy to")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-folder"
  }), _vm._v(" Move to")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-edit"
  }), _vm._v(" Rename")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-trash"
  }), _vm._v(" Delete")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "table-responsive",
    staticStyle: {
      height: "310px"
    }
  }, [_c("table", {
    staticClass: "table card-table table-vcenter text-nowrap table-striped mb-0"
  }, [_c("tbody", [_c("tr", [_c("th", [_vm._v("No.")]), _vm._v(" "), _c("th", [_vm._v("Name")]), _vm._v(" "), _c("th"), _vm._v(" "), _c("th", [_vm._v("Marks")]), _vm._v(" "), _c("th", [_vm._v("%AGE")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("11")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Merri Diamond")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("Science")])]), _vm._v(" "), _c("td", [_vm._v("199")]), _vm._v(" "), _c("td", [_vm._v("99.00")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("23")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar2.jpg",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Sara Hopkins")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("Mechanical")])]), _vm._v(" "), _c("td", [_vm._v("197")]), _vm._v(" "), _c("td", [_vm._v("98.00")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("41")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar3.jpg",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Allen Collins")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("M.C.A.")])]), _vm._v(" "), _c("td", [_vm._v("197")]), _vm._v(" "), _c("td", [_vm._v("98.00")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("17")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar4.jpg",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Erin Gonzales")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("Arts")])]), _vm._v(" "), _c("td", [_vm._v("194")]), _vm._v(" "), _c("td", [_vm._v("97.00")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("57")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar5.jpg",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Claire Peters")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("Science")])]), _vm._v(" "), _c("td", [_vm._v("192")]), _vm._v(" "), _c("td", [_vm._v("95.00")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("85")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar6.jpg",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Claire Peters")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("Science")])]), _vm._v(" "), _c("td", [_vm._v("192")]), _vm._v(" "), _c("td", [_vm._v("95.00")])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("9")]), _vm._v(" "), _c("td", {
    staticClass: "w40"
  }, [_c("div", {
    staticClass: "avatar"
  }, [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar7.jpg",
      alt: "avatar"
    }
  })])]), _vm._v(" "), _c("td", [_c("div", [_vm._v("Claire Peters")]), _vm._v(" "), _c("div", {
    staticClass: "text-muted"
  }, [_vm._v("Science")])]), _vm._v(" "), _c("td", [_vm._v("191")]), _vm._v(" "), _c("td", [_vm._v("95.00")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "card-footer d-flex justify-content-between"
  }, [_c("div", {
    staticClass: "font-14"
  }, [_c("span", [_vm._v("Measure How Fast You’re Growing Monthly Recurring Revenue. "), _c("a", {
    attrs: {
      href: "#"
    }
  }, [_vm._v("View All")])])]), _vm._v(" "), _c("div", [_c("button", {
    staticClass: "btn btn-primary",
    attrs: {
      type: "button"
    }
  }, [_vm._v("Export")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-xl-6 col-lg-6 col-md-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-header"
  }, [_c("h3", {
    staticClass: "card-title"
  }, [_vm._v("Performance")])]), _vm._v(" "), _c("div", {
    staticClass: "card-body"
  }, [_c("div", {
    attrs: {
      id: "apex-radar-multiple-series"
    }
  })])])])]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-md-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-header"
  }, [_c("h3", {
    staticClass: "card-title"
  }, [_vm._v("New Student List")]), _vm._v(" "), _c("div", {
    staticClass: "card-options"
  }, [_c("a", {
    staticClass: "card-options-collapse",
    attrs: {
      href: "#",
      "data-toggle": "card-collapse"
    }
  }, [_c("i", {
    staticClass: "fe fe-chevron-up"
  })]), _vm._v(" "), _c("a", {
    staticClass: "card-options-fullscreen",
    attrs: {
      href: "#",
      "data-toggle": "card-fullscreen"
    }
  }, [_c("i", {
    staticClass: "fe fe-maximize"
  })]), _vm._v(" "), _c("a", {
    staticClass: "card-options-remove",
    attrs: {
      href: "#",
      "data-toggle": "card-remove"
    }
  }, [_c("i", {
    staticClass: "fe fe-x"
  })])])]), _vm._v(" "), _c("div", {
    staticClass: "card-body"
  }, [_c("div", {
    staticClass: "table-responsive"
  }, [_c("table", {
    staticClass: "table table-striped mb-0 text-nowrap"
  }, [_c("thead", [_c("tr", [_c("th", [_vm._v("No")]), _vm._v(" "), _c("th", [_vm._v("Name")]), _vm._v(" "), _c("th", [_vm._v("Assigned Professor")]), _vm._v(" "), _c("th", [_vm._v("Date Of Admit")]), _vm._v(" "), _c("th", [_vm._v("Fees")]), _vm._v(" "), _c("th", [_vm._v("Branch")]), _vm._v(" "), _c("th", [_vm._v("Edit")])])]), _vm._v(" "), _c("tbody", [_c("tr", [_c("td", [_vm._v("1")]), _vm._v(" "), _c("td", [_vm._v("Jens Brincker")]), _vm._v(" "), _c("td", [_vm._v("Kenny Josh")]), _vm._v(" "), _c("td", [_vm._v("27/05/2016")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-success"
  }, [_vm._v("paid")])]), _vm._v(" "), _c("td", [_vm._v("Mechanical")]), _vm._v(" "), _c("td", [_c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-check"
  })]), _vm._v(" "), _c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-trash"
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("2")]), _vm._v(" "), _c("td", [_vm._v("Mark Hay")]), _vm._v(" "), _c("td", [_vm._v(" Mark")]), _vm._v(" "), _c("td", [_vm._v("26/05/2018")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-warning"
  }, [_vm._v("unpaid")])]), _vm._v(" "), _c("td", [_vm._v("Science")]), _vm._v(" "), _c("td", [_c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-check"
  })]), _vm._v(" "), _c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-trash"
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("3")]), _vm._v(" "), _c("td", [_vm._v("Anthony Davie")]), _vm._v(" "), _c("td", [_vm._v("Cinnabar")]), _vm._v(" "), _c("td", [_vm._v("21/05/2018")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-success"
  }, [_vm._v("paid")])]), _vm._v(" "), _c("td", [_vm._v("Commerce")]), _vm._v(" "), _c("td", [_c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-check"
  })]), _vm._v(" "), _c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-trash"
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("4")]), _vm._v(" "), _c("td", [_vm._v("David Perry")]), _vm._v(" "), _c("td", [_vm._v("Felix ")]), _vm._v(" "), _c("td", [_vm._v("20/04/2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-danger"
  }, [_vm._v("unpaid")])]), _vm._v(" "), _c("td", [_vm._v("Mechanical")]), _vm._v(" "), _c("td", [_c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-check"
  })]), _vm._v(" "), _c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-trash"
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_vm._v("5")]), _vm._v(" "), _c("td", [_vm._v("Anthony Davie")]), _vm._v(" "), _c("td", [_vm._v("Beryl")]), _vm._v(" "), _c("td", [_vm._v("24/05/2017")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-success"
  }, [_vm._v("paid")])]), _vm._v(" "), _c("td", [_vm._v("M.B.A.")]), _vm._v(" "), _c("td", [_c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-check"
  })]), _vm._v(" "), _c("a", {
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "fa fa-trash"
  })])])])])])])])])])])]), _vm._v(" "), _c("div", {
    staticClass: "tab-pane fade",
    attrs: {
      id: "admin-Activity",
      role: "tabpanel"
    }
  }, [_c("div", {
    staticClass: "row clearfix row-deck"
  }, [_c("div", {
    staticClass: "col-xl-7 col-lg-6 col-md-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-header"
  }, [_c("h3", {
    staticClass: "card-title"
  }, [_vm._v("Quick Mail")]), _vm._v(" "), _c("div", {
    staticClass: "card-options"
  }, [_c("a", {
    staticClass: "card-options-remove",
    attrs: {
      href: "javascript:void(0)",
      "data-toggle": "card-remove"
    }
  }, [_c("i", {
    staticClass: "fe fe-x"
  })]), _vm._v(" "), _c("div", {
    staticClass: "item-action dropdown ml-2"
  }, [_c("a", {
    attrs: {
      href: "javascript:void(0)",
      "data-toggle": "dropdown"
    }
  }, [_c("i", {
    staticClass: "fe fe-more-vertical"
  })]), _vm._v(" "), _c("div", {
    staticClass: "dropdown-menu dropdown-menu-right"
  }, [_c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-eye"
  }), _vm._v(" View Details ")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-share-alt"
  }), _vm._v(" Share ")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-cloud-download"
  }), _vm._v(" Download")]), _vm._v(" "), _c("div", {
    staticClass: "dropdown-divider"
  }), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-copy"
  }), _vm._v(" Copy to")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-folder"
  }), _vm._v(" Move to")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-edit"
  }), _vm._v(" Rename")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-trash"
  }), _vm._v(" Delete")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "card-body"
  }, [_c("div", {
    staticClass: "input-group"
  }, [_c("div", {
    staticClass: "input-group-prepend"
  }, [_c("span", {
    staticClass: "input-group-text w80"
  }, [_vm._v("To:")])]), _vm._v(" "), _c("input", {
    staticClass: "form-control",
    attrs: {
      type: "text"
    }
  }), _vm._v(" "), _c("div", {
    staticClass: "input-group-append"
  }, [_c("span", {
    staticClass: "input-group-text"
  }, [_vm._v("CC BCC")])])]), _vm._v(" "), _c("div", {
    staticClass: "input-group mt-1 mb-3"
  }, [_c("div", {
    staticClass: "input-group-prepend"
  }, [_c("span", {
    staticClass: "input-group-text w80"
  }, [_vm._v("Subject:")])]), _vm._v(" "), _c("input", {
    staticClass: "form-control",
    attrs: {
      type: "text"
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "summernote"
  }, [_vm._v("\n                                        Hi there,\n                                        "), _c("br"), _vm._v(" "), _c("p", [_vm._v("The toolbar can be customized and it also supports various callbacks such as "), _c("code", [_vm._v("oninit")]), _vm._v(", "), _c("code", [_vm._v("onfocus")]), _vm._v(", "), _c("code", [_vm._v("onpaste")]), _vm._v(" and many more.")]), _vm._v(" "), _c("br"), _vm._v(" "), _c("p", [_vm._v("Thank you!")]), _vm._v(" "), _c("h6", [_vm._v("Summer Note")])]), _vm._v(" "), _c("button", {
    staticClass: "btn btn-default mt-3"
  }, [_vm._v("Send")])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-xl-5 col-lg-6 col-md-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "card-header"
  }, [_c("h3", {
    staticClass: "card-title"
  }, [_vm._v("University Stats")]), _vm._v(" "), _c("div", {
    staticClass: "card-options"
  }, [_c("a", {
    staticClass: "card-options-remove",
    attrs: {
      href: "javascript:void(0)",
      "data-toggle": "card-remove"
    }
  }, [_c("i", {
    staticClass: "fe fe-x"
  })]), _vm._v(" "), _c("div", {
    staticClass: "item-action dropdown ml-2"
  }, [_c("a", {
    attrs: {
      href: "javascript:void(0)",
      "data-toggle": "dropdown"
    }
  }, [_c("i", {
    staticClass: "fe fe-more-vertical"
  })]), _vm._v(" "), _c("div", {
    staticClass: "dropdown-menu dropdown-menu-right"
  }, [_c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-eye"
  }), _vm._v(" View Details ")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-share-alt"
  }), _vm._v(" Share ")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-cloud-download"
  }), _vm._v(" Download")]), _vm._v(" "), _c("div", {
    staticClass: "dropdown-divider"
  }), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-copy"
  }), _vm._v(" Copy to")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-folder"
  }), _vm._v(" Move to")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-edit"
  }), _vm._v(" Rename")]), _vm._v(" "), _c("a", {
    staticClass: "dropdown-item",
    attrs: {
      href: "javascript:void(0)"
    }
  }, [_c("i", {
    staticClass: "dropdown-icon fa fa-trash"
  }), _vm._v(" Delete")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "card-body"
  }, [_c("div", {
    staticClass: "row text-center"
  }, [_c("div", {
    staticClass: "col-lg-4 col-4 border-right"
  }, [_c("label", {
    staticClass: "mb-0 font-10"
  }, [_vm._v("Department")]), _vm._v(" "), _c("h4", {
    staticClass: "font-20 font-weight-bold"
  }, [_vm._v("05")])]), _vm._v(" "), _c("div", {
    staticClass: "col-lg-4 col-4 border-right"
  }, [_c("label", {
    staticClass: "mb-0 font-10"
  }, [_vm._v("Total Teacher")]), _vm._v(" "), _c("h4", {
    staticClass: "font-20 font-weight-bold"
  }, [_vm._v("43")])]), _vm._v(" "), _c("div", {
    staticClass: "col-lg-4 col-4"
  }, [_c("label", {
    staticClass: "mb-0 font-10"
  }, [_vm._v("Total Student")]), _vm._v(" "), _c("h4", {
    staticClass: "font-20 font-weight-bold"
  }, [_vm._v("267")])])]), _vm._v(" "), _c("table", {
    staticClass: "table table-striped mt-4"
  }, [_c("tbody", [_c("tr", [_c("td", [_c("label", {
    staticClass: "d-block"
  }, [_vm._v("Mechanical Engineering"), _c("span", {
    staticClass: "float-right"
  }, [_vm._v("43%")])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-indigo",
    staticStyle: {
      width: "43%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "43",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "d-block"
  }, [_vm._v("Business Analysis - BUS "), _c("span", {
    staticClass: "float-right"
  }, [_vm._v("27%")])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-blue",
    staticStyle: {
      width: "27%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "27",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "d-block"
  }, [_vm._v("Computer Technology - CT "), _c("span", {
    staticClass: "float-right"
  }, [_vm._v("81%")])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-cyan",
    staticStyle: {
      width: "81%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "77",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "d-block"
  }, [_vm._v("Management - MGT "), _c("span", {
    staticClass: "float-right"
  }, [_vm._v("61%")])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-pink",
    staticStyle: {
      width: "61%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "77",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "d-block"
  }, [_vm._v("Science "), _c("span", {
    staticClass: "float-right"
  }, [_vm._v("77%")])]), _vm._v(" "), _c("div", {
    staticClass: "progress progress-xs"
  }, [_c("div", {
    staticClass: "progress-bar bg-orange",
    staticStyle: {
      width: "77%"
    },
    attrs: {
      role: "progressbar",
      "aria-valuenow": "77",
      "aria-valuemin": "0",
      "aria-valuemax": "100"
    }
  })])])])])])]), _vm._v(" "), _c("div", {
    staticClass: "card-footer"
  }, [_c("small", [_vm._v("Measure How Fast You’re Growing Monthly Recurring Revenue. "), _c("a", {
    attrs: {
      href: "#"
    }
  }, [_vm._v("Learn More")])])])])]), _vm._v(" "), _c("div", {
    staticClass: "col-xl-12 col-lg-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_c("div", {
    staticClass: "table-responsive todo_list"
  }, [_c("table", {
    staticClass: "table table-hover text-nowrap table-striped table-vcenter mb-0"
  }, [_c("thead", [_c("tr", [_c("th", [_vm._v("Task")]), _vm._v(" "), _c("th", {
    staticClass: "w150 text-right"
  }, [_vm._v("Due")]), _vm._v(" "), _c("th", {
    staticClass: "w100"
  }, [_vm._v("Priority")]), _vm._v(" "), _c("th", {
    staticClass: "w80 text-center"
  }, [_c("i", {
    staticClass: "icon-user"
  })])])]), _vm._v(" "), _c("tbody", [_c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1",
      checked: ""
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("Report Panel Usag")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("Feb 12-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-danger ml-0 mr-0"
  }, [_vm._v("HIGH")])]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "avatar avatar-pink",
    attrs: {
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      "data-original-title": "Avatar Name"
    }
  }, [_vm._v("NG")])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("Report Panel Usag")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("Feb 18-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-warning ml-0 mr-0"
  }, [_vm._v("MED")])]), _vm._v(" "), _c("td", [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar1.jpg",
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      alt: "Avatar",
      "data-original-title": "Avatar Name"
    }
  })])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1",
      checked: ""
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("New logo design for Angular Admin")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("March 02-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-success ml-0 mr-0"
  }, [_vm._v("High")])]), _vm._v(" "), _c("td", [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar2.jpg",
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      alt: "Avatar",
      "data-original-title": "Avatar Name"
    }
  })])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1",
      checked: ""
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("Report Panel Usag")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("Feb 12-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-danger ml-0 mr-0"
  }, [_vm._v("HIGH")])]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "avatar avatar-pink",
    attrs: {
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      "data-original-title": "Avatar Name"
    }
  }, [_vm._v("NG")])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("Report Panel Usag")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("Feb 18-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-warning ml-0 mr-0"
  }, [_vm._v("MED")])]), _vm._v(" "), _c("td", [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar3.jpg",
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      alt: "Avatar",
      "data-original-title": "Avatar Name"
    }
  })])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1",
      checked: ""
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("New logo design for Angular Admin")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("March 02-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-success ml-0 mr-0"
  }, [_vm._v("High")])]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "avatar avatar-blue",
    attrs: {
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      "data-original-title": "Avatar Name"
    }
  }, [_vm._v("NG")])])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("Design PSD files for Angular Admin")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("March 20-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-warning ml-0 mr-0"
  }, [_vm._v("MED")])]), _vm._v(" "), _c("td", [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar4.jpg",
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      alt: "Avatar",
      "data-original-title": "Avatar Name"
    }
  })])]), _vm._v(" "), _c("tr", [_c("td", [_c("label", {
    staticClass: "custom-control custom-checkbox"
  }, [_c("input", {
    staticClass: "custom-control-input",
    attrs: {
      type: "checkbox",
      name: "example-checkbox1",
      value: "option1"
    }
  }), _vm._v(" "), _c("span", {
    staticClass: "custom-control-label"
  }, [_vm._v("Design PSD files for Angular Admin")])])]), _vm._v(" "), _c("td", {
    staticClass: "text-right"
  }, [_vm._v("March 20-2019")]), _vm._v(" "), _c("td", [_c("span", {
    staticClass: "tag tag-warning ml-0 mr-0"
  }, [_vm._v("MED")])]), _vm._v(" "), _c("td", [_c("img", {
    staticClass: "avatar",
    attrs: {
      src: "assets/images/xs/avatar5.jpg",
      "data-toggle": "tooltip",
      "data-placement": "top",
      title: "",
      alt: "Avatar",
      "data-original-title": "Avatar Name"
    }
  })])])])])])])])])])])])])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/pages/HomeComponent.vue":
/*!**********************************************!*\
  !*** ./resources/js/pages/HomeComponent.vue ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _HomeComponent_vue_vue_type_template_id_696945b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HomeComponent.vue?vue&type=template&id=696945b6& */ "./resources/js/pages/HomeComponent.vue?vue&type=template&id=696945b6&");
/* harmony import */ var _HomeComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HomeComponent.vue?vue&type=script&lang=js& */ "./resources/js/pages/HomeComponent.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _HomeComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _HomeComponent_vue_vue_type_template_id_696945b6___WEBPACK_IMPORTED_MODULE_0__.render,
  _HomeComponent_vue_vue_type_template_id_696945b6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/HomeComponent.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/pages/HomeComponent.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/pages/HomeComponent.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./HomeComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/HomeComponent.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/HomeComponent.vue?vue&type=template&id=696945b6&":
/*!*****************************************************************************!*\
  !*** ./resources/js/pages/HomeComponent.vue?vue&type=template&id=696945b6& ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeComponent_vue_vue_type_template_id_696945b6___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeComponent_vue_vue_type_template_id_696945b6___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_HomeComponent_vue_vue_type_template_id_696945b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./HomeComponent.vue?vue&type=template&id=696945b6& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/pages/HomeComponent.vue?vue&type=template&id=696945b6&");


/***/ })

}]);