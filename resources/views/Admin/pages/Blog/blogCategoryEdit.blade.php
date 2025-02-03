<x-admin-app-layout>
    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Edit Blog Category</h1>
                    <a href="{{ route('admin.blog.blogCategory') }}" class="text-red-600 hover:text-red-800">
                        Cancel
                    </a>
                </div>

                <!-- Success and Error Messages -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Edit Form -->
                <form action="{{ route('admin.blog.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-4">
                        <!-- Category Name and Icon Name in the same line -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Category Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Category Name: *</label>
                                <input type="text" name="category_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('category_name', $category->category_name) }}" required>
                                @error('category_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Icon Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Icon Name:</label>
                                <input type="text" name="icon_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('icon_name', $category->icon_name) }}">
                                @error('icon_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description: *</label>
                            <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SEO Title and SEO Keyword in the same line -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- SEO Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">SEO Title:</label>
                                <input type="text" name="seo_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('seo_title', $category->seo_title) }}">
                                @error('seo_title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- SEO Keyword -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">SEO Keyword:</label>
                                <input type="text" name="seo_keyword" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('seo_keyword', $category->seo_keyword) }}">
                                @error('seo_keyword')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- SEO Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">SEO Description:</label>
                            <textarea name="seo_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3">{{ old('seo_description', $category->seo_description) }}</textarea>
                            @error('seo_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Order -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Order:</label>
                            <input type="number" name="order" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('order', $category->order) }}" required>
                            @error('order')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Is Published -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Is Published?</label>
                            <input type="hidden" name="is_published" value="0"> <!-- Hidden input for unchecked state -->
                            <input type="checkbox" name="is_published" class="mt-1" value="1" {{ old('is_published', $category->is_published ?? false) ? 'checked' : '' }}>
                            @error('is_published')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                </form>
            </div>
        </div>
    </body>
</x-admin-app-layout>