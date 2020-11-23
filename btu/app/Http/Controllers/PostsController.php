<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
class PostsController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
////        $posts = DB::select('SELECT * FROM posts');
////        $posts = Post::orderBy('title', 'asc')->take(1)->get();
////        $posts = Post::orderBy('title', 'asc')->get();
//        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
//
//        return view('posts.index')->with('posts', $posts);
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        return view('posts.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'title' => 'required',
//            'body' => 'required'
//        ]);
//        $post = new Post;
//        $post->title = $request->input('title');
//        $post->body = $request->input('body');
//        $post->save();
//        return redirect('/posts')->with('success', 'Post Published');
//
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $post = Post::find($id);
//        return view('posts.show')->with('post', $post);
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        $post = Post::find($id);
//        return view('posts.edit')->with('post', $post);
//
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'title' => 'required',
//            'body' => 'required'
//        ]);
//        $post = Post::find($id);
//        $post->title = $request->input('title');
//        $post->body = $request->input('body');
//        $post->save();
//        return redirect('/posts')->with('success', 'Post Updated');
//
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $post = Post::find($id);
//        $post->delete();
//        return redirect('/posts')->with('success', 'Post Deleted');
//    }
//}
{

    public function show() {
        $posts = DB::table("posts")
            ->join("users", "posts.user_id", "=", "users.id")
            ->get();
        return view("list", compact("posts"));
    }

    public function deleteById($id) {
        Post::findOrFail($id)->delete();
        return Redirect::back();
    }


    public function create() {
        return view("create");
    }


    public function createPostRecord(Request $request) {

        $post = new Post();
        $post->title = $request->get("news_title");
        $post->text = $request->get("news_text");
        $post->user_id = Auth::id();
        $post->save();


        return Redirect::back()->with("message", "added");
    }


    public function update($id) {
        $post = Post::find($id);
        // dd($post);
        return view("update", compact("post"));
    }


    public function updateRecord(Request $request) {
        $post = Post::find($request->get("id"));
        $post->title = $request->get("news_title");
        $post->text = $request->get("news_text");
        $post->save();
        return Redirect::back()->with("message", "updated");
    }

    public function ownPosts() {
        $posts = Post::all()->where('user_id', Auth::id());
        $author = User::find(Auth::id());
        return view('my', compact('posts', 'author'));
    }


}
