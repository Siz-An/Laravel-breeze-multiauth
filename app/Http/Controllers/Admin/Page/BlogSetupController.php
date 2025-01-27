<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Request;

class BlogSetupController extends Controller
{
    public function index()
    {
        return view('admin.Pages.blog-Setup');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'blog_category' => 'required|string|max:255',
            'blog_title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author' => 'nullable|string|max:255',
            'is_publish' => 'nullable|boolean',
        ]);

        // Save the blog
        $blog = new Blog();
        $blog->fill($validatedData);

        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->is_publish = $request->has('is_publish');
        $blog->save();

        return redirect()->route('admin.blog-setup')->with('success', 'Blog created successfully.');
    }
}
