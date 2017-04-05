<?php

namespace App\Services;

class UrlHashService
{
    // this helps us to get hashes with a length of at least 4 characters
    protected $salt = 1000000;

    public function make($id)
    {
        return base_convert($id + $this->salt, 10, 36);
    }
}
