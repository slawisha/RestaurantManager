(function(){
	angular.module('restaurantApp')
		.factory('reservationService', function($http){
			return{
				all: function(){
					return $http.get('api/v1/reservations');
				},
				create: function(tableId, day, month , year, time){
					return $http({
						method: 'POST',
						url: 'api/v1/reservations',
						params: {table_id: tableId, day:day, month:month, year:year, time:time}
					});
				},
				check: function(day,month,year,time){
					return $http({
						method: 'POST',
						url: 'api/v1/reservations/check',
						params: {day:day, month:month, year:year, time:time}
					});
				}
			}
			
		});
})();