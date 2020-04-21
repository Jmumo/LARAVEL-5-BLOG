<?php

namespace App\Http\Controllers;
use App\User;
use DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id= auth()->user()->id;
        $user=User::find($user_id);

        return view('user.index')->with('user',$user);

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
    public function edit($id)
    {
        $user= User::find($id);
        return view('user.edit')->with('user',$user);

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
        if ($request->hasFile('cover_image')) {
            $file_ext = $request->file('cover_image')->getClientOriginalName();


            //getfilename
            $file_name = pathinfo($file_ext, PATHINFO_FILENAME);



            //getextension
            $ext = $request->file('cover_image')->getClientOriginalExtension();

            $file_to_store = $file_name . '_' . time() . '.' . $ext;
//            $file_to_store=$request->file('cover_image');

            //upload image
//            $path = $request->file('cover_image')->storeAs('public/cover_images', $file_to_store);
            $path= $request->file('cover_image')->storeAs('public/cover_images', $file_to_store);
        } else {
            $file_to_store = 'no image';
        }
        //save post
        $user = User::find($id);
        $user->name =$request->input('name');
        $user->email =$request->input('email');
        $user->username =$request->input('username');
        $user->cover_image = $file_to_store;
        $user->save();

        return redirect( '/user')->with('success','profile updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
