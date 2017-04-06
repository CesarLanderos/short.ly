<?php

namespace App;

use App\Events\UrlSaving;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'default', 'code', 'url',
    ];

    /**
     * The events registered in the model.
     *
     * @var array
     */
    protected $events = [
        'created' => UrlSaving::class,
    ];
}
