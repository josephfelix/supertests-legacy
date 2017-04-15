angular.module('supertests')
    .controller('ResultController', function ($scope, $http) {

        /**
         * Compartilha o resultado no facebook
         */
        $scope.shareFacebook = function () {
            alert('Compartilhar!');
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
