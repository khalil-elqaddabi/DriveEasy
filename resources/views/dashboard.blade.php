<x-app-layout>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap');

        :root {
            --de-ink: #1e1b2e;
            --de-muted: #64748b;
            --de-violet: #7c3aed;
            --de-blue: #2563eb;
            --de-cyan: #06b6d4;
            --de-emerald: #10b981;
            --de-teal: #14b8a6;
            --de-rose: #f43f5e;
            --de-red: #ef4444;
            --de-amber: #f59e0b;
            --de-orange: #f97316;
            --de-border: #e2e4e8;
        }

        .de-font { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }

        .de-eyebrow { display: inline-flex; align-items: center; gap: .5rem; border-radius: 999px; background: rgba(255,255,255,.15); padding: .4rem 1rem; font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .15em; color: #fff; backdrop-filter: blur(4px); }
        .de-title { font-family: 'Plus Jakarta Sans', sans-serif; margin-top: .75rem; font-size: 2.25rem; font-weight: 800; letter-spacing: -0.02em; color: #fff; }
        .de-subtitle { margin-top: .5rem; max-width: 28rem; color: rgba(255,255,255,.85); }
        .de-header-row { display: flex; flex-direction: column; gap: 1.5rem; }
        @media (min-width: 640px) { .de-header-row { flex-direction: row; align-items: flex-end; justify-content: space-between; } }

        .de-stack { display: flex; flex-direction: column; gap: 2.5rem; margin: 2rem auto; max-width: 72rem; padding: 0 1rem; }

        .de-stats { display: grid; grid-template-columns: 1fr; gap: 1.25rem; }
        @media (min-width: 640px) { .de-stats { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1024px) { .de-stats { grid-template-columns: repeat(4, 1fr); } }

        .de-stat { background: #fff; border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 15px 30px -15px rgba(15,23,42,.12); }
        .de-stat__bar { height: 6px; }
        .de-stat__bar--1 { background: linear-gradient(90deg, var(--de-violet), var(--de-blue)); }
        .de-stat__bar--2 { background: linear-gradient(90deg, var(--de-emerald), var(--de-teal)); }
        .de-stat__body { padding: 1.5rem; }
        .de-stat__label { font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: #94a3b8; }
        .de-stat__value { margin-top: .5rem; font-size: 2.25rem; font-weight: 800; color: var(--de-ink); }
        .de-stat__value--gradient { background-image: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan)); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .de-stat__value--emerald { color: var(--de-emerald); }

        .de-section-title { font-size: 1.5rem; font-weight: 800; color: var(--de-ink); margin-bottom: 1.5rem; }

        .de-grid-2 { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        @media (min-width: 768px) { .de-grid-2 { grid-template-columns: repeat(2, 1fr); } }

        .de-card { display: flex; flex-direction: column; background: #fff; border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 20px 40px -20px rgba(15,23,42,.18); transition: transform .25s ease, box-shadow .25s ease; }
        .de-card:hover { transform: translateY(-4px); box-shadow: 0 28px 48px -18px rgba(15,23,42,.22); }
        .de-card__body { padding: 1.5rem; flex-grow: 1; }

        .de-quick-action { display: flex; align-items: center; gap: 1rem; padding: 1.5rem; background: #fff; border-radius: 1.5rem; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 15px 30px -15px rgba(15,23,42,.12); text-decoration: none; color: var(--de-ink); font-weight: 700; transition: all .2s; }
        .de-quick-action:hover { transform: translateY(-3px); box-shadow: 0 20px 40px -20px rgba(15,23,42,.2); border-color: var(--de-violet); }
        .de-quick-icon { width: 3rem; height: 3rem; border-radius: 1rem; background: #f5f3ff; color: var(--de-violet); display: flex; align-items: center; justify-content: center; }
        .de-quick-icon svg { width: 1.5rem; height: 1.5rem; }

        .de-badge { display: inline-flex; align-items: center; padding: .25rem .75rem; border-radius: 999px; font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; }
        .de-badge--pending { background: #fef3c7; color: #b45309; }
        .de-badge--approved { background: #d1fae5; color: #047857; }
        .de-badge--completed { background: #e0e7ff; color: #4338ca; }
        .de-badge--cancelled { background: #fee2e2; color: #b91c1c; }
    </style>

    <x-slot name="header">
        <div class="de-header-row de-font">
            <div>
                <span class="de-eyebrow">Client Portal</span>
                <h1 class="de-title">Welcome back, {{ explode(' ', Auth::user()->name)[0] }}!</h1>
                <p class="de-subtitle">Manage your current rentals and explore our premium fleet.</p>
            </div>
        </div>
    </x-slot>

    <div class="de-stack de-font">

        {{-- Statistics --}}
        <div class="de-stats" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--1"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">My Bookings</p>
                    <h2 class="de-stat__value de-stat__value--gradient">{{ $myBookings }}</h2>
                </div>
            </div>
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--2"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Active Bookings</p>
                    <h2 class="de-stat__value de-stat__value--emerald">{{ $activeBookings }}</h2>
                </div>
            </div>
        </div>

        <div class="de-grid-2">

            {{-- Latest Booking --}}
            <div>
                <h2 class="de-section-title">Latest Booking</h2>
                @if($latestBooking)
                    <div class="de-card">
                        <div class="h-1.5 bg-gradient-to-r from-[#7c3aed] to-[#2563eb]"></div>
                        <div class="de-card__body">
                            <div class="flex justify-between items-start mb-5">
                                <div>
                                    <h3 class="font-extrabold text-xl text-[#1e1b2e]">{{ $latestBooking->car->brand }} {{ $latestBooking->car->model }}</h3>
                                    <p class="text-[#64748b] font-semibold text-sm mt-0.5">{{ $latestBooking->car->year }}</p>
                                </div>
                                <span class="de-badge de-badge--{{ strtolower($latestBooking->status) }}">{{ $latestBooking->status }}</span>
                            </div>

                            <div class="bg-[#f8fafc] rounded-2xl p-5 mb-5 border border-slate-100">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-[0.7rem] font-bold text-[#64748b] uppercase tracking-widest mb-1.5">Pick-up</p>
                                        <p class="font-extrabold text-[#1e1b2e]">{{ \Carbon\Carbon::parse($latestBooking->start_date)->format('M d, Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-[0.7rem] font-bold text-[#64748b] uppercase tracking-widest mb-1.5">Drop-off</p>
                                        <p class="font-extrabold text-[#1e1b2e]">{{ \Carbon\Carbon::parse($latestBooking->end_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-auto pt-4 border-t border-slate-100">
                                <span class="text-[#64748b] font-bold">Total Price</span>
                                <span class="text-xl font-extrabold text-[#7c3aed]">{{ number_format($latestBooking->total_price, 2) }} DH</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="de-card" style="min-height: 300px;">
                        <div class="de-card__body flex flex-col items-center justify-center text-center py-10">
                            <div class="w-20 h-20 bg-[#f5f3ff] rounded-full flex items-center justify-center text-[#7c3aed] mb-5 shadow-inner">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                            <h3 class="font-extrabold text-xl text-[#1e1b2e]">No bookings yet</h3>
                            <p class="text-[#64748b] font-medium mt-2 mb-8 max-w-xs mx-auto">You haven't rented any cars yet. Explore our premium fleet to get started.</p>
                            <a href="{{ route('cars.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-[#7c3aed] via-[#2563eb] to-[#06b6d4] text-white px-8 py-3.5 rounded-xl font-bold shadow-[0_10px_20px_-10px_rgba(37,99,235,0.5)] hover:-translate-y-0.5 hover:shadow-[0_15px_25px_-10px_rgba(37,99,235,0.6)] transition-all">
                                Browse Cars
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Quick Actions --}}
            <div>
                <h2 class="de-section-title">Quick Actions</h2>
                <div class="flex flex-col gap-4">
                    <a href="{{ route('cars.index') }}" class="de-quick-action" style="padding: 1.5rem;">
                        <div class="de-quick-icon bg-gradient-to-br from-[#eff6ff] to-[#dbeafe] text-[#2563eb] shadow-sm">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                                <circle cx="7" cy="17" r="2"/>
                                <path d="M9 17h6"/>
                                <circle cx="17" cy="17" r="2"/>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-0.5">
                            <span class="font-extrabold text-[#1e1b2e] text-lg">Browse Cars</span>
                            <span class="text-sm text-[#64748b] font-semibold">Explore our premium fleet</span>
                        </div>
                        <svg class="ml-auto w-6 h-6 text-[#cbd5e1]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="{{ route('bookings.index') }}" class="de-quick-action" style="padding: 1.5rem;">
                        <div class="de-quick-icon bg-gradient-to-br from-[#f5f3ff] to-[#ede9fe] text-[#7c3aed] shadow-sm">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-0.5">
                            <span class="font-extrabold text-[#1e1b2e] text-lg">My Bookings</span>
                            <span class="text-sm text-[#64748b] font-semibold">View and manage your rentals</span>
                        </div>
                        <svg class="ml-auto w-6 h-6 text-[#cbd5e1]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

    </div>

</x-app-layout>
