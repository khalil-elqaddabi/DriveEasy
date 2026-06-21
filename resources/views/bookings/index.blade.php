<!-- resources/views/bookings/index.blade.php -->
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

        .de-font {
            font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
        }

        .de-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, .15);
            padding: .4rem 1rem;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .15em;
            color: #fff;
            backdrop-filter: blur(4px);
        }

        .de-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin-top: .75rem;
            font-size: 2.25rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #fff;
        }

        .de-subtitle {
            margin-top: .5rem;
            max-width: 28rem;
            color: rgba(255, 255, 255, .85);
        }

        .de-header-row {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .de-header-row {
                flex-direction: row;
                align-items: flex-end;
                justify-content: space-between;
            }
        }

        .de-add-btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            align-self: flex-start;
            border-radius: .85rem;
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            padding: .85rem 1.5rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 12px 24px -10px rgba(124, 58, 237, .5);
        }

        .de-stack {
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
        }

        .de-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .de-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1280px) {
            .de-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .de-card {
            background: #fff;
            border-radius: 1.5rem;
            overflow: hidden;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 20px 40px -20px rgba(15, 23, 42, .18);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .de-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 28px 48px -18px rgba(15, 23, 42, .22);
        }

        .de-card__stripe {
            height: 6px;
        }

        .de-card__stripe--available {
            background: linear-gradient(90deg, var(--de-emerald), var(--de-teal));
        }

        .de-card__stripe--rented {
            background: linear-gradient(90deg, var(--de-rose), var(--de-red));
        }

        .de-card__stripe--maintenance {
            background: linear-gradient(90deg, var(--de-amber), var(--de-orange));
        }

        .de-card__stripe--violet {
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue));
        }

        .de-card__media {
            position: relative;
            overflow: hidden;
        }

        .de-card__img {
            width: 100%;
            height: 16rem;
            object-fit: cover;
            display: block;
        }

        .de-card__placeholder {
            width: 100%;
            height: 16rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            background: linear-gradient(135deg, #f5f3ff, #eff6ff, #ecfeff);
            color: #a78bfa;
        }

        .de-card__placeholder svg {
            width: 2.5rem;
            height: 2.5rem;
        }

        .de-card__placeholder span {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .1em;
        }

        .de-pill {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .4rem 1rem;
            border-radius: 999px;
            color: #fff;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            box-shadow: 0 10px 18px -6px rgba(0, 0, 0, .3);
        }

        .de-pill svg {
            width: .9rem;
            height: .9rem;
        }

        .de-pill--available {
            background: linear-gradient(90deg, var(--de-emerald), var(--de-teal));
        }

        .de-pill--rented {
            background: linear-gradient(90deg, var(--de-rose), var(--de-red));
        }

        .de-pill--maintenance {
            background: linear-gradient(90deg, var(--de-amber), var(--de-orange));
        }

        .de-pill--violet {
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue));
        }

        .de-card__body {
            padding: 1.5rem;
        }

        .de-card__top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: .75rem;
        }

        .de-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--de-ink);
            margin: 0;
        }

        .de-model {
            color: #64748b;
            margin: .15rem 0 0;
        }

        .de-price {
            text-align: right;
        }

        .de-price__value {
            font-size: 1.5rem;
            font-weight: 800;
            background-image: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin: 0;
        }

        .de-price__unit {
            display: block;
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #94a3b8;
        }

        .de-specs {
            display: flex;
            flex-direction: column;
            gap: .75rem;
            margin-top: 1.25rem;
        }

        .de-spec {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: .75rem;
            padding: .5rem .75rem;
            font-size: .875rem;
            font-weight: 600;
        }

        .de-spec svg {
            width: 1.1rem;
            height: 1.1rem;
            flex-shrink: 0;
        }

        .de-spec--violet {
            background: #f5f3ff;
            color: #6d28d9;
        }

        .de-spec--cyan {
            background: #ecfeff;
            color: #0e7490;
        }

        .de-spec--amber {
            background: #fffbeb;
            color: #b45309;
        }

        .de-client-info {
            display: flex;
            align-items: center;
            gap: .6rem;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px dashed var(--de-border);
        }

        .de-client-info svg {
            width: 1.25rem;
            height: 1.25rem;
            color: var(--de-muted);
        }

        .de-client-name {
            font-weight: 700;
            color: var(--de-ink);
            font-size: .875rem;
        }

        .de-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            margin-top: 1.75rem;
        }

        .de-actions-group {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            width: 100%;
        }

        .de-btn-confirm {
            flex: 1;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .7rem 1rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(90deg, var(--de-emerald), var(--de-teal));
            box-shadow: 0 10px 20px -8px rgba(16, 185, 129, .4);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .de-btn-complete {
            flex: 1;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .7rem 1rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue));
            box-shadow: 0 10px 20px -8px rgba(124, 58, 237, .4);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .de-btn-delete {
            flex: 1;
            text-align: center;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .7rem 1rem;
            font-weight: 600;
            background: #fff1f2;
            color: #be123c;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .de-empty {
            text-align: center;
            background: #fff;
            border-radius: 1.5rem;
            padding: 4rem 2rem;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 20px 40px -20px rgba(15, 23, 42, .15);
        }

        .de-empty__icon {
            width: 5rem;
            height: 5rem;
            margin: 0 auto;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f3ff, #eff6ff, #ecfeff);
            color: #a78bfa;
        }

        .de-empty__icon svg {
            width: 2.5rem;
            height: 2.5rem;
        }

        .de-empty__title {
            margin-top: 1.5rem;
            font-size: 1.875rem;
            font-weight: 800;
            color: #1e293b;
        }

        .de-empty__text {
            margin-top: .75rem;
            color: #64748b;
        }

        .de-empty__cta {
            margin-top: 2rem;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 1rem;
            padding: 1rem 2rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            box-shadow: 0 10px 20px -8px rgba(37, 99, 235, .4);
        }
        .de-back-btn {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    padding: .85rem 1.4rem;
    border-radius: .85rem;
    background: #ffffff;
    color: #1e1b2e;
    text-decoration: none;
    font-weight: 600;
    border: 1px solid rgba(15, 23, 42, .08);
    box-shadow: 0 12px 24px -12px rgba(15, 23, 42, .18);
    transition: all .25s ease;
}

