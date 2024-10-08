<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function products(){
        return view('admin.product.list');
    }
}
