<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('pageadmin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('pageadmin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $Blog = new Blog();
        $Blog->title = $request->title;
        $Blog->deskripsi = $request->deskripsi;
        $Blog->konten = $request->konten;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('Blog'), $imageName);
            $Blog->image = $imageName;
        }

        $Blog->save();

        Alert::success('Berhasil', 'Blog berhasil dibuat.');

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $Blog)
    {
        return view('pageadmin.blog.show', compact('Blog'));
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('pageadmin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $Blog = Blog::find($id);
        $Blog->title = $request->title;
        $Blog->deskripsi = $request->deskripsi;
        $Blog->konten = $request->konten;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blog'), $imageName);
            $Blog->image = $imageName;
        }

        $Blog->save();

        Alert::success('Berhasil', 'Blog berhasil diperbarui.');

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $Blog = Blog::find($id);
        if ($Blog->image) {
            unlink(public_path('blog') . '/' . $Blog->image);
        }
        $Blog->delete();

        Alert::success('Berhasil', 'Blog berhasil dihapus.');

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }
}
