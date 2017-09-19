/**
 * Checks if two variables are equals.
 */
app.directive('validateEqualsTo', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        scope: {
            equalsTo: '='
        },
        link: function($scope, elem, $attrs, ngModel) {
            ngModel.$validators.equalsTo = function (modelValue) {
                if (!modelValue) {
                    return true;
                }
                return angular.equals(modelValue, $scope.equalsTo);
            };
        }
    };
});