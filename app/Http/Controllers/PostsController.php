<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //追記

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    //helloメソッドを追加しました
    public function hello()
    {
        echo 'Hello World!!<br>';
        echo 'コントローラーから';
    }

    //indexメソッドを追加しました

    public function index()
    {
        $list = DB::table('posts')->get();
        return view('posts.index', ['list' => $list]);
    }

    // ↓クラスの中に追加してください
    public function createForm()
    {
        return view('posts.createForm');
    }


    public function create(Request $request)
    {
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'post' => $post
        ]);
        return redirect('/index');
    }

    public function updateForm()
    {
        $post = DB::table('posts')
            ->where('id', 1)
            ->first();
        return view('posts.updateForm', compact('post'));
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );
        return redirect('/index');
    }


    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/index');
    }
}
