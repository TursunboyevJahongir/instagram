<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['profile']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($username)
    {
        $user = User::where('username',$username)->first();
        return view('profile',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'nullable',
            'username' => 'nullable',
            'avatar' => 'nullable|mimes:jpeg,bmp,png,jpg|image',
            'email' => 'nullable',
            'title' => 'nullable',
            'url' => 'nullable',
            'description' => 'nullable',
        ]);
//        dd($request->avatar);
        $all = $request->all();
        if ($request->file('avatar')) {
            @unlink(public_path() . $user->avatar);
//            if (!$request->hasFile('avatar')) {
//                return response()->json(['upload_file_not_found'], 400);
//            }
            $file = $request->file('avatar');
//            if (!$file->isValid()) {
//                return response()->json(['invalid_file_upload'], 400);
//            }
            $path = public_path() . '/uploads/users/';
            $fileName = $file->getATime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $path = '/uploads/users/' . $fileName;

            $all['avatar'] = $path;
            $avatar = Image::make(public_path($path))->fit(300);
            $avatar->save();
//        $data = User::create($all);
        }
        $user->update($all);
//        dd($all);
        return view('home');
//
//        return response()->json([
//            'message' => 'Great success! User updated',
//            'data' => $id,
//        ]);
    }

    public function passwordGet(User $user)
    {
        return view('user.password', compact('user'));
    }

    public function passwordPost(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
