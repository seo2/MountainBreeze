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

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

$(document).ready(function () {
  var _$$owlCarousel;

  $('#hero-carousel').owlCarousel({
    items: 1,
    dots: true
  });
  $('#talleristasCarousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: true,
    autoplay: true,
    navText: ['<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full"><i class="fal fa-chevron-left -ml-1"></i></span></div>', '<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-negro border-solid text-negro hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><i class="fal fa-chevron-right -mr-1"></i></span></div>'],
    responsive: {
      0: {
        items: 1,
        dots: true
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  });
  $('#proyectoCarousel').owlCarousel((_$$owlCarousel = {
    items: 1,
    nav: true,
    dots: true,
    autoWidth: true
  }, _defineProperty(_$$owlCarousel, "items", 4), _defineProperty(_$$owlCarousel, "navText", ['<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-beige border-solid text-beige hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full"><i class="fal fa-chevron-left -ml-1"></i></span></div>', '<div class="col-span-1 text-lg lg:text-4xl hidden md:block"><span class="h-8 w-8 leading-8 lg:h-16 lg:w-16 lg:leading-16 text-center inline-block border border-beige border-solid text-beige hover:bg-naranjo hover:border-naranjo hover:text-blanco transition duration-200 rounded-full float-right"><i class="fal fa-chevron-right -mr-1"></i></span></div>']), _$$owlCarousel));
}); // 

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
})(jQuery); // Language: javascript
// Path: src/scripts/app.js


