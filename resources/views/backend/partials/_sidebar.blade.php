<aside :class="{'hidden': !isSidebarHidden, 'fixed': true, 'z-20': true, 'h-full': true, 'top-0': true, 'left-0': true, 'pt-16': true, 'flex': true, 'lg:flex': true, 'flex-shrink-0': true, 'flex-col': true, 'w-64': true, 'transition-width': true, 'duration-75': true}"
aria-label="Sidebar">
<div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 bg-white divide-y space-y-1">
            <ul class="space-y-2 pb-2">
                <li>
                    <Link href="/backend/dashboard"
                          class="{{ request()->is('backend/dashboard') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                    <i class="fa-solid fa-pager hover:text-gray-900"></i>
                    <span class="ml-3">Dashboard</span>
                    </Link>
                </li>
                @can('view toy purchases')
                    <li>
                        <Link href="/backend/toy_purchases"
                              class="{{ request()->is('backend/toy_purchases*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                        <i class="fa-solid fa-robot hover:text-gray-90"></i>
                        <span class="ml-3">Toy Purchases</span>
                        </Link>
                    </li>
                @endcan
                @can('view categories')
                    <li>
                        <Link href="/backend/categories"
                              class="{{ request()->is('backend/categories*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                        <i class="fa-solid fa-list hover:text-gray-90"></i>
                        <span class="ml-3">Categories</span>
                        </Link>
                    </li>
                @endcan
                @can('view products')
                    <li>
                        <Link href="/backend/products"
                              class="{{ request()->is('backend/products*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                        <i class="fa-solid fa-gift hover:text-gray-90"></i>
                        <span class="ml-3">Products</span>
                        </Link>
                    </li>
                @endcan

                @can('view settings')
                <li>
                    <Link href="/backend/settings"
                          class="{{ request()->is('backend/settings*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                        <i class="fa-solid fa-gear hover:text-gray-90"></i>
                        <span class="ml-3">Settings</span>
                    </Link>
                </li>
                @endcan

                @can('view menus')
                <li>
                    <Link href="/backend/menus"
                          class="{{ request()->is('backend/menus*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                        <i class="fa-solid fa-list hover:text-gray-90"></i>
                        <span class="ml-3">Menus</span>
                    </Link>
                </li>
                @endcan

                @can('view locales')
                <li>
                    <Link href="/backend/locales"
                          class="{{ request()->is('backend/locales*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base font-normal rounded-md flex items-center p-2 hover:text-white hover:bg-cyan-700 group">
                        <i class="fa-solid fa-language hover:text-gray-90"></i>
                        <span class="ml-3">Locales</span>
                    </Link>
                </li>
                @endcan

</ul>
            <div class="space-y-2 pt-2">
                @can('view administrators')
                    <Link href="{{ route('administrators.index') }}"
                          class="{{ request()->is('backend/administrators*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base text-cyan-700 font-normal rounded-lg hover:bg-cyan-700 hover:text-white group transition duration-75 flex items-center p-2">
                    <i class="fa-solid fa-users hover:text-gray-900"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Administrators</span>
                    </Link>
                @endcan
                @can('view roles')
                    <Link href="{{ route('roles.index') }}"
                          class="{{ request()->is('backend/roles*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base text-cyan-700 font-normal rounded-lg hover:bg-cyan-700 hover:text-white group transition duration-75 flex items-center p-2">
                    <i class="fa-solid fa-user-lock hover:text-gray-900"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Roles</span>
                    </Link>
                @endcan
                @can('view permissions')
                    <Link href="{{ route('permissions.index') }}"
                          class="{{ request()->is('backend/permissions*') ? 'bg-cyan-700 text-white' : 'text-cyan-700' }} text-base text-cyan-700 font-normal rounded-lg hover:bg-cyan-700 hover:text-white group transition duration-75 flex items-center p-2">
                    <i class="fa-solid fa-user-shield hover:text-gray-900"></i>
                    <span class="ml-3 flex-1 whitespace-nowrap">Permissions</span>
                    </Link>
                @endcan
            </div>
        </div>
    </div>
</div>
</aside>
