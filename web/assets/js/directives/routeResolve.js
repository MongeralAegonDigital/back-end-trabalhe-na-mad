/**
 * Shows "loading" gif while a route is loading and handle some route errors.
 */
app.directive('routeResolve', ['$rootScope', '$location', function ($rootScope, $location) {
    return {
        restrict: 'E',
        replace: true,
        template: '<div><div class="loading" ng-if="isRouteLoading"></div></div>',
        link: function ($scope, elem, $attrs) {
            $scope.isRouteLoading = false;

            $rootScope.$on('$routeChangeStart', function () {
                $scope.isRouteLoading = true;
            });

            $rootScope.$on('$routeChangeSuccess', function () {
                $scope.isRouteLoading = false;
            });
            
            $rootScope.$on('$routeChangeError', function (e, $curRoute, $prevRoute, rejection) {
                if (rejection.status === 404) {
                    $location.path('/404');
                    $location.replace();
                }
                else if (rejection.status === 500) {
                    $location.path('/500');
                    $location.replace();
                }
            });
        }
    };
}]);