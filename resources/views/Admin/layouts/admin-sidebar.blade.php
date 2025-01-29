<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Navbar</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-sans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg h-screen p-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Menu</h2>
            <ul class="space-y-2">
                <!-- Dashboard -->
                <li>
                    <a href="/admin/dashboard" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                        Dashboard
                    </a>
                </li>

                <!-- Content Management -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                            Content Management
                            <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                        </summary>
                        <ul class="pl-4 mt-2 space-y-1">
                            <!-- Banner Management -->
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Banner Management
                                </a>
                            </li>

                            <!-- Page Management -->
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Page Management
                                </a>
                            </li>

                            <!-- Blog Management -->
                            <li>
                                <details class="group">
                                    <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                                        Blog Management
                                        <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                                    </summary>
                                    <ul class="pl-4 mt-2 space-y-1">
                                        <li>
                                            <a href="/admin/Pages/blog-category" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                                Blog Category
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/admin/Pages/blog-Setup" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                                Blog Setup
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </li>

                            <!-- News / Notice / Event -->
                            <li>
                                <details class="group">
                                    <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                                        News / Notice / Event
                                        <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                                    </summary>
                                    <ul class="pl-4 mt-2 space-y-1">
                                        <li>
                                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                                NNE Category
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                                NNE Setup
                                            </a>
                                        </li>
                                    </ul>
                                </details>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Other Content -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                            Other Content
                            <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                        </summary>
                        <ul class="pl-4 mt-2 space-y-1">
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Project Management
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Team / Testimonial
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Front End Tiles
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Service Management
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Useful Links
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Users -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                            Users
                            <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                        </summary>
                        <ul class="pl-4 mt-2 space-y-1">
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Media Setup -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                            Media Setup
                            <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                        </summary>
                        <ul class="pl-4 mt-2 space-y-1">
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Gallery
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Video Gallery
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Admin Settings -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded cursor-pointer">
                            Admin Settings
                            <span class="ml-auto transform transition-transform group-open:rotate-180">&#9660;</span>
                        </summary>
                        <ul class="pl-4 mt-2 space-y-1">
                            <li>
                                <a href="{{ url('admin/user/manageUser') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                                    Manage User
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>

        {{-- <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-2xl font-bold">Main Content</h1>
            <p>This is the main content area.</p>
        </div> --}}
    </div>
</body>
</html>