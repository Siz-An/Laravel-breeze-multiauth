<x-admin-app-layout>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">

        <!-- Form Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800">Add New Blog</h2>
            <!-- Cancel Button with JavaScript Redirection -->
            <button type="button" onclick="window.location.href='{{ route('admin.blogSetup.index') }}';" class="text-red-500 hover:text-red-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Cancel
            </button>
        </div>

        <!-- Scrollable Form Container -->
        <div class="overflow-y-auto max-h-[70vh] p-6">
            <form id="addBlogForm" action="{{ route('admin.blogSetup.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Blog Category -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="blog-category">Blog Category</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="blog-category" name="blog_category" required>
                            <option value="">Select a category</option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            @else
                                <option value="">No categories available</option>
                            @endif
                        </select>
                    </div>

                    <!-- Blog Title -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="blog-title">Blog Title</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="blog-title" type="text" name="blog_title" placeholder="Enter blog title" required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">Slug</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug" type="text" name="slug" placeholder="Enter slug" required>
                    </div>

                    <!-- Content -->
                    <div class="mb-4 col-span-full">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Content</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="content" name="content" placeholder="Enter content" rows="5" required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" name="image">
                    </div>

                    <!-- Icon Name -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="icon_name">Icon Name</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="icon_name" type="text" name="icon_name" placeholder="Enter icon name">
                    </div>

                    <!-- Author -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Author</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="author" type="text" name="author" placeholder="Enter author name">
                    </div>

                    <!-- SEO Title -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="seo_title">SEO Title</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="seo_title" type="text" name="seo_title" placeholder="Enter SEO title">
                    </div>

                    <!-- SEO Keyword -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="seo_keyword">SEO Keyword</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="seo_keyword" type="text" name="seo_keyword" placeholder="Enter SEO keyword">
                    </div>

                    <!-- SEO Description -->
                    <div class="mb-4 col-span-full">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="seo_description">SEO Description</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="seo_description" name="seo_description" placeholder="Enter SEO description" rows="3"></textarea>
                    </div>

                    <!-- Order -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="order">Order</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="order" type="number" name="order" placeholder="Enter order">
                    </div>

                    <!-- Is Published -->
                      
                       <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="is_published">Published</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="is_published" name="is_published">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Flash Success Message -->
    @if(session('success'))
        <script type="text/javascript">
            window.onload = function() {
                alert("{{ session('success') }}");
                window.location.href = "{{ route('admin.blogSetup.index') }}"; // Redirect to blog setup page
            }
        </script>
    @endif
</x-admin-app-layout>