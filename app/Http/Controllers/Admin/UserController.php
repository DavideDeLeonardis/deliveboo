<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $validationParams = [
        'photo' => 'nullable|image',
        'name' => 'required',
        'email' => 'required',
        'address' => 'required|max:150',
        'phone' => 'required|max:15',
        'p_iva' => 'required|max:11',
        'categories.*' => 'required|exists:App\Model\Category,id',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', ['user' => User::where('id', Auth::user()->id)->first()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        if (Auth::user()->id != $user->id) {
            abort('403');
        }

        $data = [
            'categories' => Category::all(),
            'user' => $user,
        ];

        return view('admin.user.edit', $data);
    }

    public function my_edit()
    {   
        $user = Auth::user();
        $categories = Category::all();

        return view('admin.my_edit',[ 'user' => $user, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate($this->validationParams);
        $data = $request->all();
        if (Auth::user()->id != $user->id) {
            abort('403');
        }
        if ($data['name'] != $user->name) {
            $user->name = $data['name'];
        }
        if ($data['email'] != $user->email) {
            $user->email = $data['email'];
        }
        if ($data['address'] != $user->address) {
            $user->address = $data['address'];
        }
        if ($data['phone'] != $user->phone) {
            $user->phone = $data['phone'];
        }
        if ($data['p_iva'] != $user->p_iva) {
            $user->p_iva = $data['p_iva'];
        }
        if (!empty($data['photo'])) {
            Storage::delete($user->photo);
            $user->photo = Storage::put('uploads', $data['photo']);
        }
        $user->update();

        if (!empty($data['categories'])) {
            $user->categories()->sync($data['categories']);
        } else {
            $user->categories()->detach();
            // return redirect()->route('admin.users.edit', $user);
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
