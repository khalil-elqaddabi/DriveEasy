<nav x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200 shadow-sm font-['Plus_Jakarta_Sans',ui-sans-serif,system-ui,sans-serif]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 group">

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-r from-[#7c3aed] via-[#2563eb] to-[#06b6d4] flex items-center justify-center text-white text-xl shadow-lg group-hover:scale-110 transition-transform duration-300">

                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                        <circle cx="7" cy="17" r="2"/>
                        <path d="M9 17h6"/>
                        <circle cx="17" cy="17" r="2"/>
                    </svg>

                </div>

                <div>

                    <h1 class="text-2xl font-extrabold text-[#1e1b2e] tracking-tight">
                        DriveEasy
                    </h1>

                    <p class="text-[0.65rem] font-bold text-[#64748b] -mt-1 uppercase tracking-widest">
                        Premium Fleet
                    </p>

                </div>

            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-2">

                <a href="{{ route('dashboard') }}"
                    class="px-5 py-2.5 rounded-xl transition-all duration-200 font-semibold text-sm
                    {{ request()->routeIs('dashboard')
                        ? 'bg-[#f5f3ff] text-[#6d28d9] shadow-sm ring-1 ring-[#ddd6fe]'
                        : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#1e1b2e]' }}">
                    Dashboard
                </a>

                <a href="{{ route('cars.index') }}"
                    class="px-5 py-2.5 rounded-xl transition-all duration-200 font-semibold text-sm
                    {{ request()->routeIs('cars.*')
                        ? 'bg-[#f5f3ff] text-[#6d28d9] shadow-sm ring-1 ring-[#ddd6fe]'
                        : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#1e1b2e]' }}">
                    Cars
                </a>

                @if(Auth::user()->role == 'client')

                    <a href="{{ route('bookings.index') }}"
                        class="px-5 py-2.5 rounded-xl transition-all duration-200 font-semibold text-sm
                        {{ request()->routeIs('bookings.*')
                            ? 'bg-[#f5f3ff] text-[#6d28d9] shadow-sm ring-1 ring-[#ddd6fe]'
                            : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#1e1b2e]' }}">
                        My Bookings
                    </a>

                @endif

                @if(Auth::user()->role == 'admin')

                    <a href="{{ route('cars.create') }}"
                        class="px-5 py-2.5 rounded-xl transition-all duration-200 font-semibold text-sm
                        {{ request()->routeIs('cars.create')
                            ? 'bg-[#f5f3ff] text-[#6d28d9] shadow-sm ring-1 ring-[#ddd6fe]'
                            : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#1e1b2e]' }}">
                        Add Car
                    </a>

                    <a href="{{ route('features.index') }}"
                        class="px-5 py-2.5 rounded-xl transition-all duration-200 font-semibold text-sm
                        {{ request()->routeIs('features.*')
                            ? 'bg-[#f5f3ff] text-[#6d28d9] shadow-sm ring-1 ring-[#ddd6fe]'
                            : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#1e1b2e]' }}">
                        Features
                    </a>

                    <a href="{{ route('bookings.index') }}"
                        class="px-5 py-2.5 rounded-xl transition-all duration-200 font-semibold text-sm
                        {{ request()->routeIs('bookings.index')
                            ? 'bg-[#f5f3ff] text-[#6d28d9] shadow-sm ring-1 ring-[#ddd6fe]'
                            : 'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#1e1b2e]' }}">
                        All Bookings
                    </a>

                @endif

            </div>

            {{-- Right Side --}}
            <div class="hidden lg:flex items-center gap-4">

                <div class="text-right">

                    <p class="font-bold text-[#1e1b2e] text-sm">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-[0.65rem] font-bold text-[#64748b] uppercase tracking-widest">
                        {{ ucfirst(Auth::user()->role) }}
                    </p>

                </div>

                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">
                        <button class="w-11 h-11 rounded-full bg-gradient-to-r from-[#7c3aed] via-[#2563eb] to-[#06b6d4] text-white font-bold shadow-[0_10px_20px_-10px_rgba(37,99,235,0.5)] hover:-translate-y-0.5 hover:shadow-[0_15px_25px_-10px_rgba(37,99,235,0.6)] transition-all duration-300">
                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50/50">
                            <p class="font-bold text-[#1e1b2e] text-sm">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs font-medium text-[#64748b] truncate mt-0.5">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <div class="p-1">
                            <x-dropdown-link :href="route('profile.edit')" class="!rounded-lg hover:!bg-[#f5f3ff] hover:!text-[#6d28d9] font-semibold text-sm flex items-center gap-2">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="!rounded-lg hover:!bg-red-50 hover:!text-red-600 font-semibold text-sm flex items-center gap-2 text-red-500">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    Logout
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>

                </x-dropdown>

            </div>

            {{-- Mobile Button --}}
            <button
                @click="open=!open"
                class="lg:hidden w-11 h-11 rounded-xl bg-slate-50 hover:bg-slate-100 text-[#1e1b2e] transition-colors flex items-center justify-center border border-slate-200">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                        x-show="!open" />

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                        x-show="open" style="display: none;" />

                </svg>

            </button>

        </div>

    </div>

    {{-- Mobile Menu --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white border-t border-slate-200 shadow-xl absolute w-full" style="display: none;">

        <div class="px-4 py-6 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3.5 rounded-xl transition font-bold text-sm
               {{ request()->routeIs('dashboard')
                    ? 'bg-gradient-to-r from-[#7c3aed] to-[#2563eb] text-white shadow-md'
                    : 'hover:bg-slate-50 text-[#64748b] hover:text-[#1e1b2e]' }}">
                Dashboard
            </a>

            <a href="{{ route('cars.index') }}"
               class="block px-4 py-3.5 rounded-xl transition font-bold text-sm
               {{ request()->routeIs('cars.*')
                    ? 'bg-gradient-to-r from-[#7c3aed] to-[#2563eb] text-white shadow-md'
                    : 'hover:bg-slate-50 text-[#64748b] hover:text-[#1e1b2e]' }}">
                Cars
            </a>

            @if(Auth::user()->role == 'client')

                <a href="{{ route('bookings.index') }}"
                   class="block px-4 py-3.5 rounded-xl transition font-bold text-sm
                   {{ request()->routeIs('bookings.*')
                        ? 'bg-gradient-to-r from-[#7c3aed] to-[#2563eb] text-white shadow-md'
                        : 'hover:bg-slate-50 text-[#64748b] hover:text-[#1e1b2e]' }}">
                    My Bookings
                </a>

            @endif

            @if(Auth::user()->role == 'admin')

                <a href="{{ route('cars.create') }}"
                   class="block px-4 py-3.5 rounded-xl transition font-bold text-sm
                   {{ request()->routeIs('cars.create')
                        ? 'bg-gradient-to-r from-[#7c3aed] to-[#2563eb] text-white shadow-md'
                        : 'hover:bg-slate-50 text-[#64748b] hover:text-[#1e1b2e]' }}">
                    Add Car
                </a>

                <a href="{{ route('features.index') }}"
                   class="block px-4 py-3.5 rounded-xl transition font-bold text-sm
                   {{ request()->routeIs('features.*')
                        ? 'bg-gradient-to-r from-[#7c3aed] to-[#2563eb] text-white shadow-md'
                        : 'hover:bg-slate-50 text-[#64748b] hover:text-[#1e1b2e]' }}">
                    Features
                </a>

                <a href="{{ route('bookings.index') }}"
                   class="block px-4 py-3.5 rounded-xl transition font-bold text-sm
                   {{ request()->routeIs('bookings.index')
                        ? 'bg-gradient-to-r from-[#7c3aed] to-[#2563eb] text-white shadow-md'
                        : 'hover:bg-slate-50 text-[#64748b] hover:text-[#1e1b2e]' }}">
                    All Bookings
                </a>

            @endif

            <hr class="my-6 border-slate-100">

            <div class="flex items-center gap-4 px-4 mb-6">

                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#7c3aed] via-[#2563eb] to-[#06b6d4] flex items-center justify-center text-white font-bold shadow-md">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>

                <div>
                    <h3 class="font-bold text-[#1e1b2e]">
                        {{ Auth::user()->name }}
                    </h3>
                    <p class="text-[0.65rem] font-bold text-[#64748b] uppercase tracking-widest mt-0.5">
                        {{ ucfirst(Auth::user()->role) }}
                    </p>
                </div>

            </div>

            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-3 px-4 py-3.5 rounded-xl hover:bg-[#f5f3ff] text-[#64748b] hover:text-[#6d28d9] font-bold text-sm transition">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Profile Settings
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="w-full text-left flex items-center gap-3 px-4 py-3.5 rounded-xl hover:bg-red-50 text-red-500 hover:text-red-700 font-bold text-sm transition mt-1">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    Sign Out
                </button>
            </form>

        </div>

    </div>

</nav>
