/**
 * Converts a string to Date inside a date input.
 */
app.directive('dateNormalize', function () {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function ($scope, elem, $attrs, ngModel) {
            ngModel.$formatters.push(function (value) {
                if (value) {
                    return new Date(value);
                } else {
                    return null;
                }
            });
        }
    };
});