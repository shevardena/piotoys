<nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" @click.prevent="toggle('isSidebarHidden')" aria-expanded="true" aria-controls="sidebar"
                        class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                    <svg id="toggleSidebarMobileHamburger" :class="{'w-6': true, 'h-6': true, 'hidden':     isSidebarHidden}" fill="currentColor" viewbox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" :class="{'w-6': true, 'h-6': true, 'hidden': !isSidebarHidden}" fill="currentColor" viewbox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ route('backend.dashboard') }}" class="text-xl font-bold flex items-center lg:ml-2.5">
                    <span class="self-center whitespace-nowrap">{{ env('APP_NAME') }}</span>
                </a>
            </div>
            <div class="flex items-center">

                <div class="relative inline-block text-left">
                    <x-splade-toggle data="showDropdown">
                        <button @click.prevent="toggle('showDropdown')" class="rounded-md px-4 py-2 flex items-center">
                            {{ auth()->user()->full_name ?? '' }}
                            <svg xmlns="http://www.w3.org/2000/svg" :class="{'transform rotate-180': showDropdown}" class="h-5 w-5 ml-2 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div v-show="showDropdown" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical">
                            <div class="py-1" role="none">
                                <Link href="{{ route('profile.edit') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Edit Profile</Link>
                                <Link method="POST" href="{{ route('backend.logout') }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem">Sign Out</Link>
                            </div>
                        </div>
                    </x-splade-toggle>
                </div>
            </div>
        </div>
    </div>
</nav>
