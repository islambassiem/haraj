<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show($category)
    {
        return $category;
    }
}
