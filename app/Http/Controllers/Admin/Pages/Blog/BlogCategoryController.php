<?php

namespace App\Http\Controllers\admin\pages\Blog;

use App\Http\Controllers\Controller;
use App\Models\admin\pages\blog\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogCategoryController extends Controller
{
    /**
     * Display the form and table for blog categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all blog categories ordered by 'order' column (ascending) with pagination
        $categories = BlogCategory::orderBy('order', 'asc')->paginate(10); // 10 items per page
        return view('admin.pages.Blog.blogCategory', compact('categories'));

    }

    /**
     * Show the form for creating a new blog category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Fetch all blog categories for the dropdown
        $categories = BlogCategory::orderBy('order', 'asc')->get();
    
        // Return the create view with categories
        return view('admin.pages.Blog.blogCategory', compact('categories'));
    }
    

    /**
     * Handle form submission for creating a new blog category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->merge(['is_published' => $request->has('is_published')]);
    
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255',
                'icon_name' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'seo_title' => 'nullable|string|max:255',
                'seo_keyword' => 'nullable|string|max:255',
                'seo_description' => 'nullable|string',
                'order' => 'nullable|integer',
                'is_published' => 'required|boolean',
            ]);
    
            BlogCategory::create($validatedData);
    
            return redirect()->route('admin.blog.blogCategory')->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating blog category: ' . $e->getMessage());
    
            return redirect()->route('admin.blog.blogCategory')->with('error', 'An error occurred while creating the category. Please try again.');
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
    
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255',
                'icon_name' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'seo_title' => 'nullable|string|max:255',
                'seo_keyword' => 'nullable|string|max:255',
                'seo_description' => 'nullable|string',
                'order' => 'nullable|integer',
                'is_published' => 'nullable|boolean',
            ]);
    
            $category->update($validatedData);
    
            return redirect()->route('admin.blog.blogCategory')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating blog category: ' . $e->getMessage());
    
            return redirect()->route('admin.blog.blogCategory')->with('error', 'An error occurred while updating the category. Please try again.');
        }
    }
    public function edit($id)
{
    $category = BlogCategory::findOrFail($id);
    return view('admin.pages.Blog.blogCategoryEdit', compact('category'));
}

    public function destroy($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);
    
            $category->delete();
    
            return redirect()->route('admin.blog.blogCategory')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting blog category: ' . $e->getMessage());
    
            return redirect()->route('admin.blog.blogCategory')->with('error', 'An error occurred while deleting the category. Please try again.');
        }
    }

    /**
     * Fetch all categories for the dropdown in the blog form.
     *
     * @return \Illuminate\View\View
     */
    public function fetchCategoriesForDropdown()
    {
        // Fetch all blog categories
        $categories = BlogCategory::orderBy('order', 'asc')->get();
        
        // Return the categories to the view for the dropdown
        return view('admin.Pages.Blog.blog-create', compact('categories'));
    }
    
    public function togglePublish(Request $request, $id)
{
    try {
        $category = BlogCategory::findOrFail($id);
        $category->is_published = $request->input('is_published');
        $category->save();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        Log::error('Error toggling blog category publish status: ' . $e->getMessage());
        return response()->json(['success' => false]);
    }
}
    
}