/**
 * Multiples the ng-model by 10 to work with ng-currency-mask.
 * 
 * From ng-currency-mask readme:
 * "Expects it to be an int, in cents. e.g.: 100 ($ 1), 420 ($ 4,20)"
 * 
 * See https://github.com/vtex/ng-currency-mask for more details.
 */
app.directive('currencyMaskNormalize', function () {
    return {
        require: 'ngModel',
        restrict: 'A',
        scope: {
            ngModel: '='
        },
        link: function ($scope, elem, $attrs, ngModel) {
            if ($scope.ngModel) {
                $scope.ngModel *= 100;
            }
        }
    };
});