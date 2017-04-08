angular.module('supertests')
    .controller('LoadingController', function ($scope, $http, $window) {
        $scope.makeTest = function (guid) {
            var success = function (result) {
                $window.location.href = '/t/' + guid + '/r/' + result.data.hash;
            };

            var failure = function () {

            };

            $http.post('/t/' + guid + '/m')
                .then(success, failure);
        };
    });
