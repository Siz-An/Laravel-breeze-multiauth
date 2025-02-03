<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\admin\pages\blog\BlogCategory;
use App\Models\admin\pages\blog\BlogSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogSetupController extends Controller
{
    // Display the blog setup page with the list of blogs
    public function index()
    {
        $blogs = BlogSetup::with('category')->paginate(15);
        $categories = BlogCategory::where('is_published', true)->get();
        return view('admin.pages.blog-Setup', compact('blogs', 'categories'));
    }

    // Store a newly created blog in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'blog_category' => 'required|exists:blog_categories,id',
            'blog_title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon_name' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_keyword' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'order' => 'nullable|integer',
            'is_publish' => 'nullable|boolean',
        ]);

        $blog = new BlogSetup($validatedData);
        $blog->is_publish = $request->has('is_publish');

        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->save();

        return redirect()->route('admin.Pages.blog-Setup')->with('success', 'Blog successfully submitted!');
    }

    // Display the edit form for a specific blog
    public function edit($id)
    {
        $blog = BlogSetup::findOrFail($id);
        $categories = BlogCategory::where('is_published', true)->get();
        return view('admin.pages.blog-Edit', compact('blog', 'categories'));
    }

    // Update a specific blog
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'blog_category' => 'required|exists:blog_categories,id',
            'blog_title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author' => 'nullable|string|max:255',
            'is_publish' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $blog = BlogSetup::findOrFail($id);
        $blog->fill($request->except('image'));

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
                unlink(storage_path('app/public/' . $blog->image));
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->is_publish = $request->has('is_publish');
        $blog->save();

        return redirect()->route('admin.Pages.blog-Setup')->with('success', 'Blog updated successfully.');
    }

    // Delete a specific blog
    public function destroy($id)
    {
        $blog = BlogSetup::findOrFail($id);

        if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
            unlink(storage_path('app/public/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.Pages.blog-Setup')->with('success', 'Blog deleted successfully.');
    }
}