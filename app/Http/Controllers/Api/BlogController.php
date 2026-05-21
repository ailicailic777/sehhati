<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = BlogPost::with('author')
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = BlogPost::with('author', 'comments.user')
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($post);
    }
}
