<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('layouts.home', [
            'home' => $categories->where('parent_id', 1)->all(),
            'entertainment' => $categories->where('parent_id', 2)->all(),
            'accessories' => $categories->where('parent_id', 3)->all(),
            'family' => $categories->where('parent_id', 4)->all(),
            'electronics' => $categories->where('parent_id', 5)->all(),
            'hobbies' => $categories->where('parent_id', 6)->all(),
            'vichies' => $categories->where('parent_id', 7)->all(),

        ]);
    }
}
