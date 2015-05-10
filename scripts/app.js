'use strict';

/**
 * @ngdoc overview
 * @name fortuneApp
 * @description
 * # fortuneApp
 *
 * Main module of the application.
 */
angular
  .module('fortuneApp', [
    'ngAnimate',
    'ngAria',
    'ngCookies',
    'ngMessages',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/cam', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
      })
      .when('/', {
        templateUrl: 'views/pixel.html',
        controller: 'PixelCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