.de-back-btn:hover {
    transform: translateY(-2px);
    background: #f8fafc;
    border-color: #7c3aed;
    color: #7c3aed;
}

.de-back-btn svg {
    width: 20px;
    height: 20px;
}
    </style>

    <x-slot name="header">
        <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="de-back-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 19l-7-7 7-7" />
    </svg>
    Back
</a>
        <div class="de-header-row de-font">
            <div>
                <span class="de-eyebrow">DriveEasy Bookings</span>
                <h1 class="de-title">
                    @if(Auth::user()->role == 'admin')
                        All Bookings
                    @else
                        My Bookings
                    @endif
                </h1>
                <p class="de-subtitle">
                    @if(Auth::user()->role == 'admin')
                        Manage all client reservations, confirm availability, and oversee fleet rentals.
                    @else
                        View your reservation history and manage your upcoming trips.
                    @endif
                </p>
            </div>

            <a href="{{ route('cars.index') }}" class="de-add-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="16" />
                    <line x1="8" y1="12" x2="16" y2="12" />
                </svg>
                Book a Car
            </a>
        </div>
    </x-slot>

    <div class="de-stack de-font">

        @php
            $statusMeta = [
                'pending' => ['stripe' => 'de-card__stripe--maintenance', 'pill' => 'de-pill--maintenance', 'label' => 'Pending'],
                'confirmed' => ['stripe' => 'de-card__stripe--available', 'pill' => 'de-pill--available', 'label' => 'Confirmed'],
                'completed' => ['stripe' => 'de-card__stripe--violet', 'pill' => 'de-pill--violet', 'label' => 'Completed'],
                'cancelled' => ['stripe' => 'de-card__stripe--rented', 'pill' => 'de-pill--rented', 'label' => 'Cancelled'],
            ];
        @endphp

        <div class="de-grid">

            @forelse($bookings as $booking)

                @php $meta = $statusMeta[$booking->status] ?? $statusMeta['pending']; @endphp

                <div class="de-card">

                    <div class="de-card__stripe {{ $meta['stripe'] }}"></div>

                    <div class="de-card__media">

                        @if($booking->car->image)
                            <img src="{{ asset('storage/' . $booking->car->image) }}" class="de-card__img">
                        @else
                            <div class="de-card__placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 17.5 4.6 13a2 2 0 0 1 1.9-1.4h11a2 2 0 0 1 1.9 1.4l1.6 4.5" />
                                    <path
                                        d="M5 17.5h14a1.5 1.5 0 0 1 1.5 1.5v.5A1.5 1.5 0 0 1 19 21H5a1.5 1.5 0 0 1-1.5-1.5V19A1.5 1.5 0 0 1 5 17.5Z" />
                                    <circle cx="7.5" cy="14.5" r=".75" fill="currentColor" stroke="none" />
                                    <circle cx="16.5" cy="14.5" r=".75" fill="currentColor" stroke="none" />
                                </svg>
                                <span>No image</span>
                            </div>
                        @endif

                        <div class="de-pill {{ $meta['pill'] }}">
                            @if($booking->status == 'confirmed' || $booking->status == 'completed')
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            @elseif($booking->status == 'cancelled')
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18M6 6l12 12" />
                                </svg>
                            @else
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                            @endif
                            <span>{{ $meta['label'] }}</span>
                        </div>
                    </div>

                    <div class="de-card__body">

                        <div class="de-card__top">
                            <div>
                                <h2 class="de-brand">{{ $booking->car->brand }}</h2>
                                <p class="de-model">{{ $booking->car->model }}</p>
                            </div>

                            <div class="de-price">
                                <p class="de-price__value">{{ $booking->total_price }}</p>
                                <span class="de-price__unit">Total (DH)</span>
                            </div>
                        </div>

                        <div class="de-specs">
                            <span class="de-spec de-spec--violet">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                                {{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }} -
                                {{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}
                            </span>

                            <span class="de-spec de-spec--cyan">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                {{ $booking->pickup_location }}
                            </span>
                        </div>

                        @if(Auth::user()->role == 'admin')
                            <div class="de-client-info">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span class="de-client-name">{{ $booking->user->name }}</span>
                            </div>
                        @endif

                        <div class="de-actions">

                            @if(Auth::user()->role == 'client')

                                @if($booking->status == 'pending')
                                    <form action="{{ route('bookings.update', $booking) }}" method="POST">
    @csrf
    @method('PATCH')
                                        <button type="submit" onclick="return confirm('Cancel this booking?')" class="de-btn-delete"
                                            style="width: 100%;">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 6 6 18M6 6l12 12" />
                                            </svg>
                                            Cancel Booking
                                        </button>
                                    </form>
                                @endif

                            @else

                                <div class="de-actions-group">
                                    @if($booking->status == 'pending')
                                       <form action="{{ route('bookings.update', $booking) }}" method="POST" style="flex: 1;">
    @csrf
    @method('PATCH')

    <input type="hidden" name="status" value="confirmed">

    <button type="submit" class="de-btn-confirm" style="width: 100%;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 6 9 17l-5-5" />
        </svg>
        Confirm
    </button>
</form>

                                        <form action="{{ route('bookings.update', $booking) }}" method="POST" style="flex: 1;">
    @csrf
    @method('PATCH')

    <input type="hidden" name="status" value="cancelled">

    <button type="submit" onclick="return confirm('Cancel this booking?')" class="de-btn-delete" style="width: 100%;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18M6 6l12 12" />
        </svg>
        Cancel
    </button>
</form>
                                    @elseif($booking->status == 'confirmed')
                                      <form action="{{ route('bookings.update', $booking) }}" method="POST" style="flex: 1;">
    @csrf
    @method('PATCH')

    <input type="hidden" name="status" value="completed">

    <button type="submit" class="de-btn-complete" style="width: 100%;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
            <polyline points="22 4 12 14.01 9 11.01" />
        </svg>
        Complete
    </button>
</form>
                                    @endif
                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div style="grid-column: 1 / -1;">
                    <div class="de-empty">
                        <div class="de-empty__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                            </svg>
                        </div>
                        <h2 class="de-empty__title">No bookings found</h2>
                        <p class="de-empty__text">
                            @if(Auth::user()->role == 'admin')
                                There are currently no bookings in the system.
                            @else
                                You haven't made any bookings yet.
                            @endif
                        </p>

                        @if(Auth::user()->role == 'client')
                            <a href="{{ route('cars.index') }}" class="de-empty__cta">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="16" />
                                    <line x1="8" y1="12" x2="16" y2="12" />
                                </svg>
                                Book your first car
                            </a>
                        @endif
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>
