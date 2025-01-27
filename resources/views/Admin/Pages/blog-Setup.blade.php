<x-admin-app-layout>
    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold mb-6">Blog List</h1>
            
            <!-- Add New Blog Button -->
            <div class="flex justify-end mb-4">
                <button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ ADD NEW BLOG</button>
            </div>

            <!-- Filters -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Blog Category:</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option>All</option>
                            <option>Health</option>
                            <option>IT Consulting</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date:</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option>All</option>
                            <option>Last Week</option>
                            <option>Last Month</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Search:</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Type to search">
                    </div>
                </div>
                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
            </div>

            <!-- Blog List Table -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <label class="text-sm">Show</label>
                        <select class="ml-2 rounded-md border-gray-300 shadow-sm">
                            <option>15</option>
                            <option>30</option>
                            <option>50</option>
                        </select>
                        <label class="text-sm">entries</label>
                    </div>
                </div>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">S.No.</th>
                            <th class="py-2 px-4 border-b">Blog Category</th>
                            <th class="py-2 px-4 border-b">Blog Title</th>
                            <th class="py-2 px-4 border-b">Author</th>
                            <th class="py-2 px-4 border-b"># Image</th>
                            <th class="py-2 px-4 border-b"># Icon</th>
                            <th class="py-2 px-4 border-b">Content</th>
                            <th class="py-2 px-4 border-b"># Is Publishing</th>
                            <th class="py-2 px-4 border-b"># Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">Health</td>
                            <td class="py-2 px-4 border-b">CFC turned into designated COVID-19 isolation centre</td>
                            <td class="py-2 px-4 border-b">Admin</td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b">As construction of the centre was nearing compl...</td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b">
                                <button class="text-blue-500">Edit</button>
                                <button class="text-red-500 ml-2">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-4">
                    <div class="text-sm">Showing 1 to 5 of 5 entries</div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-gray-200 rounded-md">First</button>
                        <button class="px-4 py-2 bg-gray-200 rounded-md">Previous</button>
                        <button class="px-4 py-2 bg-gray-200 rounded-md">Next</button>
                        <button class="px-4 py-2 bg-gray-200 rounded-md">Last</button>
                    </div>
                </div>
            </div>

            <!-- Add Blog Modal -->
            <div id="addBlogModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
                <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg">
                    <div class="flex justify-between items-center p-4 border-b">
                        <h2 class="text-xl font-semibold">Add New Blog</h2>
                        <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                            &times;
                        </button>
                    </div>
                    <div class="p-6">
                        @include('admin.Pages.blog-Add') <!-- Include the `blog-add.blade.php` form -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript for toggling modal visibility
            document.getElementById('openModal').addEventListener('click', function () {
                document.getElementById('addBlogModal').classList.remove('hidden');
            });

            document.getElementById('closeModal').addEventListener('click', function () {
                document.getElementById('addBlogModal').classList.add('hidden');
            });

            // Optional: Close modal when clicking outside
            window.addEventListener('click', function (event) {
                const modal = document.getElementById('addBlogModal');
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        </script>
    </body>
</x-admin-app-layout>
