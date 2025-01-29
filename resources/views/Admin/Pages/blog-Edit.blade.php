<x-admin-app-layout>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto p-6">
            <!-- Header with Cancel Button -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Edit Blog</h1>
                <a href="{{ route('admin.Pages.blog-Setup') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Cancel</a>
            </div>

            <!-- Scrollable Form Container -->
            <div class="overflow-y-auto max-h-[calc(100vh-200px)] p-4 bg-white rounded-lg shadow-md">
                <!-- Edit Form -->
                <form action="{{ route('admin.Pages.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Blog Category Dropdown -->
                    <div class="mb-4">
                        <label for="blog_category" class="block text-sm font-medium text-gray-700">Blog Category</label>
                        <select id="blog_category" name="blog_category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('blog_category', $blog->blog_category) == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Blog Title Input -->
                    <div class="mb-4">
                        <label for="blog_title" class="block text-sm font-medium text-gray-700">Blog Title</label>
                        <input type="text" id="blog_title" name="blog_title" value="{{ old('blog_title', $blog->blog_title) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div>

                    <!-- Slug Input -->
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div>

                    <!-- Content Textarea -->
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea id="content" name="content" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="image" name="image" class="mt-1 block w-full">
                        @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="mt-2 w-16 h-16 object-cover">
                        @endif
                    </div>

                    <!-- Author Input -->
                    <div class="mb-4">
                        <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                        <input type="text" id="author" name="author" value="{{ old('author', $blog->author) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div>

                    <!-- Publish Checkbox -->
                    <div class="mb-4">
                        <label for="is_publish" class="inline-flex items-center">
                            <input type="checkbox" name="is_publish" value="1" {{ old('is_publish', $blog->is_publish) ? 'checked' : '' }} class="form-checkbox">
                            <span class="ml-2 text-sm">Publish</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save Changes</button>
                </form>
            </div>
        </div>
    </body>
</x-admin-app-layout>