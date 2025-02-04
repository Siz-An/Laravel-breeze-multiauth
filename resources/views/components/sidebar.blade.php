<nav x-data="{ isCollapsed: false }">
    <div :class="isCollapsed ? 'w-20' : 'w-64'" class="bg-[#10101E] shadow-lg h-screen p-4 pb-8 flex flex-col transition-all duration-300 "> 
        <div class="flex flex-col h-full">
            <div class="flex justify-between items-center mb-2">
                <h2 x-show="!isCollapsed" class="text-xl font-bold text-[#9797A4]">CMS</h2>
                <button @click="isCollapsed = !isCollapsed; $dispatch('collapse')" class="text-[#9797A4] p-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18M3 12h18M3 18h18"/>
                    </svg>
                </button>
            </div>
            <!-- Sidebar Items -->
            <ul class="space-y-2 flex-1 overflow-y-auto">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 12l9-9 9 9"/>
                            <path d="M9 21V9h6v12"/>
                        </svg>
                        <span x-show="!isCollapsed" class="ml-3">Dashboard</span>
                    </a>
                </li>
                <!-- User Management -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 21v-2a4 4 0 0 0-4-4h-4a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <span x-show="!isCollapsed" class="ml-3">User Management</span>
                        </summary>
                        <ul x-show="!isCollapsed" class="pl-4 mt-2 text-sm space-y-1">
                            {{-- <li><a href="{{route('admin.user.manageUser')}}" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Manage User</a></li> --}}
                            <li><a href="#" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Manage Permission</a></li>
                        </ul>
                    </details>
                </li>
                <!-- Blog Management -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <span x-show="!isCollapsed" class="ml-3">Blog Management</span>
                        </summary>
                        <ul x-show="!isCollapsed" class="pl-4 mt-2 text-sm space-y-1">
                            <li><a href="{{route('admin.blog.blogCategory')}}" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Blog Category</a></li>
                            <li><a href="{{ route('admin.blogSetup.index') }}" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Blog Setup</a></li>
                        </ul>
                    </details>
                </li>
                <!-- Media Management -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 16l4-4 4 4 4-4 4 4 4-4"/>
                            </svg>
                            <span x-show="!isCollapsed" class="ml-3">Media Management</span>
                        </summary>
                        <ul x-show="!isCollapsed" class="pl-4 mt-2 text-sm space-y-1">
                            <li><a href="#" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Gallery Category Setup</a></li>
                            <li><a href="#" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Preview</a></li>
                        </ul>
                    </details>
                </li>
                <!-- Settings -->
                <li>
                    <details class="group">
                        <summary class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v2M12 20v2M4.93 4.93l1.42 1.42M16.24 16.24l1.42 1.42M2 12h2M20 12h2M4.93 19.07l1.42-1.42M16.24 7.76l1.42-1.42"/>
                            </svg>
                            <span x-show="!isCollapsed" class="ml-3">Settings</span>
                        </summary>
                        <ul x-show="!isCollapsed" class="pl-4 mt-2 text-sm space-y-1">
                            <li><a href="#" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Website Heading & Logo Setting</a></li>
                            <li><a href="#" class="flex items-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">Footer Setting</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>
</nav>
