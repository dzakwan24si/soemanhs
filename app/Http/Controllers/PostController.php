<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan halaman daftar berita
    public function index()
    {
        // Mengambil berita terbaru yang sudah dipublikasikan
        $posts = Post::where('is_published', true)
                     ->latest()
                     ->get();

        // Merender komponen React di folder Pages/Post/Index.jsx
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    // Menampilkan detail satu berita berdasarkan slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();

        // Merender komponen React di folder Pages/Post/Show.jsx
        return Inertia::render('Post/Show', [
            'post' => $post
        ]);
    }
}
