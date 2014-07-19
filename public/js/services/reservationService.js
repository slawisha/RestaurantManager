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
				show: function(id){
					return $http.get('api/v1/reservations/' +  id);
				},
				update: function(id, username, table, start, end){
					return $http({
						method: 'PUT',
						url: 'api/v1/reservations/' + id,
						params: {username:username, table:table, start: start, end: end}
					});
				},
				delete: function(id){
					return $http({
						method: 'DELETE',
						url: 'api/v1/reservations/' + id
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