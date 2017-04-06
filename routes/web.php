<?php

use Illuminate\Http\Request;
use App\Services\UrlHashService;

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
    $urlString = $request->url;

    // clean from extra slashes
    $urlString = trim($urlString, '/');

    // if povided url does not have the http protocol, add it
    if (!count(explode('://', $urlString)) === 1) {
        $urlString = 'https://' . $urlString;
    }

    if (!filter_var($urlString, FILTER_VALIDATE_URL)) {
        return view('index', [
            'isNotValidUrl' => true,
            'invalidUrl' => $urlString,
        ]);
    }

    $url = \App\Url::where('url', $urlString)->first();

    if (is_null($url)) {
        $url = \App\Url::create([
            'url' => $urlString,
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

$app->get('{urlCode}', function ($urlCode, UrlHashService $urlHasher, Request $request) use ($app) {
    $urlToRedirect = $urlHasher->resolve($urlCode);

    if (!$urlToRedirect) {
        return view('index', [
            'urlNotFound' => true,
            'currentUrl' => url() . $request->getPathInfo(),
        ]);
    }

    return redirect($urlToRedirect);
});
