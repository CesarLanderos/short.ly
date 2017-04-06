<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UrlHashService;
use App\Url as UrlModel;
use App\Domain as DomainModel;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('index');
    }

    public function shortenUrl(Request $request)
    {
        $urlString = $request->url;

        // clean from extra slashes
        $urlString = trim($urlString, '/');

        // if povided url does not have the http protocol, add it
        if (count(explode('://', $urlString)) === 1) {
            $urlString = 'https://' . $urlString;
        }

        if (!filter_var($urlString, FILTER_VALIDATE_URL)) {
            return view('index', [
                'isNotValidUrl' => true,
                'invalidUrl' => $urlString,
            ]);
        }

        if ($request->has('new')) {
            $url = UrlModel::create([
                'url' => $urlString,
                'default' => 0,
            ]);

            $this->incrementDomainCount($urlString);
        } else {
            $url = UrlModel::where('url', $urlString)->where('default', 1)->first();

            if (is_null($url)) {
                $url = UrlModel::create([
                    'url' => $urlString,
                    'default' => 1,
                ]);

                $this->incrementDomainCount($urlString);
            }
        }

        return view('index', [
            'url' => $url,
        ]);
    }

    public function incrementDomainCount($urlString)
    {
        $urlInfo = parse_url($urlString);

        $domain = DomainModel::where('name', $urlInfo['host'])->first();

        if (is_null($domain)) {
            $domain = DomainModel::create([
                'name' => $urlInfo['host'],
                'number_of_records' => 0,
            ]);
        }

        $domain->increment('number_of_records');
    }

    public function listUrls()
    {
        return view('urlList', [
            'urls' => UrlModel::all(),
        ]);
    }

    public function listDomains()
    {
        return view('domainList', [
            'domains' => DomainModel::all(),
        ]);
    }

    public function resolveUrl($urlCode, UrlHashService $urlHasher, Request $request)
    {
        $urlToRedirect = $urlHasher->resolve($urlCode);

        if (!$urlToRedirect) {
            return view('index', [
                'urlNotFound' => true,
                'currentUrl' => url() . $request->getPathInfo(),
            ]);
        }

        return redirect($urlToRedirect);
    }
}
