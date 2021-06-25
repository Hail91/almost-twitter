<?php

namespace App\Http\Controllers;

use App\Post;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller {

    public function index() : View
    {
        return view('posts.index', [
            'posts' => auth()->user()->timeline()
        ]);
    }

    public function store() : RedirectResponse {
        $attributes = request()->validate(['body' => 'required|max:255']);
        Post::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);
        return redirect(route('home'));
    }

    public function destroy(int $post_id) {
        $post_to_delete = Post::find($post_id);
        try {
            $post_to_delete->delete();
            return redirect(route('home'))->with('post_delete_success', 1);
        }
        catch (Exception $error) {
            Log::error($error->getMessage());
            return redirect(route('home'))->with('post_delete_error', 1);
        }
    }
}
