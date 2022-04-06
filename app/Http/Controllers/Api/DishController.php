<?php

namespace App\Http\Controllers\Api;

use App\Model\Dish;
use App\Http\Resources\DishResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request){
        
        $dishes = Dish::all();

        // return response()->json($dishes, 200);
        return DishResource::collection($dishes);
    }
}
