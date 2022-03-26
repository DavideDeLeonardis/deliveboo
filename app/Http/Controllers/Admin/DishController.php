<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Model\Dish;
use App\Model\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{

    protected $validationParams = [
        'name' => 'required|max:100',
        'description' => 'required|max:2000',
        'ingredients' => 'required',
        'image' => 'nullable|image',
        'price' => 'required|numeric',
        'availability' => 'required',
        'course' => 'required|max:25',
    ];

    public function index()
    {
        $dishes = Dish::where('user_id', Auth::user()->id)->paginate(15);
        return view('admin.dishes.index', compact('dishes'));
    }

    public function show(Dish $dish)
    {
        return view('admin.dishes.show', ['dish' => $dish]);
    }

    public function create()
    {
        $courses = [
            'Primo',
            'Secondo',
            'Pizza',
            'Frutta',
            'Dolce',
            'Bibite',
        ];
        return view('admin.dishes.create', ['courses' => $courses]);
    }

    public function edit(Dish $dish)
    {
        $courses = [
            'Primo',
            'Secondo',
            'Pizza',
            'Frutta',
            'Dolce',
            'Bibite',
        ];
        return view('admin.dishes.edit', ['dish' => $dish, 'courses' => $courses]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validationParams);
        $data = $request->all();
<<<<<<< HEAD
        // dd($data);
=======
>>>>>>> parent of 4e2bfa3 (pulizia codice)
        $data['user_id'] = Auth::user()->id;

        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads', $data['image']);
            $data['image'] = $img_path;
        }
        if ($data['availability'] === 'on') {
            $data['availability'] = 1;
        } else {
            $data['availability'] = 0;
        }

        $dish = new Dish();
        $dish->fill($data);
        $dish->image = $data['image'];
        $dish->user_id = $data['user_id'];
        $dish->save();

        return redirect()->route('admin.dishes.show', $dish);
    }

    public function update(Request $request, Dish $dish)
    {
        $request->validate($this->validationParams);
        $data = $request->all();
        if (Auth::user()->id != $dish->user_id) {
            abort('403');
        }
        if ($data['name'] != $dish->name) {
            $dish->name = $data['name'];
        }
        if ($data['description'] != $dish->description) {
            $dish->description = $data['description'];
        }
        if ($data['ingredients'] != $dish->ingredients) {
            $dish->ingredients = $data['ingredients'];
        }
        if ($data['price'] != $dish->price) {
            $dish->price = $data['price'];
        }
        if ($data['availability'] != $dish->availability) {
            if ($data['availability'] === 'on') {
                $data['availability'] = 1;
            } else {
                $data['availability'] = 0;
            }
            $dish->availability = $data['availability'];
        }
        if ($data['course'] != $dish->course) {
            $dish->course = $data['course'];
        }
        if (!empty($data['image'])) {
            Storage::delete($dish->image);
            $img_path = Storage::put('uploads', $data['image']);
            $dish->image = $img_path;
        }
        $dish->update();

        return redirect()->route('admin.dishes.show', $dish);
    }

    public function destroy(Dish $dish)
    {
        $dish->orders()->detach();
        $dish->delete();
        return redirect()
            ->route('admin.dishes.index')
            ->with('status', "Hai eliminato il piatto '$dish->name'");
    }
}
