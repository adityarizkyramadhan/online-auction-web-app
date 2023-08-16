<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $items = Goods::all();
        return view('home.index', compact('items'));
    }
}
