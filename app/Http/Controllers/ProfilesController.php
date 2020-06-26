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
     * Follow the user.
     *
     * @param $profileId
     *
     */
    public function followUser(int $profileId)
    {
        $user = User::find($profileId);
        if(! $user) {
            return redirect()->back()->with('error', 'User does not exist.');
        }

        $user->followers()->attach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully followed the user.');
    }

    /**
     * Follow the user.
     *
     * @param $profileId
     *
     */
    public function unFollowUser(int $profileId)
    {
        $user = User::find($profileId);
        if(! $user) {

            return redirect()->back()->with('error', 'User does not exist.');
        }
        $user->followers()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile($username)
    {
//        $followers = (auth()->user())
        $user = User::where('username',$username)->first();
        $followers = $user->followers;
        $followings = $user->followings;
        return view('profile',compact('user','followers' , 'followings'));
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
        $all = $request->all();
        if ($request->file('avatar')) {
            @unlink(public_path() . $user->avatar);
            $file = $request->file('avatar');
            $path = public_path() . '/uploads/users/';
            $fileName = $file->getATime() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $path = '/uploads/users/' . $fileName;

            $all['avatar'] = $path;
            $avatar = Image::make(public_path($path))->fit(300);
            $avatar->save();
        }
        $user->update($all);
        return view('home');
    }
    //todo
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
