angular.module('supertests')
    .controller('ResultController', function ($scope, $http) {

        /**
         * Compartilha o resultado no facebook
         */
        $scope.shareFacebook = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: window.location.href
            }, function(response){

            });
        };

        /**
         * Carrega mais testes abaixo do teste atual
         */
        $scope.loadingtestes = true;
        $scope.testes = [];
        $scope.carregarTestes = function (active) {
            $http.get('/l')
                .then(function (json) {
                    $scope.loadingtestes = false;
                    for (var index in json.data) {
                        if (json.data[index].id != active) {
                            $scope.testes.push(json.data[index]);
                        }
                    }
                })
        };
    });
