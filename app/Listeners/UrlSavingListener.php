<?php

namespace App\Listeners;

use App\Events\UrlSaving;
use App\Services\UrlHashService;

class UrlSavingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UrlHashService $urlHasher)
    {
        $this->urlHasher = $urlHasher;
    }

    /**
     * Handle the event.
     *
     * @param  UrlSaving  $event
     * @return void
     */
    public function handle(UrlSaving $event)
    {
        $event->url->code = $this->urlHasher->make($event->url->id);
        $event->url->save();
    }
}
