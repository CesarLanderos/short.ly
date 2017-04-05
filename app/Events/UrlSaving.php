<?php

namespace App\Events;

use App\Url;

class UrlSaving extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
    }
}
