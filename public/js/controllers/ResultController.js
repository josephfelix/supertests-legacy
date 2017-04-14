angular.module('supertests')
    .controller('ResultController', function ($scope) {
        $scope.shareFacebook = function () {
            alert('Compartilhar!');
        };
    });
