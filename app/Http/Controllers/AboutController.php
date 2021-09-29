<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $title = 'getgoodlol';
        $cars = [
            [
            'brand' => 'mazda',
            'model' => 'mx5',
            ],
            [
            'brand' => 'citroen',
            'model' => 'c4 cactus'
            ]
        ];


        return view('about', compact('title', 'cars'));
    }
}
