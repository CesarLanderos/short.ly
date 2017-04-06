<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'MainController@index');
$app->post('/', 'MainController@shortenUrl');
$app->get('all_urls', 'MainController@listUrls');
$app->get('all_domains', 'MainController@listDomains');
$app->get('{urlCode}', 'MainController@resolveUrl');
