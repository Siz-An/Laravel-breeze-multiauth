<?php
namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory; // Corrected to use BlogCategory model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogSetupController extends Controller
{
    // Display the blog setup page with the list of blogs
    public function index()
    {
        // Fetch blogs, paginate them (15 per page, adjust as needed)
        $blogs = Blog::paginate(15);

        // Pass the blogs data to the view
        return view('admin.pages.blog-Setup', compact('blogs'));
    }

    // Display the edit form for a specific blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        
        // Fetch all blog categories
        $categories = BlogCategory::all(); // Corrected to BlogCategory
        
        // Pass the blog and categories to the view
        return view('admin.pages.blog-Edit', compact('blog', 'categories'));
    }

    
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'blog_category' => 'required|string|max:255',
            'blog_title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author' => 'nullable|string|max:255',
            'is_publish' => 'nullable|boolean', // Nullable to handle unchecked case
        ]);
    
        // If validation fails, return with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Find the blog to update
        $blog = Blog::findOrFail($id);
        $blog->fill($request->except('image')); // Fill all fields except 'image'
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
                unlink(storage_path('app/public/' . $blog->image));
            }
    
            // Store the new image
            $blog->image = $request->file('image')->store('blogs', 'public');
        }
    
        // Handle 'is_publish' checkbox: If checked, save as true (1), otherwise false (0)
        $blog->is_publish = $request->has('is_publish'); // This ensures a boolean value
    
        // Save the blog
        $blog->save();
    
        return redirect()->route('admin.Pages.blog-Setup')->with('success', 'Blog updated successfully.');
    }
    
    

    // Delete a specific blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the image from storage if exists
        if ($blog->image && file_exists(storage_path('app/public/' . $blog->image))) {
            unlink(storage_path('app/public/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.Pages.blog-Setup')->with('success', 'Blog deleted successfully.');
    }


}
