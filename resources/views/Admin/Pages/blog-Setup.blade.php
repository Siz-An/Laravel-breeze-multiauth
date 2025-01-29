<x-admin-app-layout>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">Blog List</h1>

            <!-- Add New Blog Button -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.Pages.blog-Add') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">+ ADD NEW BLOG</a>
            </div>

            <!-- Blog List Table -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">S.No.</th>
                            <th class="py-2 px-4 border-b">Blog Category</th>
                            <th class="py-2 px-4 border-b">Blog Title</th>
                            <th class="py-2 px-4 border-b">Author</th>
                            <th class="py-2 px-4 border-b">Image</th>
                            <th class="py-2 px-4 border-b">Icon</th>
                            <th class="py-2 px-4 border-b">Content</th>
                            <th class="py-2 px-4 border-b">Is Publishing</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $index => $blog)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">{{ $blog->category->category_name ?? 'No Category' }}</td>
                            <td class="py-2 px-4 border-b">{{ $blog->blog_title }}</td>
                            <td class="py-2 px-4 border-b">{{ $blog->author }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-16 h-16 object-cover">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $blog->icon_name ?? 'No Icon' }}</td>
                            <td class="py-2 px-4 border-b">{{ Str::limit($blog->content, 50) }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($blog->is_publish)
                                    <span class="text-green-500">Published</span>
                                @else
                                    <span class="text-red-500">Not Published</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.Pages.blog.edit', $blog->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                
                                <!-- Delete Button -->
                                <form action="{{ route('admin.Pages.blog.destroy', $blog->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </body>
</x-admin-app-layout>
