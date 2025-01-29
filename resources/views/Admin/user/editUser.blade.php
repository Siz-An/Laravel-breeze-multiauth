<x-admin-app-layout>
    <body class="bg-gray-50 font-sans">
        <div class="container mx-auto p-4">
            <div class="container pt-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Edit User") }}
                    </div>
                </div>

                <div class="w-full bg-white p-4 rounded-lg shadow-sm">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center justify-between mb-4">
                            <h1 class="text-xl font-bold text-gray-800 dark:text-gray-100">Edit User</h1>
                            <a href="{{ route('admin.user.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                                <button type="button" class="px-3 py-1 bg-gray-300 text-gray-700 rounded text-xs hover:bg-gray-400">Cancel</button>
                            </a>
                        </div>
                        <div class="space-y-2">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">User Name *</label>
                                    <input type="text" name="username"
                                        class="w-full px-2 py-1 border border-gray-300 rounded text-xs dark:text-gray-800"
                                        placeholder="Enter User name"
                                        value="{{ old('username', $user->username) }}" required>
                                    @error('username')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Fullname *</label>
                                    <input type="text" name="name"
                                        class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:text-gray-800"
                                        placeholder="Enter the name"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Password *</label>
                                <input type="password" name="password" 
                                    class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:text-gray-800" 
                                    placeholder="Enter the password">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password *</label>
                                <input type="password" name="password_confirmation" 
                                    class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:text-gray-800" 
                                    placeholder="Confirm the password">
                                @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                                    <input type="text" name="email"
                                        class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:text-gray-800"
                                        placeholder="Enter Email"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Contact</label>
                                    <input type="text" name="contact"
                                        class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:text-gray-800"
                                        placeholder="Enter Contact"
                                        value="{{ old('contact', $user->contact) }}">
                                    @error('contact')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Address</label>
                                <input type="text" name="address"
                                    class="w-full px-2 py-1 border border-gray-300 dark:border-gray-600 rounded text-xs dark:text-gray-800"
                                    placeholder="Enter Address"
                                    value="{{ old('address', $user->address) }}">
                                @error('address')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">Save</button>
                            <button type="reset"
                                class="px-3 py-1 bg-gray-300 text-gray-700 rounded text-xs hover:bg-gray-400">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-admin-app-layout>
