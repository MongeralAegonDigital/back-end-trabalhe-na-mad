/**
 * Checks if the CPF is valid.
 */
app.directive('validateCpf', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function($scope, elem, $attrs, ngModel) {
            ngModel.$validators.cpf = function (modelValue, viewValue) {
                if (!modelValue) {
                    return true;
                }
                
                var numbers = modelValue.replace(/[^0-9]+/g, '');
                
		if (numbers.length !== 11 ||
                    numbers == '00000000000' ||
                    numbers == '11111111111' ||
                    numbers == '22222222222' ||
                    numbers == '33333333333' ||
                    numbers == '44444444444' ||
                    numbers == '55555555555' ||
                    numbers == '66666666666' ||
                    numbers == '77777777777' ||
                    numbers == '88888888888' ||
                    numbers == '99999999999') {
                    return false;
		}
		
		var i;
                var j;
		var d1 = 0;
                var d2 = 0;
		for (i = 0, j = 11; i <= 8; i++, j--) {
                    d1 += numbers[i] * (j-1);
                    d2 += numbers[i] * j;
		}
		d2 += numbers[i] * j;
		
		var c1 = d1%11 < 2 ? 0 : 11-(d1%11);
		var c2 = d2%11 < 2 ? 0 : 11-(d2%11);
		return !(c1 != numbers[9] || c2 != numbers[10]);
            };
        }
    };
});