<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagescontroller extends Controller
{
    //
    public function homepage(){

    	return view('home');
    }
    
    public function servicepage()
    {
        
    	$array=[
    		'Name'=>'Saree',
    		'Brand'=>'Arong',
    		'colour'=>'Red',
    		'Price'=>'3000 taka'
    	];
        
        
    	return view('service')->with('array',$array);
        
    }

    public function aboutpage(){

    	return view('about');
    }

    public function contactpage(){

    	return view('contact');
    }

    public function teamspage(){

    	return view('teams');
    }
    

    }
