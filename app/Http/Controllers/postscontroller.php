<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\post;
use DB;
use Carbon\Carbon;

class postscontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $posts = post::latest()
          ->filter(request(['month','year']))
           ->get();


        $posts1 = post::Recent();


//       return $archives;
        $archives= post::Archives();



//        $posts =post::where('title','post two')->get();
//        $posts =DB::select('select * from posts ');
//        $posts=post::latest()->get();
//        return view('post.index')->with('posts', $posts,$posts1);
        return view('post.index',compact( 'posts','posts1','archives'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:19990'

        ]);


        //handle file upload
        if ($request->hasFile('cover_image')) {

            $file_ext = $request->file('cover_image')->getClientOriginalName();
//            return  1234;

            //getfilename
            $file_name = pathinfo($file_ext, PATHINFO_FILENAME);

            //getextension
            $ext = $request->file('cover_image')->getClientOriginalExtension();

            $file_to_store = $file_name . '_' . time() . '.' . $ext;
//            $file_to_store=$request->file('cover_image');

            //upload image
//            $path = $request->file('cover_image')->storeAs('public/cover_images', $file_to_store);
            $path = $request->file('cover_image')->storeAs('public/cover_images', $file_to_store);
        } else {
            $file_to_store = 'no image';
        }
        //save post
        $post = new post;
        $post->title = $request->input('title');
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->cover_image = $file_to_store;
        $post->save();


        return redirect('/post')->with('success', 'post created');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);


        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        if (Auth()->user()->id !== $post->user_id) {
            return redirect('/post')->with('error', 'unauthorised access');
        }
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:19999'
        ]);
        if ($request->hasFile('cover_image')) {
            $file_ext = $request->file('cover_image')->getClientOriginalName();
//            return  1234;

            //getfilename
            $file_name = pathinfo($file_ext, PATHINFO_FILENAME);


            //getextension
            $ext = $request->file('cover_image')->getClientOriginalExtension();

            $file_to_store = $file_name . '_' . time() . '.' . $ext;
//            $file_to_store=$request->file('cover_image');

            //upload image
//            $path = $request->file('cover_image')->storeAs('public/cover_images', $file_to_store);
            $path = $request->file('cover_image')->storeAs('public/cover_images', $file_to_store);
        } else {
            $file_to_store = 'no image';
        }
        //save post
        $post = post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $file_to_store;
        $post->save();

        return redirect('/post')->with('success', 'post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();
        return redirect('/post')->with('success', 'post' . $id . 'deleted');

    }

//    public function recent()
//    {
//        $posts1 = post::orderby('created_at', 'desc')->take(3)->get();
////        $posts =DB::table('posts')->ORDERBY('created_at','desc')->limit(3)->get();
//
////
//
//    }
}
