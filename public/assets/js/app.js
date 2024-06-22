/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//require('./bootstrap');
//require('./jquery');
__webpack_require__(/*! ./viacep */ "./resources/js/viacep.js");

__webpack_require__(/*! ./script */ "./resources/js/script.js");

__webpack_require__(/*! ./funcoes */ "./resources/js/funcoes.js"); //window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
const app = new Vue({
    el: '#app',
});
*/

/***/ }),

/***/ "./resources/js/funcoes.js":
/*!*********************************!*\
  !*** ./resources/js/funcoes.js ***!
  \*********************************/
/***/ (() => {

window.desativaeAtivaCulto = desativaeAtivaCulto;
window.desativaeAtivaCampanha = desativaeAtivaCampanha;
window.deletaCulto = deletaCulto;
window.deletaCampanha = deletaCampanha;
window.desativaVisitante = desativaVisitante;
window.deletaUsuario = deletaUsuario; // Desativa ou Ativa culto e campanha

function desativaeAtivaCulto(cod_culto, status) {
  swal({
    title: 'Desativar o Ativar o culto',
    text: "Desativando o culto ele não aparecerar no cadastro!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, prosseguir!',
    cancelButtonText: 'Não, cancelar'
  }).then(function (result) {
    if (result.value == true) {
      $.ajax({
        type: "GET",
        url: "/visualizacaoDoCulto",
        data: {
          cod_culto: cod_culto,
          status: status
        },
        cache: false,
        success: function success(response) {
          swal("Sucesso!", "Opereração realizado com sucesso!", "success"); //$('table').DataTable().refresh();

          window.location.reload();
        }
      });
    }
  });
}

function desativaeAtivaCampanha(cod_campanha, status) {
  swal({
    title: 'Desativar o Ativar o campanha',
    text: "Desativando o campanha ele não aparecerar no cadastro!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, prosseguir!',
    cancelButtonText: 'Não, cancelar'
  }).then(function (result) {
    if (result.value == true) {
      $.ajax({
        type: "GET",
        url: "/visualizacaoDaCampanha",
        data: {
          'cod_campanha': cod_campanha,
          status: status
        },
        cache: false,
        success: function success(response) {
          swal("Sucesso!", "Opereração realizado com sucesso!", "success"); //$('table').data.reload();

          window.location.reload();
        }
      });
    }
  });
}

function deletaCulto(cod_culto) {
  Swal.fire({
    title: 'Deletar culto?',
    text: "Deletar o culto ele será removido da lista!",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, prosseguir!',
    cancelButtonText: 'Não, cancelar'
  }).then(function (result) {
    if (result.value == true) {
      $.ajax({
        type: "POST",
        url: "/deletaCulto",
        data: {
          cod_culto: cod_culto
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        success: function success(response) {
          swal("Sucesso!", "Opereração realizado com sucesso!", "success"); //$('table').DataTable().refresh();

          window.location.reload();
        }
      });
    }
  });
}

function desativaVisitante(cod_pessoa) {
  Swal.fire({
    title: 'Remover Visitante?',
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, prosseguir!',
    cancelButtonText: 'Não, cancelar'
  }).then(function (result) {
    if (result.value == true) {
      $.ajax({
        type: "POST",
        url: "/desativaVisitante",
        data: {
          cod_pessoa: cod_pessoa
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        success: function success(response) {
          swal("Sucesso!", "Opereração realizado com sucesso!", "success"); //$('table').DataTable().refresh();

          window.location.reload();
        }
      });
    }
  });
}

function deletaCampanha(cod_campanha) {
  Swal.fire({
    title: 'Deletar Campanha?',
    text: "Deletar o campanha ele será removido da lista!",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, prosseguir!',
    cancelButtonText: 'Não, cancelar'
  }).then(function (result) {
    if (result.value == true) {
      $.ajax({
        type: "POST",
        url: "/deletaCampanha",
        data: {
          cod_campanha: cod_campanha
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        success: function success(response) {
          swal("Sucesso!", "Opereração realizado com sucesso!", "success"); //$('table').DataTable().refresh();

          window.location.reload();
        }
      });
    }
  });
}

function deletaUsuario(cod_usuario) {
  Swal.fire({
    title: 'Deletar Usuário?',
    text: "Deletar o usuário ele será removido da lista!",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, prosseguir!',
    cancelButtonText: 'Não, cancelar'
  }).then(function (result) {
    if (result.value == true) {
      $.ajax({
        type: "POST",
        url: "/deleta-usuario",
        data: {
          cod_usuario: cod_usuario
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        success: function success(response) {
          swal("Sucesso!", "Opereração realizado com sucesso!", "success"); //$('table').DataTable().refresh();

          window.location.reload();
        }
      });
    }
  });
}

$('[data-usuario]').on('click', function () {
  var id = $('#testedoteste').prev().attr('id'); //var value = $(this).siblings('input').val();

  alert(id);
  $.ajax({
    url: '/toggle-usuario',
    type: 'POST',
    data: {
      //cod_usuario: $("#cod_usuario").val(),
      status: $(this).prop('checked')
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function success($data) {
      if ($(this).prop('checked') === true) {
        $.notify('O usuário foi ativado', {
          type: 'success'
        });
      } else {
        $.notify('O usuário foi inativado', {
          type: 'danger'
        });
      }
    }
  });
});

/***/ }),

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/***/ (() => {

$(document).ready(function () {
  $('table:not(.ignoreDatatable)').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json"
    },
    //"scrollX": '600',
    //"scrollY": 'auto',
    //orderCellsTop: true,
    //fixedHeader: true,
    //autoWidth: true,

    /*rowReorder: {
        selector: 'td:nth-child(2)',
    },*/
    responsive: {
      details: {
        type: 'column'
      }
    },
    columnDefs: [{
      className: 'dtr-control',
      orderable: false,
      targets: 0
    }]
  });
});
$("#toggleCulto").change(function () {
  $.ajax({
    url: 'toggle',
    type: 'GET',
    data: {
      nom_campo: 'culto',
      status: $(this).prop('checked')
    },
    success: function success($data) {
      if ($("#toggleCulto").prop('checked') === true) {
        $.notify('Campo Culto foi ativado', {
          type: 'success'
        });
      } else {
        $.notify('Campo Culto foi inativado', {
          type: 'danger'
        });
      }
    }
  });
});
$("#toggleCampanha").change(function () {
  $.ajax({
    url: 'toggle',
    type: 'GET',
    data: {
      nom_campo: 'campanha',
      status: $(this).prop('checked')
    },
    success: function success($data) {
      if ($("#toggleCampanha").prop('checked') === true) {
        $.notify('Campo Campanha foi ativado', {
          type: 'success'
        });
      } else {
        $.notify('Campo Campanha foi inativado', {
          type: 'danger'
        });
      }
    }
  });
});

/***/ }),

/***/ "./resources/js/viacep.js":
/*!********************************!*\
  !*** ./resources/js/viacep.js ***!
  \********************************/
/***/ (() => {

$(document).ready(function () {
  function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    $("#endereco").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#estado").val("");
  } //Quando o campo cep perde o foco.


  $("#cep").blur(function () {
    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, ''); //Verifica se campo cep possui valor informado.

    if (cep != "") {
      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/; //Valida o formato do CEP.

      if (validacep.test(cep)) {
        //Preenche os campos com "..." enquanto consulta webservice.
        $("#endereco").val("...");
        $("#bairro").val("...");
        $("#cidade").val("...");
        $("#estado").val("..."); //Consulta o webservice viacep.com.br/

        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
          if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#endereco").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#estado").val(dados.uf);
          } //end if.
          else {
            //CEP pesquisado não foi encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        });
      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/linktree.scss":
/*!**************************************!*\
  !*** ./resources/sass/linktree.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/pagina_links.scss":
/*!******************************************!*\
  !*** ./resources/sass/pagina_links.scss ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/qrcode.scss":
/*!************************************!*\
  !*** ./resources/sass/qrcode.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/app": 0,
/******/ 			"assets/css/app": 0,
/******/ 			"assets/css/qrcode": 0,
/******/ 			"assets/css/pagina_links": 0,
/******/ 			"assets/css/linktree": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/qrcode","assets/css/pagina_links","assets/css/linktree"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/qrcode","assets/css/pagina_links","assets/css/linktree"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/qrcode","assets/css/pagina_links","assets/css/linktree"], () => (__webpack_require__("./resources/sass/linktree.scss")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/app","assets/css/qrcode","assets/css/pagina_links","assets/css/linktree"], () => (__webpack_require__("./resources/sass/pagina_links.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/app","assets/css/qrcode","assets/css/pagina_links","assets/css/linktree"], () => (__webpack_require__("./resources/sass/qrcode.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;