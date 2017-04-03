angular.module('supertests')
    .controller('TesteController', function ($scope, $uibModal) {

        var scope = $scope;
        $scope.loading = false;

        $scope.iniciar = function () {
            $scope.loading = true;
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {

                } else {
                    $scope.loading = false;
                    $scope.abrirModal();
                }
            });
        };

        $scope.loginFacebook = function() {
            FB.login(function(response) {
                if (response.authResponse) {
                    console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me', function(response) {
                        console.log('Good to see you, ' + response.name + '.');
                        $scope.fecharModal();
                    });
                }
            }, {scope: 'email'});
        };

        $scope.abrirModal = function () {
            $uibModal.open({
                animation: false,
                templateUrl: 'conectar_facebook.html',
                size: 'md',
                controller: function($scope, $uibModalInstance) {

                    $scope.fecharModal = function()
                    {
                        $uibModalInstance.close();
                    };

                    $scope.loginFacebook = scope.loginFacebook;
                    scope.fecharModal = $scope.fecharModal;
                }
            });
        };

    });