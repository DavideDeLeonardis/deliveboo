<?php

namespace App\Http\Controllers\Admin;

use App\Model\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {   
        $dishes = Dish::paginate(15);
        return view('admin.dishes.index', compact('dishes'));
    }
}
