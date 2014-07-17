(function(){
	angular.module('restaurantApp')
		.controller('indexController', function($scope){
			$scope.myInterval = 5000;
			$scope.slides = [
				{image: 'slider/slide1.jpg', title : 'Excellent atmosphere', text: 'Log in and make reservation'},
				{image: 'slider/slide2.jpg', title : 'Delicious food and drinks', text: 'Log in and make reservation'},
				{image: 'slider/slide3.jpg', title : 'Great service', text: 'Log in and make reservation'},
				{image: 'slider/slide4.jpg', title : 'Make reservation', text: 'Log in and make reservation'}
			];
		})
})()