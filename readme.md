## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

#Critical step if using on C9 IDE: 
$sudo nano /etc/apache2/sites-enabled/001-cloud9.conf
# Change DocumentRoot to 'DocumentRoot /home/ubuntu/workspace/public'

# Chap 7 -
#Create MIgration
$php artisan migrate
#Access db sqlite3 - point a path to the db file
$sqlite3 storage/database.sqlite
>.tables // shows tables
>.schema //shows schema

#If a rollback fails, usually due to a down action in migration file, try this from app path directory (e.g. learning-laravel-5): 
$composer require doctrine/dbal
#then as usual try again:
$php artisan migrate:rollback

#update Model then

#Manually add to sqlite3 db via tinker
$php artisan tinker
>$article = new App\Article //creates article object
>$article; //checks
>$article->title = 'My first article'; //adds title
>$article->body = 'Lorem' //adds body text
>$article->published_at = Carbon\Carbon::now();  //uses carbon package to gerenate time stamp for now
>$article; //check
>$article->toArray();  //checks to see what is in the array
>$article->save(); //save
>App\Article::all()->toArray();  //shows table contents casts it to an array
# Update the db via tinker - Model.php curerntly configured to have non-null for all table elelments; all need to be updated regardless of need.
>$article->title = 'Updated 1st article'; 
>$article->body = 'Body updated 1st article';
>$article->published_at = Carbon\Carbon::now();
>$article->save(); //should register true
>$article = App\Article::find(3);  // finds 3rd entry

SQLITE
$sqlite3 storage/database.sqlite
>select * from articles; ///another way to see if db was updated; shows updated tables updated via tinker or otherwise


#To generate a create new articles function
#create routes: 
Route::get('articles/create', 'ArticlesController@create');
#Add a create public function to Article Controller
return view('articles.create');
# Gen views/articles/articles.blade.php
#@extends('app')....
#To add a function for <form> generation optional
$composer require illuminate/html  

#app/config/app.php has important config - adding illuminate/html to provides in app.php
'Form'      => 'Illuminate\Html\FormFacade\Form',
'Html'      => 'Illuminate\Html\HtmlFacade\Html',


# make sure that composer.json requires illuminate/html ex below:
{
    "require": {
        "phpspec/phpspec": "^2.2",
        "doctrine/dbal": "^2.5"
        "illuminate/html": "5.*"
    }
}
#then run
$composer update

#Articles Controller use:
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;