<x-admin-app-layout>
    <body class="bg-gray-50 font-sans">
        <div class="container mx-auto p-4">
     

            <!-- Success and Error Messages -->
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-2 mb-4 rounded text-xs">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-2 mb-4 rounded text-xs">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Flexbox Layout for Form and Table -->
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Form Section -->
                <div class="w-full lg:w-1/3 bg-white p-4 rounded-lg shadow-sm">
                    <form action="{{ route('admin.Pages.blog-category.store') }}" method="POST">
                        @csrf
                        <h1 class="text-xl font-bold text-gray-800 mb-4">BLOG CATEGORY FORM</h1>
                        <div class="space-y-2">
                            <!-- Category Name and Icon Name in the same line -->
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Category Name -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Category Name: *</label>
                                    <input type="text" name="category_name" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" placeholder="Enter Category Name" required>
                                </div>
                    
                                <!-- Icon Name -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">Icon Name:</label>
                                    <input type="text" name="icon_name" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" placeholder="Enter Icon Name">
                                </div>
                            </div>
                    
                            <!-- Description -->
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Description: *</label>
                                <textarea name="description" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" rows="2" placeholder="Enter Description"></textarea>
                            </div>
                    
                            <!-- SEO Title and SEO Keyword in the same line -->
                            <div class="grid grid-cols-2 gap-4">
                                <!-- SEO Title -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">SEO Title:</label>
                                    <input type="text" name="seo_title" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" placeholder="Enter SEO Title">
                                </div>
                    
                                <!-- SEO Keyword -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 mb-1">SEO Keyword:</label>
                                    <input type="text" name="seo_keyword" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" placeholder="Enter SEO Keyword">
                                </div>
                            </div>
                    
                            <!-- SEO Description -->
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">SEO Description:</label>
                                <textarea name="seo_description" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" rows="2" placeholder="Enter SEO Description"></textarea>
                            </div>
                    
                            <!-- Order -->
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Order:</label>
                                <input type="number" name="order" class="w-full px-2 py-1 border border-gray-300 rounded text-xs" placeholder="Enter Order">
                            </div>
                    
                            <!-- Is Published -->
                            <div class="flex items-center">
                                <input type="checkbox" name="is_published" class="w-4 h-4 border border-gray-300 rounded text-xs">
                                <label class="ml-2 text-xs text-gray-700">Is Publish</label>
                            </div>
                        </div>
                    
                        <!-- Form Buttons -->
                        <div class="mt-4 flex gap-2">
                            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">Save</button>
                            <button type="reset" class="px-3 py-1 bg-gray-300 text-gray-700 rounded text-xs hover:bg-gray-400">Reset</button>
                        </div>
                    </form>
                </div>

                <!-- Table Section -->
                <div class="w-full lg:w-2/3 bg-white p-4 rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">BLOG CATEGORY LIST</h2>

                    <!-- Entries Filter -->
                    <div class="mb-3">
                        <label class="text-xs text-gray-700">Show
                            <select class="px-1 py-1 border border-gray-300 rounded text-xs">
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                            </select>
                            entries
                        </label>
                    </div>

                    <!-- Table Container with Fixed Height -->
                    <div class="overflow-y-auto" style="max-height: 400px;">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-3 py-2 font-medium text-gray-700 border">S No.</th>
                                    <th class="px-3 py-2 font-medium text-gray-700 border">Category Name</th>
                                    <th class="px-3 py-2 font-medium text-gray-700 border">Icon</th>
                                    <th class="px-3 py-2 font-medium text-gray-700 border">Order</th>
                                    <th class="px-3 py-2 font-medium text-gray-700 border">Is Publish?</th>
                                    <th class="px-3 py-2 font-medium text-gray-700 border">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-2 text-gray-700 border">{{ $index + 1 }}</td>
                                        <td class="px-3 py-2 text-gray-700 border">{{ $category->category_name }}</td>
                                        <td class="px-3 py-2 text-gray-700 border">{{ $category->icon_name }}</td>
                                        <td class="px-3 py-2 text-gray-700 border">{{ $category->order }}</td>
                                        <td class="px-3 py-2 text-gray-700 border">{{ $category->is_published ? 'Y' : 'N' }}</td>
                                        <td class="px-3 py-2 text-gray-700 border">
                                            <a href="{{ route('admin.Pages.blog-category.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                            <form action="{{ route('admin.Pages.blog-category.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4 flex justify-between items-center text-xs">
                        <div class="text-gray-700">
                            Showing 1 to {{ $categories->count() }} of {{ $categories->total() }} entries
                        </div>
                        <div class="flex gap-1">
                            <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">First</button>
                            <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Previous</button>
                            <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Next</button>
                            <button class="px-2 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Last</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-admin-app-layout>