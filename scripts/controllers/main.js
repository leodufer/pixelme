'use strict';

/**
 * @ngdoc function
 * @name fortuneApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the fortuneApp
 */
angular.module('fortuneApp')
  .controller('MainCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
