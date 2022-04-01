<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        $data = $request->all();

        $users = User::where('id', '>=', 1);

        if (array_key_exists('categories', $data)) {
            foreach ($data['categories'] as $category) {
                $users->whereHas('categories', function (Builder $query) use ($category) {
                    $query->where('name', '=', $category);
                });
            }
        }

        $users = $users->with(['categories'])->get();

        return response()->json([
            'response' => true,
            'results' => [
                'data' => $users,
            ],
        ]);
    }
}
