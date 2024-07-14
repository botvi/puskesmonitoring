<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    public function index()
    {
        $berita = Blog::orderBy('created_at', 'desc')->take(8)->get();
        return view('web.index', compact('berita'));
    }

    // berita show
    public function showBerita($id)
    {
        $blog = Blog::find($id);
        return view('web.show-berita', compact('blog'));
    }
}
