angular.module('supertests')
    .controller('TesteController', function ($scope, $uibModal, $http, $location, $window) {

        var scope = $scope;

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
            var fields = [
                'id', 'name', 'age_range', 'birthday', 'cover', 'email', 'favorite_teams',
                'favorite_athletes', 'gender', 'context'
            ];
            FB.api('/me?fields=' + fields.join(','), function (response) {

                var sucessoLogin = function (result) {
                    if (result.status) {
                        $window.location.href = $window.location.href + '/l';
                    } else {
                        alert(result.result);
                    }
                };

                var errorLogin = function () {
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
                size: 'md',
                controller: function ($scope, $uibModalInstance) {

                    $scope.fecharModal = function () {
                        $uibModalInstance.close();
                    };

                    $scope.loginFacebook = scope.loginFacebook;
                    scope.fecharModal = $scope.fecharModal;
                }
            });
        };

    });