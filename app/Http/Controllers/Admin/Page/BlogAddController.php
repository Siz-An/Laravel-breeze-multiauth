<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogCategory;


class BlogAddController extends Controller
{
    /**
     * Display the form for adding a new blog.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch categories from the BlogCategory model
        $categories = BlogCategory::all(); // Retrieve all categories
    
        // Pass the categories to the view
        return view('admin.pages.blog-Add', compact('categories'));
    }
    

    /**
     * Store a newly created blog in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'blog_category' => 'required|string|max:255',
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
        ], [
            'blog_category.required' => 'The blog category field is required.',
            'blog_title.required' => 'The blog title field is required.',
            'slug.required' => 'The slug field is required.',
            'slug.unique' => 'The slug must be unique.',
            'content.required' => 'The content field is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);

        // Create a new blog instance
        $blog = new Blog();
        $blog->blog_category = $validatedData['blog_category'];
        $blog->blog_title = $validatedData['blog_title'];
        $blog->slug = $validatedData['slug'];
        $blog->content = $validatedData['content'];
        $blog->icon_name = $validatedData['icon_name'] ?? null;
        $blog->author = $validatedData['author'] ?? null;
        $blog->seo_title = $validatedData['seo_title'] ?? null;
        $blog->seo_keyword = $validatedData['seo_keyword'] ?? null;
        $blog->seo_description = $validatedData['seo_description'] ?? null;
        $blog->order = $validatedData['order'] ?? null;
        $blog->is_publish = $request->has('is_publish') ? true : false;

        // Handle file upload for the image (optional)
        if ($request->hasFile('image')) {
            // Ensure the directory exists
            if (!Storage::disk('public')->exists('blogs')) {
                Storage::disk('public')->makeDirectory('blogs');
            }
            // Store the file
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        // Save the blog to the database
        $blog->save();

        // Redirect with a success message and to the blog-setup page
        return redirect()->route('admin.Pages.blog-Setup')->with('success', 'Blog successfully submitted!');
    }
}