# [Restaurant Manager Web App](restaurantmanager.gopagoda.com)

Web app for managing reservations for a restaurant (or hotel) built in [Laravel 4](http://laravel.com) and [AngularJs](https://angularjs.org) using hybrid approach. Demo of this app can be found [here](http://restaurantmanager.gopagoda.com).

## Local Instalation 
Clone the repo and cd into the directory, then run composer install form the command line. After installation has finished run php artisan serve from the command line. The App uses sqlite in development enviroment. You should browse the app at:
	
	localhost:8000

## Production istalation
You are free to install and use this app for production (See LICENCE.md). You need to set following enviroment variables to your production server:
	
	ADM_USER - Administrator username
	ADM_EMAIL - Administrator email 
	ADM_PASS - Administrator password
	APP_EMAIL - Application email account (Needed for password recovery)
	APP_EMAIL_PASS - Application email account's password (Needed for password recovery)
	ENV - Application enviroment should be set to production
	DB_USER - Database username
	DB_HOST - Database host
	DB_NAME - Database name
	DB_PASS - Database pass

##Screenshots
![alt text](https://github.com/slawisha/RestaurantManager/blob/master/restMan0.jpg")

![alt text](https://github.com/slawisha/RestaurantManager/blob/master/restMan1.jpg")

![alt text](https://github.com/slawisha/RestaurantManager/blob/master/restMan2.jpg")


## Todo
Implement orders
	

