<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'posts' => Post::simplePaginate(15),
        ]);
    }

    public function show(Category $category)
    {
        $posts = Post::query()
            ->with(['user'])
            ->where('category_id', $category->id)
            ->paginate(5);
        return view('home')
            ->with('posts', $posts);
    }
}
