<?php

use Illuminate\Http\Request;

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

$app->get('/', function () use ($app) {
    return view('index');
});

$app->post('/', function (Request $request) use ($app) {
    $url = \App\Url::where('url', $request->url)->first();

    if (is_null($url)) {
        $url = $request->url;

        // clean from extra slashes
        $url = trim($url, '/');

        // if povided url does not have the http protocol, add it
        if (!preg_match('#^http(s)?://#', $url)) {
            $url = 'http://' . $url;
        }

        $url = \App\Url::create([
            'url' => $url,
        ]);
    }

    return view('index', [
        'url' => $url,
    ]);
});

$app->get('all_urls', function () {
    return view('urlList', [
        'urls' => \App\Url::all(),
    ]);
});
