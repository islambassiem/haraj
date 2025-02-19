<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function delete($id)
    {
        $post = Post::findorFail($id);
        $this->authorize('delete', $post);
        $post->delete();
        session()->flash('message', __('Your ad has been deleted'));
    }

    public function refresh($id)
    {
        Post::find($id)->touch();
        session()->flash('message', __('Your ad has been refreshed'));
    }

    public function render()
    {
        $posts = Post::with('category')
            ->where('user_id', Auth::user()->id)
            ->latest('updated_at')
            ->get();
        return view('livewire.dashboard')
            ->with('posts', $posts);
    }
}
