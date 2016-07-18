'use strict';

angular.module('testeApp')

	.factory('Config', function() {

		function Sexo() {

			this.list = [
				{id: '1', description: 'MASCULINO'},
				{id: '2', description: 'FEMININO'},
				{id: '0', description: 'NÃO INFORMADO'},
			];

			this.sexo = {1: 'MASCULINO', 2: 'FEMININO', 0: 'NÃO INFORMADO'};

			this.getList = function() {
				return this.list;
			}

			this.get = function(key) {
				return this.sexo[key];
			}

		}

		function EstadoCivil() {

			this.list = [
				{id: '0', description: 'Solteiro'},
				{id: '1', description: 'Casado'},
				{id: '2', description: 'Divorciado'},
				{id: '3', description: 'Viúvo'},
			];

			this.estadoCivil = {0: 'Solteiro', 1: 'Casado', 2: 'Divorciado', 3: 'Viúvo'};

			this.getList = function() {
				return this.list;
			}

			this.get = function(key) {
				return this.estadoCivil[key];
			}

		}

		///////////////////////////////////////////////////
		return {
			
			Sexo: function() {
				return new Sexo();
			},
			EstadoCivil: function() {
				return new EstadoCivil();
			}
		};
		//////////////////////////////////////////////////

	})

	.service("Model", function($http, $q, Config, Auth, Upload) {

		// Return public API.
		return({
			post: post,
			get: get,
			put: put,
			excluir: excluir,
			getApi: getApi,
			getApiExterna: getApiExterna,
		});

		// PUBLIC METHODS.
		function post(act, data, token, action, noLoader) {

			if(!noLoader){
				$('#loader-overlay').fadeIn('fast');
			}

			//console.log(REQUEST_BY_AJAX);

			if(!action) {
				action = 'inserir';
			}

			var roles = getRoles(action);

			var request = $http({
				method: "POST",
				url: BASE_URL + act,
				data: data,
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest',
					'X-WSSE' : token,
					'Roles' : roles
				}
			});


			return(request.then(handleSuccess, handleError));
		}

		function put(act, data, token, action) {

			$('#loader-overlay').fadeIn('fast');

			if(!action) {
				action = 'atualizar';
			}

			var roles = getRoles(action);

			var request = $http({
				method: "PUT",
				url: BASE_URL + act,
				data: data,
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest',
					'X-WSSE' : token,
					'Roles' : roles
				}
			});

			return(request.then(handleSuccess, handleError));
		}

		function excluir(act, token) {

			$('#loader-overlay').fadeIn('fast');

			var roles = getRoles('deletar');

			var request = $http({
				method: "DELETE",
				url: BASE_URL + act,
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest',
					'X-WSSE' : token,
					'Roles' : roles
				}
			});

			return(request.then(handleSuccess, handleError));
		}

		function get(act, params, token, noLoader) {

			if(!noLoader){
				$('#loader-overlay').fadeIn('fast');
			}

			var roles = getRoles('ver');
			var request = $http({
				method: "get",
				url: BASE_URL + act,
				params: params,
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest',
					'X-WSSE' : token,
					'Roles' : roles
				}
			});

			return(request.then(handleSuccess, handleError));
		}

		function getApi(act, params, token, noLoader) {

			if(!noLoader){
				$('#loader-overlay').fadeIn('fast');
			}

			var roles = getRoles(action);

			var request = $http({
				method: "get",
				url: act,
				params: params,
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest',
					'X-WSSE' : token,
					'Roles' : roles
				}
			});

			return(request.then(handleSuccess, handleError));
		}

		function getApiExterna(act, params, noLoader) {

			if(!noLoader){
				$('#loader-overlay').fadeIn('fast');
			}

			var request = $http({
				method: "get",
				url: act,
				params: params,
				headers: {
					'Content-Type': 'application/json'
				}
			});

			return(request.then(handleSuccess, handleError));
		};
        }

