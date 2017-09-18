<?php
/**
 * File: AuthController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 17/09/17
 * Time: 23:14
 * Project: la_restaurants
 * Copyright: 2017
 */

namespace App\Http\Controllers\Api\V1;


use App\User;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function me(Request $request)
    {
        $user = User::where('id', $request->user()->id)
            ->with(['restaurant'])
            ->first();

        return response()->json($user);
    }
}