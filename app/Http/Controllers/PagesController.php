<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $brand='by jmumo';
//        return view('pages.index',compact('brand'));
        return view('pages.index')->with('brand',$brand);
    }


    public function trial(){
        $brand='by jmumo';
//        return view('pages.index',compact('brand'));
        return view('pages.trial')->with('brand',$brand);
    }

//    public function about(){
//        $brand='by jmumo';
//        return view('pages.about')->with('brand',$brand);
//    }
//    public function about(){
//        $data=array(
//            'title' =>'services'
//        );
//        return view('pages.about')->with($data);
//    }



    public function services(){
        $data=array(
          'title' =>'services',
            'name'=>'jmumo',
            'services' =>['web development','system testing']
        );
        return view('pages.services')->with($data);
    }

    public function about(){
        $data=array(
            'title' =>'about us',
            'name'=>'jmumo',
            'services' =>'we teach laravel from scratch'
        );
        return view('pages.about')->with($data);
    }


}

