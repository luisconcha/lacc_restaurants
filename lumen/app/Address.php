<?php
/**
 * File: Address.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 17/09/17
 * Time: 23:57
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'cep', 'address', 'number', 'state', 'city', 'neighborhood', 'complement', 'restaurant_id'
    ];
}