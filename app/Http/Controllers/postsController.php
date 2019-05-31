<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if(Auth::user()){
            return redirect('/notes');
        }
        else{
            return view('index');
        }
    }
    public function index()
    {
        if(Auth::user()){
            $id=Auth::user()->id;
            $posts=Post::where('userId',$id)->orderBy('updated_at','desc')->paginate(5);
            return view('posts.home')->with('posts',$posts);
        }
        else{
            return redirect('/');
        }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        $note=new Post;
        $note->title=$request->input('title');
        $note->body=$request->input('body');
        $note->userId=Auth::user()->id;
        $note->save();
        return redirect('/notes')->with('success','Note saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            return redirect('/');
        }
        if(Auth::user()){
            $userId=Auth::user()->id;
            if($userId==$post->userId){
                return view('posts.show')->with('post',Post::find($id));
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post=Post::find($id);
        if($post==null)
        {
            return redirect('/');
        }
        if(Auth::user()){
            $userId=Auth::user()->id;
            if($userId==$post->userId){
                return view('posts.edit')->with('post',Post::find($id));
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);
        $note=Post::find($id);
        $note->title=$request->input('title');
        $note->body=$request->input('body');
        $note->userId=Auth::user()->id;
        $note->save();
        return redirect('/notes')->with('success','Note edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('/notes')->with('success','Note deleted');
    }
}
