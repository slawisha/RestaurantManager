(function(){
	angular.module('restaurantApp')
		.factory('reservationService', function($http){
			return{
				all: function(page){
					return $http.get('api/v1/reservations/?page=' + page);
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
				update: function(id, username, table, start, end, active){
					return $http({
						method: 'PUT',
						url: 'api/v1/reservations/' + id,
						params: {username:username, table:table, start: start, end: end, active:active}
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