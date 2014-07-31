(function(){
	angular.module('restaurantApp')
		.controller('indexController', function($scope){
			$scope.myInterval = 5000;
			$scope.slides = [
				{image: 'slider/slide1.jpg', title : 'Excellent atmosphere', text: 'We will make you feel pleasant and important'},
				{image: 'slider/slide2.jpg', title : 'Delicious food and drinks', text: 'Delicious food and drinks from aroud the world'},
				{image: 'slider/slide3.jpg', title : 'Great service', text: 'The guest is center of our universe'},
				{image: 'slider/slide4.jpg', title : 'Make reservation', text: 'Register for free and make reservation'}
			];
		})
})()