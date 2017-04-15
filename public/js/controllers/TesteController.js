angular.module('supertests')
    .controller('TesteController', function ($scope, $uibModal, $http, $location, $window) {

        var scope = $scope;

        /**
         * Status de carregamento do teste
         * @type {boolean}
         */
        $scope.loading = false;

        /**
         * Status de login do usuário no facebook
         * @type {boolean}
         */
        $scope.connected = false;

        /**
         * Checa se o usuário está conectado ao facebook
         * para realização dos testes
         */
        $scope.checkConnection = function () {
            angular.element(document).ready(function () {
                FB.getLoginStatus(function (response) {
                    $scope.connected = (response.status === 'connected');
                });
            });
        };

        /**
         * Chamado ao usuário clicar no botão INICIAR TESTE
         */
        $scope.iniciar = function () {
            if ($scope.connected && $window.logado) {
                $scope.loading = true;
                $scope.realizarTeste();
            } else {
                $scope.abrirModal();
            }
        };

        /**
         * Inicia a realização do teste
         * este método só é chamado se o usuário
         * estiver logado no facebook
         */
        $scope.realizarTeste = function () {
            $window.location.href = $window.location.href + '/l';
        };

        /**
         * Realiza o login no site
         */
        $scope.loginSite = function () {
            $scope.loading = true;
           /* var fields = [
                'id', 'name', 'age_range', 'birthday', 'cover', 'email', 'favorite_teams',
                'favorite_athletes', 'gender', 'context'
            ];*/

            var fields = [
                'id', 'name', 'age_range', 'cover', 'email', 'gender', 'context'
            ];
            FB.api('/me?fields=' + fields.join(','), function (response) {

                var sucessoLogin = function (result) {
                    if (result.status) {
                        $window.location.href = $window.location.href + '/l';
                    } else {
                        $scope.loading = false;
                        alert(result.result);
                    }
                };

                var errorLogin = function () {
                    $scope.loading = false;
                    $scope.abrirModal();
                    alert('Ocorreu um erro ao fazer login, tente novamente.');
                };

                $http.post('/login', response)
                    .then(sucessoLogin, errorLogin);
            });
        };

        /**
         * Realiza o login no facebook via JS SDK
         */
        $scope.loginFacebook = function () {
            FB.login(function (response) {
                if (response.authResponse) {
                    $scope.fecharModal();
                    $scope.loginSite();
                }
            }, {scope: 'email'});
        };

        /**
         * Abre a modal com o botão de conectar ao facebook
         */
        $scope.abrirModal = function () {
            $uibModal.open({
                animation: false,
                templateUrl: 'conectar_facebook.html',
                size: 'sm',
                controller: function ($scope, $uibModalInstance) {

                    $scope.fecharModal = function () {
                        $uibModalInstance.close();
                    };

                    $scope.loginFacebook = scope.loginFacebook;
                    scope.fecharModal = $scope.fecharModal;
                }
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