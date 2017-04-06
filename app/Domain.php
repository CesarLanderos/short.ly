<?php

namespace App;

use App\Events\UrlSaving;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number_of_records',
    ];
}
