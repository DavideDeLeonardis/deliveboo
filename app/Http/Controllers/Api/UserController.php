<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Dish;
use App\User;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'response' => true,
            'results' => User::simplePaginate(18),
        ]);
    }

    public function searchCheckbox(Request $request)
    {
        $data = $request->all();

        $users = User::where('id', '>=', 1);

        if (array_key_exists('categories', $data)) {
            $users->whereHas('categories', function (Builder $query) use ($data) {
                $query->whereIn('name', $data['categories']);
            });
        }

        return response()->json([
            'response' => true,
            'results' => [
                'data' => $users->with(['categories'])->get(),
            ],
        ]);
    }

    public function searchInput(Request $request)
    {
        $data = $request->all();

        $users = User::where('id', '>=', 1);



        return response()->json([
            'response' => true,
            'results' => [
                'data' => $users->get()
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        $dishes = Dish::where('user_id', '=', $user->id)->get();

        return response()->json([
            'response' => true,
            'count' => $user ? 1 : 0,
            'results' => [
                'user' => $user,
                'dishes' => $dishes
            ]
        ]);
    }
}
