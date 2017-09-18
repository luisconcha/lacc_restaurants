<?php
/**
 * File: Restaurant.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 10/09/17
 * Time: 23:05
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Restaurant extends Model
{
    protected $path = 'app/restaurant/';

    protected $fillable = ['name', 'description', 'photo'];

    protected $appends = ['photo_full_url'];

    protected function getPhotoFullUrlAttribute()
    {
        if ($this->attributes['photo']) {
            return Storage::url($this->path . $this->photo);
        }

        return null;
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

}