{{-- <div x-data="{ isCollapsed: false }">
    <nav class="bg-gray-800 p-4">
        <!-- Sidebar with Profile and Logout -->
        <div class="User">
            <ul class="space-y-4">
                <li class="list-none border-t border-gray-700">
                    <div class="px-4 pt-2">
                        <!-- Full Name and Email -->
                        <div x-show="!isCollapsed" class="flex flex-col">
                            <div class="font-medium text-gray-800 dark:text-gray-200 text-sm">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <!-- Circle (Initials) -->
                        <div x-show="isCollapsed" class="flex justify-center items-center">
                            <div class="w-10 h-10 bg-gray-800 text-white rounded-full flex justify-center items-center font-medium text-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col text-sm space-y-2">
                        <!-- Profile Link -->
                        <a href="{{ route('admin.profile.edit') }}" class="flex items-center justify-center p-2 text-[#9797A4] hover:bg-gray-700 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" 
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 15v-2m0 6v-2m0-6v-2"/>
                            </svg>
                            <span x-show="!isCollapsed" class="ml-3">Profile</span>
                        </a>

                        <!-- Log Out Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center justify-center p-2 w-full text-[#9797A4] hover:bg-gray-700 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" 
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                <span x-show="!isCollapsed" class="ml-3">Log Out</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Toggle Sidebar Collapse (Optional) -->
    <button @click="isCollapsed = !isCollapsed" class="text-white p-2 mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</div> --}}
