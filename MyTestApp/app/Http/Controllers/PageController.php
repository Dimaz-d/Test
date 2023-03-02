<?php

namespace App\Http\Controllers;

use App\Models\TestObject;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('client.forms');
    }
    public function catalog(){
        $items = TestObject::all();
        return view('client.catalog', compact('items'));
    }
}
