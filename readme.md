# Laravel 4 Pagoda Box Quickstart

Provides a Quickstart installation of Laravel 4 including a preconfigured MySQL database, automatic [Composer](http://getcomposer.org) package installation, and Laravel database migrations.

## Pagoda Box Installation

You can install the Quickstart either directly from the [Pagoda Box App Cafe](https://pagodabox.com/cafe/briankiewel/laravel-4), as a Quickstart through your Pagoda Box dashboard during the new application creation process, or by cloning the [GitHub repository](https://github.com/briankiewel/pagodabox-laravel-4) and pushing it to an empty Pagoda Box application repository.

## Local Development Installation

* Clone repository locally  
  `git clone git@github.com:briankiewel/pagodabox-laravel-4.git`
* If [Composer](http://getcomposer.org/) is not already installed locally, install it
* Install the Laravel dependencies  
  `composer install`
* Edit `bootstrap/start.php` and add your local machine's hostname to the `local` element in the `detectEnvironment` call parameter array
* Set your local web server to use the `public` folder as the document root

Last updated: 12/12/2013

---

## Laravel PHP Framework

[![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
