<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($slug)
    {
        $quiz= Posts::getRecordWithSlug($slug);
        dd($quiz->title);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => ['required','image'],
        ]);

//        if (!$request->hasFile('ico')) {
//            return response()->json(['upload_file_not_found'], 400);
//        }
        $file = $request->file('image');
//        if (!$file->isValid()) {
//            return response()->json(['invalid_file_upload'], 400);
//        }
        $path = public_path() . '/uploads/posts/';
        $fileName = $file->getATime() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
        $path = '/uploads/posts/' . $fileName;

        $all = $request->all();
        $all['image'] = $path;
        $image = Image::make(public_path($path))->fit(1200);
        $image->save();
        dd(auth()->user('name'));
        $all['slug'] = makeSlug(auth()->user());//todo
        auth()->user()->posts->create($all);
        $user =auth()->user();
        return view('home');
//        return redirect($user->username);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $post= Posts::getRecordWithSlug($slug);
        $comments = Comments::getComments($post->id);

        return view('posts.show',compact(['post','comments']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
