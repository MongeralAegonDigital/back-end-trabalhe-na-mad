/**
 * Checks if the CPF already exists in database.
 */
app.directive('validateUniqueCpf', ['$http', '$q', function($http, $q) {
    return {
        restrict: 'A',
        require: 'ngModel',
        scope: {
            client: '='
        },
        link: function($scope, elem, $attrs, ngModel) {
            ngModel.$asyncValidators.uniqueCpf = function (modelValue, viewValue) {
                if (!modelValue) {
                    return true;
                }
                
                return $http.get('api/clients?cpf=' + modelValue).then(function (response) {
                    if (response.data.length === 0) {
                        return true;
                    } else if (response.data[0].id === $scope.client.id) {
                        return true;
                    } else {
                        return $q.reject('CPF já cadastrado.');
                    }
                });
            };
        }
    };
}]);