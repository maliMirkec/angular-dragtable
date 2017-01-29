(function(DemoApp) {

  'use strict';

  var controller = ['$scope'];

  controller.push(function($scope) {});

  angular.module('DemoApp')
    .controller('DemoController', controller);

}(this));
