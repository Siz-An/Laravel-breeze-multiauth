<?php
namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogAddController extends Controller
{
    /**
     * Display the form for adding a new blog.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.pages.blog-Add');
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
        $blog->is_publish = $request->has('is_publish'); // Checkbox returns true if checked

        // Handle file upload for the image (optional)
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public'); // Save to storage/app/public/blogs
        }

        // Save the blog to the database
        $blog->save();

        // Redirect with a success message
        return redirect()->route('admin.Pages.blog-Add')->with('success', 'Blog created successfully!');
    }
}