<?php

namespace App\Http\Controllers;//to include controllers

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }
    public function cards(){
        $companies=[
            
            ["name"=> "Samsung","price"=>2000],
            ["name"=> "Sony","price"=>1000 ],
            ["name"=> "Sony","price"=>20 ]


        ];
        return view('cards.index',['d'=>$companies]);
       
    }
}
