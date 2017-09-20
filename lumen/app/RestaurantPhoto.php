<?php
/**
 * File: RestaurantPhoto.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 20/09/17
 * Time: 00:36
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RestaurantPhoto extends Model
{
    protected $path = 'app/restaurant_photo/';

    protected $fillable = ['url', 'restaurant_id'];

    protected $appends = ['full_url'];

    public $timestamps = false;

    protected function getFullUrlAttribute()
    {
        if ($this->attributes['url']) {
            return Storage::url($this->path . $this->photo);
        }

        return null;
    }
}
