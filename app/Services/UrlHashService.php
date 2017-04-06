<?php

namespace App\Services;

use Cache;
use App\Url;

class UrlHashService
{
    // this helps us to get hashes with a length of at least 4 characters
    protected $salt = 1000000;

    /**
     * creates a new hash for a url to shorten
     */
    public function make($id)
    {
        return base_convert($id + $this->salt, 10, 36);
    }

    /**
     * search for the url that corresponds to the provided hash code, returns
     * false if there is no url with that hash code
     */
    public function resolve($code)
    {
        if (Cache::has($code)) {
            return Cache::get($code);
        }

        $url = Url::where('code', $code)->first();

        if (is_null($url)) {
            return false;
        }

        Cache::put($code, $url->url, 60);

        return $url->url;
    }
}
