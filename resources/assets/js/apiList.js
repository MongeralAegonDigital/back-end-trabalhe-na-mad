var app = angular.module('myApp', []);


app.controller('myCtrl', function($scope,$http) {

    $http.get('/admin/api')
        .success(function(data) {
            $scope.produtos = data;
        });

});