var webApp=function(e){var t=e.module("webApp",["ngRoute","ngResource","ui.bootstrap"]);return t.config(["$routeProvider","$locationProvider",function(e,t){e.when("/produto",{templateUrl:"partials/produto/index.html",controller:"ProdutoCtrl",controllerAs:"prod",resolve:{produtos:["$rootScope","ProdutoService",function(e,t){return e.activeLoader=!0,t.listar(null,null)}]}}),e.when("/categoria",{templateUrl:"partials/categoria/index.html",controller:"CategoriaCtrl",resolve:{categorias:["$rootScope","CategoriaService",function(e,t){return e.activeLoader=!0,t.listar(null,null)}]}}),e.otherwise({redirectTo:"/produto"}),t.html5Mode(!0),t.hashPrefix("!")}]),t.run(["$rootScope",function(e){e.activeLoader=!1}]),t}(angular);webApp.constant("constantes",{api:{url:"http://www.webservice.dev/api",path:{produto:"/produto",categoria:"/categoria"}}}),webApp.factory("CategoriaService",["$resource","constantes",function(e,t){var r=t.api.url+t.api.path.categoria;return{listar:function(t){return e(r).get().$promise},detalhes:function(t){return e(r+"/:id").get({id:t}).$promise},cadastrar:function(t){return e(r).save($input).$promise},atualizar:function(t){return e(r+"/:id",null,{update:{method:"PUT"}}).update({id:t}).$promise},remover:function(t){return e(r+"/:id",null,{delete:{method:"DELETE"}}).delete({id:t}).$promise}}}]),webApp.factory("ProdutoService",["$resource","constantes",function(e,t){var r=t.api.url+t.api.path.produto;return{listar:function(t,o){return e(t?t:r).get(o).$promise},detalhes:function(t){return e(r+"/:id").get({id:t}).$promise},cadastrar:function(t){return e(r).save($input).$promise},atualizar:function(t){return e(r+"/:id",null,{update:{method:"PUT"}}).update({id:t}).$promise},remover:function(t){return e(r+"/:id",null,{delete:{method:"DELETE"}}).delete({id:t}).$promise}}}]),webApp.controller("AppCtrl",["$scope","$log",function(e,t){var r=this;r.menuItems=[{path:"/produto",title:"Produto",selected:!1},{path:"/categoria",title:"Categoria",selected:!1}],e.$on("$routeChangeSuccess",function(e,t,o){r.menuItems=r.menuItems.map(function(e){return t.$$route.originalPath==e.path?e.selected=!0:e.selected=!1,e})})}]),webApp.controller("CategoriaCtrl",["$log","$rootScope","categorias",function(e,t,r){t.activeLoader=!1;var o=this;o.categorias=r,e.log(o.categorias)}]),webApp.controller("ProdutoCtrl",["$log","$rootScope","$uibModal","produtos","ProdutoService",function(e,t,r,o,a){function i(e,r){a.listar(e,r).then(function(e){t.activeLoader=!1,n.proximaPagina=e.next_page_url,n.paginaAnterior=e.prev_page_url,n.produtos=e.data})}t.activeLoader=!1;var n=this;n.proximaPagina=o.next_page_url,n.paginaAnterior=o.prev_page_url,n.produtos=o.data,n.produto={},n.proxima=function(){n.proximaPagina&&(t.activeLoader=!0,i(n.proximaPagina,n.produto))},n.anterior=function(){n.paginaAnterior&&(t.activeLoader=!0,i(n.paginaAnterior,n.produto))},n.adicionarNovo=function(){alert("Adicionar Novo")},n.buscar=function(r){e.log(r),t.activeLoader=!0,i(null,r)}}]);