tinymce.addI18n('es_419', {
  "Redo": "Rehacer",
  "Undo": "Deshacer",
  "Cut": "Cortar",
  "Copy": "Copiar",
  "Paste": "Pegar",
  "Select all": "Seleccionar todo",
  "New document": "Nuevo documento",
  "Ok": "Ok",
  "Cancel": "Cancelar",
  "Visual aids": "Ayudas visuales",
  "Bold": "Negrita",
  "Italic": "Cursiva",
  "Underline": "Subrayado",
  "Strikethrough": "Tachado",
  "Superscript": "Super\xEDndice",
  "Subscript": "Sub\xEDndice",
  "Clear formatting": "Limpiar formato",
  "Align left": "Alinear a la izquierda",
  "Align center": "Centrar",
  "Align right": "Alinear a la derecha",
  "Justify": "Justificar",
  "Bullet list": "Lista de vi\xF1etas",
  "Numbered list": "Lista numerada",
  "Decrease indent": "Disminuir sangr\xEDa",
  "Increase indent": "Aumentar sangr\xEDa",
  "Close": "Cerrar",
  "Formats": "Formatos",
  "Your browser doesn't support direct access to the clipboard. Please use the Ctrl+X\/C\/V keyboard shortcuts instead.": "Tu navegador no soporta acceso directo al portapapeles. Favor usar los comandos de teclado Ctrl+X\/C\/V",
  "Headers": "Encabezados",
  "Header 1": "Encabezado 1",
  "Header 2": "Encabezado 2",
  "Header 3": "Encabezado 3",
  "Header 4": "Encabezado 4",
  "Header 5": "Encabezado 5",
  "Header 6": "Encabezado 6",
  "Headings": "T\xEDtulos",
  "Heading 1": "T\xEDtulo 1",
  "Heading 2": "T\xEDtulo 2",
  "Heading 3": "T\xEDtulo 3",
  "Heading 4": "T\xEDtulo 4",
  "Heading 5": "T\xEDtulo 5",
  "Heading 6": "T\xEDtulo 6",
  "Preformatted": "Preformateado",
  "Div": "Div",
  "Pre": "Pre",
  "Code": "C\xF3digo",
  "Paragraph": "P\xE1rrafo",
  "Blockquote": "Cita",
  "Inline": "En l\xEDnea",
  "Blocks": "Bloques",
  "Paste is now in plain text mode. Contents will now be pasted as plain text until you toggle this option off.": "Paste is now in plain text mode. Contents will now be pasted as plain text until you toggle this option off.",
  "Fonts": "Fonts",
  "Font Sizes": "Tama\xF1os de Fuente",
  "Class": "Class",
  "Browse for an image": "Examinar imagen",
  "OR": "O",
  "Drop an image here": "Arrastrar imagen aqu\xED",
  "Upload": "Subir",
  "Block": "Bloque",
  "Align": "Alinear",
  "Default": "Default",
  "Circle": "Circle",
  "Disc": "Disc",
  "Square": "Square",
  "Lower Alpha": "Lower Alpha",
  "Lower Greek": "Lower Greek",
  "Lower Roman": "Lower Roman",
  "Upper Alpha": "Upper Alpha",
  "Upper Roman": "Upper Roman",
  "Anchor...": "Anchor...",
  "Name": "Name",
  "Id": "Id",
  "Id should start with a letter, followed only by letters, numbers, dashes, dots, colons or underscores.": "Id should start with a letter, followed only by letters, numbers, dashes, dots, colons or underscores.",
  "You have unsaved changes are you sure you want to navigate away?": "You have unsaved changes are you sure you want to navigate away?",
  "Restore last draft": "Restore last draft",
  "Special character...": "Special character...",
  "Source code": "Source code",
  "Insert\/Edit code sample": "Insert\/Edit code sample",
  "Language": "Language",
  "Code sample...": "Code sample...",
  "Color Picker": "Color Picker",
  "R": "R",
  "G": "G",
  "B": "B",
  "Left to right": "Left to right",
  "Right to left": "Right to left",
  "Emoticons": "Emoticons",
  "Emoticons...": "Emoticons...",
  "Metadata and Document Properties": "Metadata and Document Properties",
  "Title": "Title",
  "Keywords": "Keywords",
  "Description": "Description",
  "Robots": "Robots",
  "Author": "Author",
  "Encoding": "Encoding",
  "Fullscreen": "Fullscreen",
  "Action": "Action",
  "Shortcut": "Shortcut",
  "Help": "Help",
  "Address": "Address",
  "Focus to menubar": "Focus to menubar",
  "Focus to toolbar": "Focus to toolbar",
  "Focus to element path": "Focus to element path",
  "Focus to contextual toolbar": "Focus to contextual toolbar",
  "Insert link (if link plugin activated)": "Insert link (if link plugin activated)",
  "Save (if save plugin activated)": "Save (if save plugin activated)",
  "Find (if searchreplace plugin activated)": "Find (if searchreplace plugin activated)",
  "Plugins installed ({0}):": "Plugins installed ({0}):",
  "Premium plugins:": "Premium plugins:",
  "Learn more...": "Learn more...",
  "You are using {0}": "You are using {0}",
  "Plugins": "Plugins",
  "Handy Shortcuts": "Handy Shortcuts",
  "Horizontal line": "Horizontal line",
  "Insert\/edit image": "Insert\/edit image",
  "Alternative description": "Descripci\xF3n alternativa",
  "Accessibility": "Accesibilidad",
  "Image is decorative": "La imagen es decorativa",
  "Source": "Source",
  "Dimensions": "Dimensions",
  "Constrain proportions": "Constrain proportions",
  "General": "General",
  "Advanced": "Advanced",
  "Style": "Style",
  "Vertical space": "Vertical space",
  "Horizontal space": "Horizontal space",
  "Border": "Border",
  "Insert image": "Insert image",
  "Image...": "Image...",
  "Image list": "Image list",
  "Rotate counterclockwise": "Rotate counterclockwise",
  "Rotate clockwise": "Rotate clockwise",
  "Flip vertically": "Flip vertically",
  "Flip horizontally": "Flip horizontally",
  "Edit image": "Edit image",
  "Image options": "Image options",
  "Zoom in": "Zoom in",
  "Zoom out": "Zoom out",
  "Crop": "Crop",
  "Resize": "Resize",
  "Orientation": "Orientation",
  "Brightness": "Brightness",
  "Sharpen": "Sharpen",
  "Contrast": "Contrast",
  "Color levels": "Color levels",
  "Gamma": "Gamma",
  "Invert": "Invert",
  "Apply": "Apply",
  "Back": "Back",
  "Insert date\/time": "Insert date\/time",
  "Date\/time": "Date\/time",
  "Insert\/edit link": "Insert\/edit link",
  "Text to display": "Text to display",
  "Url": "Url",
  "Open link in...": "Open link in...",
  "Current window": "Current window",
  "None": "None",
  "New window": "New window",
  "Open link": "Enlace abierto",
  "Remove link": "Remove link",
  "Anchors": "Anchors",
  "Link...": "Link...",
  "Paste or type a link": "Paste or type a link",
  "The URL you entered seems to be an email address. Do you want to add the required mailto: prefix?": "The URL you entered seems to be an email address. Do you want to add the required mailto: prefix?",
  "The URL you entered seems to be an external link. Do you want to add the required http:\/\/ prefix?": "The URL you entered seems to be an external link. Do you want to add the required http:\/\/ prefix?",
  "The URL you entered seems to be an external link. Do you want to add the required https:\/\/ prefix?": "La URL que ingres\xF3 parece ser un enlace externo. \xBFDesea agregar el prefijo https:// requerido?",
  "Link list": "Link list",
  "Insert video": "Insert video",
  "Insert\/edit video": "Insert\/edit video",
  "Insert\/edit media": "Insert\/edit media",
  "Alternative source": "Alternative source",
  "Alternative source URL": "Alternative source URL",
  "Media poster (Image URL)": "Media poster (Image URL)",
  "Paste your embed code below:": "Paste your embed code below:",
  "Embed": "Embed",
  "Media...": "Media...",
  "Nonbreaking space": "Nonbreaking space",
  "Page break": "Page break",
  "Paste as text": "Paste as text",
  "Preview": "Preview",
  "Print...": "Print...",
  "Save": "Save",
  "Find": "Find",
  "Replace with": "Replace with",
  "Replace": "Replace",
  "Replace all": "Replace all",
  "Previous": "Previous",
  "Next": "Next",
  "Find and Replace": "Encontrar y Reemplazar",
  "Find and replace...": "Find and replace...",
  "Could not find the specified string.": "Could not find the specified string.",
  "Match case": "Match case",
  "Find whole words only": "Find whole words only",
  "Find in selection": "Encontrar en la selecci\xF3n",
  "Spellcheck": "Spellcheck",
  "Spellcheck Language": "Spellcheck Language",
  "No misspellings found.": "No se encontraron errores ortogr\xE1ficos.",
  "Ignore": "Ignore",
  "Ignore all": "Ignore all",
  "Finish": "Finish",
  "Add to Dictionary": "Add to Dictionary",
  "Insert table": "Insert table",
  "Table properties": "Table properties",
  "Delete table": "Delete table",
  "Cell": "Cell",
  "Row": "Row",
  "Column": "Column",
  "Cell properties": "Cell properties",
  "Merge cells": "Merge cells",
  "Split cell": "Split cell",
  "Insert row before": "Insert row before",
  "Insert row after": "Insert row after",
  "Delete row": "Delete row",
  "Row properties": "Row properties",
  "Cut row": "Cut row",
  "Copy row": "Copy row",
  "Paste row before": "Paste row before",
  "Paste row after": "Paste row after",
  "Insert column before": "Insert column before",
  "Insert column after": "Insert column after",
  "Delete column": "Delete column",
  "Cols": "Cols",
  "Rows": "Rows",
  "Width": "Width",
  "Height": "Height",
  "Cell spacing": "Cell spacing",
  "Cell padding": "Cell padding",
  "Caption": "Caption",
  "Show caption": "Show caption",
  "Left": "Left",
  "Center": "Center",
  "Right": "Right",
  "Cell type": "Cell type",
  "Scope": "Scope",
  "Alignment": "Alignment",
  "H Align": "H Align",
  "V Align": "V Align",
  "Top": "Top",
  "Middle": "Middle",
  "Bottom": "Bottom",
  "Header cell": "Header cell",
  "Row group": "Row group",
  "Column group": "Column group",
  "Row type": "Row type",
  "Header": "Header",
  "Body": "Body",
  "Footer": "Footer",
  "Border color": "Border color",
  "Insert template...": "Insert template...",
  "Templates": "Templates",
  "Template": "Template",
  "Text color": "Text color",
  "Background color": "Background color",
  "Custom...": "Custom...",
  "Custom color": "Custom color",
  "No color": "No color",
  "Remove color": "Remove color",
  "Table of Contents": "Table of Contents",
  "Show blocks": "Show blocks",
  "Show invisible characters": "Show invisible characters",
  "Word count": "Word count",
  "Count": "Count",
  "Document": "Document",
  "Selection": "Selection",
  "Words": "Words",
  "Words: {0}": "Words: {0}",
  "{0} words": "{0} words",
  "File": "File",
  "Edit": "Edit",
  "Insert": "Insert",
  "View": "View",
  "Format": "Format",
  "Table": "Table",
  "Tools": "Tools",
  "Powered by {0}": "Powered by {0}",
  "Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help": "Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help",
  "Image title": "Image title",
  "Border width": "Border width",
  "Border style": "Border style",
  "Error": "Error",
  "Warn": "Warn",
  "Valid": "Valid",
  "To open the popup, press Shift+Enter": "To open the popup, press Shift+Enter",
  "Rich Text Area. Press ALT-0 for help.": "Rich Text Area. Press ALT-0 for help.",
  "System Font": "System Font",
  "Failed to upload image: {0}": "Failed to upload image: {0}",
  "Failed to load plugin: {0} from url {1}": "Failed to load plugin: {0} from url {1}",
  "Failed to load plugin url: {0}": "Failed to load plugin url: {0}",
  "Failed to initialize plugin: {0}": "Failed to initialize plugin: {0}",
  "example": "example",
  "Search": "Search",
  "All": "All",
  "Currency": "Currency",
  "Text": "Text",
  "Quotations": "Quotations",
  "Mathematical": "Mathematical",
  "Extended Latin": "Extended Latin",
  "Symbols": "Symbols",
  "Arrows": "Arrows",
  "User Defined": "User Defined",
  "dollar sign": "dollar sign",
  "currency sign": "currency sign",
  "euro-currency sign": "euro-currency sign",
  "colon sign": "colon sign",
  "cruzeiro sign": "cruzeiro sign",
  "french franc sign": "french franc sign",
  "lira sign": "lira sign",
  "mill sign": "mill sign",
  "naira sign": "naira sign",
  "peseta sign": "peseta sign",
  "rupee sign": "rupee sign",
  "won sign": "won sign",
  "new sheqel sign": "new sheqel sign",
  "dong sign": "dong sign",
  "kip sign": "kip sign",
  "tugrik sign": "tugrik sign",
  "drachma sign": "drachma sign",
  "german penny symbol": "german penny symbol",
  "peso sign": "peso sign",
  "guarani sign": "guarani sign",
  "austral sign": "austral sign",
  "hryvnia sign": "hryvnia sign",
  "cedi sign": "cedi sign",
  "livre tournois sign": "livre tournois sign",
  "spesmilo sign": "spesmilo sign",
  "tenge sign": "tenge sign",
  "indian rupee sign": "indian rupee sign",
  "turkish lira sign": "turkish lira sign",
  "nordic mark sign": "nordic mark sign",
  "manat sign": "manat sign",
  "ruble sign": "ruble sign",
  "yen character": "yen character",
  "yuan character": "yuan character",
  "yuan character, in hong kong and taiwan": "yuan character, in hong kong and taiwan",
  "yen\/yuan character variant one": "yen\/yuan character variant one",
  "Loading emoticons...": "Loading emoticons...",
  "Could not load emoticons": "Could not load emoticons",
  "People": "People",
  "Animals and Nature": "Animals and Nature",
  "Food and Drink": "Food and Drink",
  "Activity": "Activity",
  "Travel and Places": "Travel and Places",
  "Objects": "Objects",
  "Flags": "Flags",
  "Characters": "Characters",
  "Characters (no spaces)": "Characters (no spaces)",
  "{0} characters": "{0} characters",
  "Error: Form submit field collision.": "Error: Form submit field collision.",
  "Error: No form element found.": "Error: No form element found.",
  "Update": "Update",
  "Color swatch": "Color swatch",
  "Turquoise": "Turquoise",
  "Green": "Green",
  "Blue": "Blue",
  "Purple": "Purple",
  "Navy Blue": "Navy Blue",
  "Dark Turquoise": "Dark Turquoise",
  "Dark Green": "Dark Green",
  "Medium Blue": "Medium Blue",
  "Medium Purple": "Medium Purple",
  "Midnight Blue": "Midnight Blue",
  "Yellow": "Yellow",
  "Orange": "Orange",
  "Red": "Red",
  "Light Gray": "Light Gray",
  "Gray": "Gray",
  "Dark Yellow": "Dark Yellow",
  "Dark Orange": "Dark Orange",
  "Dark Red": "Dark Red",
  "Medium Gray": "Medium Gray",
  "Dark Gray": "Dark Gray",
  "Light Green": "Light Green",
  "Light Yellow": "Light Yellow",
  "Light Red": "Light Red",
  "Light Purple": "Light Purple",
  "Light Blue": "Light Blue",
  "Dark Purple": "Dark Purple",
  "Dark Blue": "Dark Blue",
  "Black": "Black",
  "White": "White",
  "Switch to or from fullscreen mode": "Switch to or from fullscreen mode",
  "Open help dialog": "Open help dialog",
  "history": "history",
  "styles": "styles",
  "formatting": "formatting",
  "alignment": "alignment",
  "indentation": "indentation",
  "Font": "Font",
  "Size": "Size",
  "More...": "More...",
  "Select...": "Select...",
  "Preferences": "Preferences",
  "Yes": "Yes",
  "No": "No",
  "Keyboard Navigation": "Keyboard Navigation",
  "Version": "Version",
  "Code view": "Vista de c\xF3digo",
  "Open popup menu for split buttons": "Abrir men\xFA emergente para botones divididos",
  "List Properties": "Propiedades de Lista",
  "List properties...": "Propiedades de lista...",
  "Start list at number": "Iniciar lista en el n\xFAmero",
  "Line height": "Altura de la l\xEDnea",
  "comments": "comments",
  "Format Painter": "Format Painter",
  "Insert\/edit iframe": "Insert\/edit iframe",
  "Capitalization": "Capitalization",
  "lowercase": "lowercase",
  "UPPERCASE": "UPPERCASE",
  "Title Case": "Title Case",
  "permanent pen": "permanent pen",
  "Permanent Pen Properties": "Permanent Pen Properties",
  "Permanent pen properties...": "Permanent pen properties...",
  "case change": "Cambiar May\xFAsculas y Min\xFAsculas",
  "page embed": "p\xE1gina incrustada",
  "Advanced sort...": "Orden avanzado...",
  "Advanced Sort": "Orden Avanzado",
  "Sort table by column ascending": "Ordenar tabla por columna ascendente",
  "Sort table by column descending": "Ordenar tabla por columna descendente",
  "Sort": "Ordenar",
  "Order": "Orden",
  "Sort by": "Ordenar por",
  "Ascending": "Ascendente",
  "Descending": "Descendiente",
  "Column {0}": "Columna {0}",
  "Row {0}": "Fila {0}",
  "Spellcheck...": "Corrector...",
  "Misspelled word": "Palabra mal escrita",
  "Suggestions": "Sugerencias",
  "Change": "Cambiar",
  "Finding word suggestions": "Encontrar sugerencias de palabras",
  "Success": "\xC9xito",
  "Repair": "Reparar",
  "Issue {0} of {1}": "Problema {0} de {1}",
  "Images must be marked as decorative or have an alternative text description": "Las im\xE1genes deben estar marcadas como decorativas o tener una descripci\xF3n de texto alternativa",
  "Images must have an alternative text description. Decorative images are not allowed.": "Las im\xE1genes deben tener una descripci\xF3n de texto alternativa. No se permiten im\xE1genes decorativas.",
  "Or provide alternative text:": "O proporcione texto alternativo:",
  "Make image decorative:": "Hacer la imagen decorativa:",
  "ID attribute must be unique": "El atributo de ID debe ser \xFAnico",
  "Make ID unique": "Hacer que ID sea \xFAnica",
  "Keep this ID and remove all others": "Conserve esta ID y elimine todas las dem\xE1s",
  "Remove this ID": "Eliminar esta ID",
  "Remove all IDs": "Eliminar todos los ID",
  "Checklist": "Lista de Verificaci\xF3n",
  "Anchor": "Anchor",
  "Special character": "Special character",
  "Code sample": "Code sample",
  "Color": "Color",
  "Document properties": "Document properties",
  "Image description": "Image description",
  "Image": "Image",
  "Insert link": "Insert link",
  "Target": "Target",
  "Link": "Link",
  "Poster": "Poster",
  "Media": "Media",
  "Print": "Print",
  "Prev": "Prev",
  "Find and replace": "Find and replace",
  "Whole words": "Whole words",
  "Insert template": "Insert template"
});

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

__webpack_require__(/*! /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/src/scripts/app.js */"./src/scripts/app.js");
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/herenciacolectiva/wp-content/themes/mountainbreeze/src/styles/style.css */"./src/styles/style.css");


/***/ })

/******/ });