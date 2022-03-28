<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $validationParams = [
        'photo' => 'required|image',
        'name' => 'required',
        'email' => 'required',
        'address' => 'required|max:150',
        'phone' => 'required|max:15',
        'p_iva' => 'required|max:11',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.users.index', compact('user'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
            $img_path = Storage::put('uploads', $data['photo']);
            $user->photo = $img_path;
        }
        $user->update();

        return redirect()->route('admin.users.index', $user);
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
