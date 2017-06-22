var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider, $interpolateProvider){
	$interpolateProvider.startSymbol('{[{').endSymbol('}]}');
	$routeProvider.
		when('/index', {
			templateUrl: '/bundles/restaurantapp/js/app/templates/index.html',
			controller: 'IndexController'
		}).
		when('/aboutus', {
			templateUrl: '/bundles/restaurantapp/js/app/templates/aboutus.html',
			controller: 'AboutusController'
		}).
		when('/contactus', {
			templateUrl: '/contactus/enquiry',
			controller: 'ContactusController as ctrl'
		}).
		when('/services', {
			templateUrl: '/bundles/restaurantapp/js/app/templates/services.html',
			controller: 'ServicesController'
		}).
		when('/vendorregistration', {
			templateUrl: '/bundles/restaurantapp/js/app/templates/vendorregistration.html',
			controller: 'VendorRegistrationController'
		}).
		when('/career', {
			templateUrl: '/bundles/restaurantapp/js/app/templates/career.html',
			controller: 'CareerController'
		}).
		when('/menu', {
			templateUrl: '/bundles/restaurantapp/js/app/templates/menu.html',
			controller: 'MenuController'
		}).
		otherwise({
			templateUrl: '/bundles/restaurantapp/js/app/templates/index.html',
			controller: 'IndexController'
		});
		
});