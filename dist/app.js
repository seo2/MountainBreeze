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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/scripts/app.js":
/*!****************************!*\
  !*** ./src/scripts/app.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#hero-carousel').owlCarousel({
    items: 1,
    dots: true
  });
  $('#talleristas').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: ['<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full"><i class="fal fa-chevron-left -ml-1"></i></span></div>', '<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><i class="fal fa-chevron-right -mr-1"></i></span></div>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  });
}); // Small plugin to convert tab like designs to dropdown on small screen.
// Small plugin to convert tab like designs to dropdown on small screen.

(function ($) {
  $.fn.tabConvert = function (options) {
    var settings = $.extend({
      activeClass: "active",
      screenSize: 767
    }, options);
    return this.each(function (i) {
      var wrap = $(this).wrap('<div class="tab-to-dropdown"></div>'),
          currentItem = $(this),
          container = $(this).closest('.tab-to-dropdown'),
          value = $(this).find('.' + settings.activeClass).text(),
          toggler = '<div class="selected-tab">' + value + '</div>';
      currentItem.addClass('converted-tab');
      container.prepend(toggler); // function to slide dropdown

      function tabConvert_toggle() {
        currentItem.parent().find('.converted-tab').slideToggle();
      }

      container.find('.selected-tab').click(function () {
        tabConvert_toggle();
      });
      currentItem.find('a').click(function (e) {
        var windowWidth = window.innerWidth;

        if (settings.screenSize >= windowWidth) {
          tabConvert_toggle();
          var selected_text = $(this).text();
          $(this).closest('.tab-to-dropdown').find('.selected-tab').text(selected_text);
        }
      }); //Remove toggle if screen size is bigger than defined screen size

      function resize_function() {
        var windowWidth = window.innerWidth;

        if (settings.screenSize >= windowWidth) {
          currentItem.css('display', 'none');
          currentItem.parent().find('.selected-tab').css('display', '');
          currentItem.removeClass('flex');
        } else {
          currentItem.css('display', '');
          currentItem.parent().find('.selected-tab').css('display', 'none');
          currentItem.addClass('flex');
        }
      }

      console.log(currentItem);
      resize_function();
      $(window).resize(function () {
        resize_function();
      });
    });
  }; // 	Toggle will appear on default screen size 767px
  // $('.tabs').tabConvert({
  //     activeClass: "selected",
  // });
  // 	Toggle will appear on size 991px


  $('.wc-tabs').tabConvert({
    activeClass: "active",
    screenSize: 767
  });
})(jQuery);

/***/ }),

/***/ "./src/styles/style.css":
/*!******************************!*\
  !*** ./src/styles/style.css ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************!*\
  !*** multi ./src/scripts/app.js ./src/styles/style.css ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/src/scripts/app.js */"./src/scripts/app.js");
module.exports = __webpack_require__(/*! /Users/Seo2/Dropbox/04 - Diseño y Desarrollo/00 - En desarrollo/01 - Sitios/herenciacolectiva/wp-content/themes/mountainbreeze/src/styles/style.css */"./src/styles/style.css");


/***/ })

/******/ });