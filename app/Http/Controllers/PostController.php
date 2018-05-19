<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\RemoveBadWords;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts=Post::all();
        $title='Posts';
        return view('posts.index', compact('title','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input=$request->all();
        $user=Auth::user();
        $input['user_id']=$user->id;

        $pipes = [
            RemoveBadWords::class
        ];
        $post = app(Pipeline::class)
            ->send($input)
            ->through($pipes)
            ->then(function ($input) {
                return Post::create($input);
            });


        Session::flash('post_change','Post has been successfully created!');
        return redirect('posts/'.$post->id);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);



        return view('posts.show', compact('post'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $category=Category::pluck('name','id')->all();

        return view('posts.edit',compact('post','category'));
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


        $post = Post::findOrFail($id);

        $input = $request->all();


        $post->update($input);
        Session::flash('post_change', 'The post has been successfully updated!');
        return redirect('posts/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        Session::flash('post_change','The post has been successfully deleted!');
        $post->delete();
        return redirect('posts');
    }

}
