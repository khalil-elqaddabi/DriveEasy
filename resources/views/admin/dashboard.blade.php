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
        .de-stat__bar--3 { background: linear-gradient(90deg, var(--de-blue), var(--de-cyan)); }
        .de-stat__bar--4 { background: linear-gradient(90deg, var(--de-rose), #f97316); }
        .de-stat__body { padding: 1.5rem; }
        .de-stat__label { font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: #94a3b8; }
        .de-stat__value { margin-top: .5rem; font-size: 2.25rem; font-weight: 800; color: var(--de-ink); }

        .de-stat__value--emerald { color: var(--de-emerald); }

        .de-section-title { font-size: 1.5rem; font-weight: 800; color: var(--de-ink); margin-bottom: 1.5rem; }

        .de-grid-2 { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        @media (min-width: 768px) { .de-grid-2 { grid-template-columns: repeat(2, 1fr); } }

        .de-grid-3 { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        @media (min-width: 768px) { .de-grid-3 { grid-template-columns: repeat(3, 1fr); } }

        .de-quick-action { display: flex; align-items: center; gap: 1rem; padding: 1.5rem; background: #fff; border-radius: 1.5rem; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 15px 30px -15px rgba(15,23,42,.12); text-decoration: none; color: var(--de-ink); font-weight: 700; transition: all .2s; }
        .de-quick-action:hover { transform: translateY(-3px); box-shadow: 0 20px 40px -20px rgba(15,23,42,.2); border-color: var(--de-violet); }
        .de-quick-icon { width: 3rem; height: 3rem; border-radius: 1rem; background: #f5f3ff; color: var(--de-violet); display: flex; align-items: center; justify-content: center; }
        .de-quick-icon svg { width: 1.5rem; height: 1.5rem; }

        .de-badge { display: inline-flex; align-items: center; padding: .25rem .75rem; border-radius: 999px; font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; }
        .de-badge--pending { background: #fef3c7; color: #b45309; }
        .de-badge--approved { background: #d1fae5; color: #047857; }
        .de-badge--completed { background: #e0e7ff; color: #4338ca; }
        .de-badge--cancelled { background: #fee2e2; color: #b91c1c; }

        .de-table-card { background: #fff; border-radius: 1.5rem; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 20px 40px -20px rgba(15,23,42,.18); overflow: hidden; }
        .de-table { width: 100%; border-collapse: collapse; }
        .de-table th { background: #f8fafc; padding: 1rem 1.5rem; text-align: left; font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--de-muted); border-bottom: 1px solid var(--de-border); }
        .de-table td { padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--de-border); font-weight: 600; color: var(--de-ink); }
        .de-table tr:last-child td { border-bottom: none; }
    </style>

    


    <x-slot name="header">
        <div class="de-header-row de-font">
            <div>
                <span class="de-eyebrow">Admin Portal</span>
                <h1 class="de-title">Dashboard Overview</h1>
                <p class="de-subtitle">Monitor fleet status, recent bookings, and overall platform revenue.</p>
            </div>
        </div>
    </x-slot>

    <div class="de-stack de-font">

        {{-- Statistics --}}
        <div class="de-stats">
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--1"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Total Cars</p>
                    <h2 class="de-stat__value de-stat__value--gradient">{{ $totalCars }}</h2>
                </div>
            </div>
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--2"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Available Cars</p>
                    <h2 class="de-stat__value de-stat__value--emerald">{{ $availableCars }}</h2>
                </div>
            </div>
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--3"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Total Bookings</p>
                    <h2 class="de-stat__value text-[#2563eb]">{{ $totalBookings }}</h2>
                </div>
            </div>
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--4"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Total Revenue</p>
                    <h2 class="de-stat__value text-[#f43f5e]">{{ number_format($totalRevenue, 2) }} DH</h2>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div>
            <h2 class="de-section-title">Quick Actions</h2>
            <div class="de-grid-3">
                <a href="{{ route('cars.index') }}" class="de-quick-action">
                    <div class="de-quick-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                    </div>
                    View Cars
                </a>
                <a href="{{ route('features.index') }}" class="de-quick-action">
                    <div class="de-quick-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    View Features
                </a>
                <a href="{{ route('bookings.index') }}" class="de-quick-action">
                    <div class="de-quick-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    View Bookings
                </a>
            </div>
        </div>

        <div class="de-grid-2">
            {{-- Recent Bookings --}}
            <div>
                <h2 class="de-section-title">Recent Bookings</h2>
                <div class="de-table-card overflow-x-auto">
                    <table class="de-table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Car</th>
                                <th>Status</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBookings as $booking)
                                <tr>
                                    <td>
                                        <div class="font-extrabold">{{ $booking->user->name }}</div>
                                        <div class="text-xs text-[#64748b] font-medium">{{ \Carbon\Carbon::parse($booking->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($booking->end_date)->format('M d') }}</div>
                                    </td>
                                    <td>{{ $booking->car->brand }} {{ $booking->car->model }}</td>
                                    <td>
                                        <span class="de-badge de-badge--{{ strtolower($booking->status) }}">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td class="font-extrabold text-[#7c3aed]">{{ number_format($booking->total_price, 2) }} DH</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-[#64748b] py-8">No recent bookings.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Recent Cars --}}

        </div>

    </div>

</x-app-layout>
