<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Posts;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request,$slug){
        $post = Posts::getRecordWithSlug($slug);
        $request->validate([
            'comment' => 'required',
        ]);
        $data['post_id'] = $post->id;
        $data['comment'] = $request['comment'];

        auth()->user()->comments()->create($data);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Comments $id)
    {
        $id->delete();
        return redirect()->back();
    }
}
