<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    #[Validate('required|max:255')]
    public string $title;

    #[Validate('required')]
    public int $price;

    #[Validate('required|max:65000')]
    public string $description;

    public $patentId;

    #[Validate('required')]
    public $childId;

    public $images;

    #[Computed()]
    public function parents()
    {
        return Category::whereNull('parent_id')->get(['id', 'name_en', 'name_ar']);
    }
    #[Computed()]
    public function children()
    {
        if (!is_null($this->patentId)) {
            return Category::where('parent_id', $this->patentId)->get(['id', 'name_en', 'name_ar']);
        }
        return collect();
    }

    public function updatedPatentId()
    {
        $this->reset('childId');
    }

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->childId,
            'user_id' => Auth::user()->id
        ]);
        return redirect()
            ->route('upload')
            ->with('post_id', $post->id);
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.create-post');
    }
}