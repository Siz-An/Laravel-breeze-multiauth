<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Latest Blogs</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">{{ $blog->blog_title }}</h2>
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->blog_title }}" class="w-full h-48 object-cover mb-4 rounded-lg">
                    @endif
                    <p class="text-gray-700 mb-4">{{ Str::limit($blog->content, 100) }}</p>
                    <h2 class="text-xl font-semibold mb-2">Author-{{ $blog->author }}</h2>
                    <a href="#" class="text-blue-500 hover:underline">Read More</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
