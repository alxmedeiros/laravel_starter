angular.module('shopApp', [])
.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
})
.controller('CartCtrl', function($scope) {

    console.log( 'Teste' );

    let cart = this;

    $scope.yourName = 'alexandre';

    cart.cartItems = [];
    cart.teste = 'blablabla';

    $scope.varTeste = '1234';

    console.log( cart.cartItems );

});