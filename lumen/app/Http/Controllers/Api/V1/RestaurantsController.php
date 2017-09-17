<?php
/**
 * File: RestaurantsController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 10/09/17
 * Time: 23:08
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\ApiControllerTrait;
use App\Restaurant;
use Laravel\Lumen\Routing\Controller;

class RestaurantsController extends Controller
{

    use ApiControllerTrait;

    protected $model;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required'
    ];

    protected $messages = [
        'required' => ':attribute é obrigatório',
        'min' => ':attribute precisa de pelo menos :min caracteres'
    ];

    public function __construct(Restaurant $model)
    {
        $this->model = $model;
    }

}