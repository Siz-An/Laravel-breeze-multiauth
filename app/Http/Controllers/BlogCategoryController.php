<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
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
        return view('admin.Pages.blog-category', compact('categories'));
    }

    /**
     * Show the form for creating a new blog category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Pages.blog-category-create');
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
            // Validate the form data
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255',
                'icon_name' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'seo_title' => 'nullable|string|max:255', // SEO title
                'seo_keyword' => 'nullable|string|max:255', // SEO keyword
                'seo_description' => 'nullable|string', // SEO description
                'order' => 'nullable|integer',
                'is_published' => 'nullable|boolean',
            ]);

            // Set default values for nullable fields
            $validatedData['order'] = $validatedData['order'] ?? 0;
            $validatedData['is_published'] = $validatedData['is_published'] ?? false;

            // Create a new blog category
            BlogCategory::create($validatedData);

            // Redirect back with a success message
            return redirect()->route('admin.Pages.blog-category.index')->with('success', 'Category created successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error creating blog category: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.Pages.blog-category.index')->with('error', 'An error occurred while creating the category. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified blog category.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the blog category by ID
        $category = BlogCategory::findOrFail($id);

        // Return the edit view with the category data
        return view('admin.Pages.blog-category-edit', compact('category'));
    }

    /**
     * Handle form submission for updating an existing blog category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the blog category by ID
            $category = BlogCategory::findOrFail($id);

            // Validate the form data
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255',
                'icon_name' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'seo_title' => 'nullable|string|max:255', // SEO title
                'seo_keyword' => 'nullable|string|max:255', // SEO keyword
                'seo_description' => 'nullable|string', // SEO description
                'order' => 'nullable|integer',
                'is_published' => 'nullable|boolean',
            ]);

            // Update the blog category
            $category->update($validatedData);

            // Redirect back with a success message
            return redirect()->route('admin.Pages.blog-category.index')->with('success', 'Category updated successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating blog category: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.Pages.blog-category.index')->with('error', 'An error occurred while updating the category. Please try again.');
        }
    }

    /**
     * Handle deletion of a blog category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            // Find the blog category by ID
            $category = BlogCategory::findOrFail($id);

            // Delete the blog category
            $category->delete();

            // Redirect back with a success message
            return redirect()->route('admin.Pages.blog-category.index')->with('success', 'Category deleted successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error deleting blog category: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->route('admin.Pages.blog-category.index')->with('error', 'An error occurred while deleting the category. Please try again.');
        }
    }
}