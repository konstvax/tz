/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/image.js":
/*!*******************************!*\
  !*** ./resources/js/image.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  $(\".custom-file-input\").on('change', loadPicture);\n\n  function loadPicture(event) {\n    var reader = new FileReader();\n    var output = $(\"#change-picture\");\n\n    reader.onload = function () {\n      output[0].src = reader.result;\n    };\n\n    reader.readAsDataURL(event.target.files[0]);\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvaW1hZ2UuanM/YjAwZCJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwibG9hZFBpY3R1cmUiLCJldmVudCIsInJlYWRlciIsIkZpbGVSZWFkZXIiLCJvdXRwdXQiLCJvbmxvYWQiLCJzcmMiLCJyZXN1bHQiLCJyZWFkQXNEYXRhVVJMIiwidGFyZ2V0IiwiZmlsZXMiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVk7QUFDMUJGLEdBQUMsQ0FBQyxvQkFBRCxDQUFELENBQXdCRyxFQUF4QixDQUEyQixRQUEzQixFQUFxQ0MsV0FBckM7O0FBRUEsV0FBU0EsV0FBVCxDQUFxQkMsS0FBckIsRUFBNEI7QUFFeEIsUUFBTUMsTUFBTSxHQUFHLElBQUlDLFVBQUosRUFBZjtBQUNBLFFBQU1DLE1BQU0sR0FBR1IsQ0FBQyxDQUFDLGlCQUFELENBQWhCOztBQUNBTSxVQUFNLENBQUNHLE1BQVAsR0FBZ0IsWUFBWTtBQUN4QkQsWUFBTSxDQUFDLENBQUQsQ0FBTixDQUFVRSxHQUFWLEdBQWdCSixNQUFNLENBQUNLLE1BQXZCO0FBQ0gsS0FGRDs7QUFHQUwsVUFBTSxDQUFDTSxhQUFQLENBQXFCUCxLQUFLLENBQUNRLE1BQU4sQ0FBYUMsS0FBYixDQUFtQixDQUFuQixDQUFyQjtBQUNIO0FBQ0osQ0FaRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9pbWFnZS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcbiAgICAkKFwiLmN1c3RvbS1maWxlLWlucHV0XCIpLm9uKCdjaGFuZ2UnLCBsb2FkUGljdHVyZSk7XG5cbiAgICBmdW5jdGlvbiBsb2FkUGljdHVyZShldmVudCkge1xuXG4gICAgICAgIGNvbnN0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XG4gICAgICAgIGNvbnN0IG91dHB1dCA9ICQoXCIjY2hhbmdlLXBpY3R1cmVcIik7XG4gICAgICAgIHJlYWRlci5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICBvdXRwdXRbMF0uc3JjID0gcmVhZGVyLnJlc3VsdDtcbiAgICAgICAgfVxuICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTChldmVudC50YXJnZXQuZmlsZXNbMF0pO1xuICAgIH1cbn0pXG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/image.js\n");

/***/ }),

/***/ 2:
/*!*************************************!*\
  !*** multi ./resources/js/image.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! F:\Konstantin\Works\Open Server\OpenServer\domains\news-portal\resources\js\image.js */"./resources/js/image.js");


/***/ })

/******/ });