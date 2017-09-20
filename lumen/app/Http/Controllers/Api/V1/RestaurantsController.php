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


use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

use App\Address;
use App\Http\Controllers\ApiControllerTrait;
use App\Restaurant;

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

    protected $relationships = ["address"];

    public function address(Request $request, $id)
    {
        $restaurant = $this->model->findOrFail($id);
        $address = $restaurant->address;

        if (!$address) {
            $address = Address::create($request->all());
        } else {
            $address->update($request->all());
        }

        $restaurant->address()->save($address);

        return response()->json($address);
    }

    public function upload(Request $request, $id)
    {
        $result = $this->model->findOrFail($id);
        $data['photo'] = $request->file('photo');
        
        $result->update($data);

        return response()->json($result);
    }

}