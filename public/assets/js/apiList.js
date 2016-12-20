var app = angular.module('myApp', []);


app.controller('myCtrl', function($scope) {

    var teste =[
        {nome: 'liniker'},
        {nome: 'dominique'},
        {nome: 'mateus'}
    ];
    $scope.produtos = teste;
});