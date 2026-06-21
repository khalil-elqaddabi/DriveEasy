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


        .de-input {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid var(--de-border);
            border-radius: 1rem;
            padding: 1rem 1.25rem 1rem 3rem;
            font-size: 1rem;
            color: var(--de-ink);
            background: #f8fafc;
        }

        .de-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, .3);
            border-color: var(--de-violet);
        }

        .de-btn-gradient {
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            color: #fff;
            border: none;
            border-radius: 1rem;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 0 12px 24px -10px rgba(37, 99, 235, .45);
        }

        .de-stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        @media (min-width: 768px) {
            .de-stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .de-stat {
            background: #fff;
            border-radius: 1.5rem;
            overflow: hidden;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 15px 30px -15px rgba(15, 23, 42, .12);
        }

        .de-stat__bar {
            height: 6px;
        }

        .de-stat__bar--a {
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue));
        }

        .de-stat__bar--b {
            background: linear-gradient(90deg, var(--de-emerald), var(--de-teal));
        }

        .de-stat__bar--c {
            background: linear-gradient(90deg, var(--de-amber), var(--de-rose));
        }

        .de-stat__body {
            padding: 1.5rem;
        }

        .de-stat__label {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .1em;
            color: #94a3b8;
        }

        .de-stat__value {
            margin-top: .5rem;
            font-size: 2.25rem;
            font-weight: 800;
        }

        .de-stat__value--gradient {
            background-image: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .de-stat__value--emerald {
            color: var(--de-emerald);
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
            gap: .75rem;
            margin-top: 1.25rem;
        }

        .de-spec {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .5rem .75rem;
            font-size: .875rem;
            font-weight: 600;
        }

        .de-spec svg {
            width: 1rem;
            height: 1rem;
        }

        .de-spec--violet {
            background: #f5f3ff;
            color: #6d28d9;
        }

        .de-spec--cyan {
            background: #ecfeff;
            color: #0e7490;
        }

        .de-chips {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
            margin-top: 1.25rem;
        }

        .de-chip {
            border-radius: 999px;
            padding: .3rem .8rem;
            font-size: .75rem;
            font-weight: 600;
        }

        .de-chip--violet {
            background: #f5f3ff;
            color: #6d28d9;
        }

        .de-chip--cyan {
            background: #ecfeff;
            color: #0e7490;
        }

        .de-chip--amber {
            background: #fffbeb;
            color: #b45309;
        }

        .de-chip--empty {
            background: #f8fafc;
            color: #94a3b8;
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
            gap: .5rem;
        }

        .de-btn-outline {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border: 2px solid #ddd6fe;
            color: #6d28d9;
            border-radius: .75rem;
            padding: .7rem 1.1rem;
            font-weight: 600;
            text-decoration: none;
            background: #fff;
        }

        .de-btn-outline svg {
            width: 1rem;
            height: 1rem;
        }

        .de-btn-book {
            border-radius: .75rem;
            padding: .7rem 1.25rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            box-shadow: 0 10px 20px -8px rgba(37, 99, 235, .4);
        }

        .de-btn-edit {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .7rem 1rem;
            font-weight: 600;
            background: #fffbeb;
            color: #b45309;
            text-decoration: none;
            border: none;
        }

        .de-btn-delete {
            display: inline-flex;
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
                <span class="de-eyebrow">DriveEasy Fleet</span>
                <h1 class="de-title">Find your next ride</h1>
                <p class="de-subtitle">Browse the fleet, check availability, and book in minutes.</p>
            </div>

            @if(Auth::user()->role == 'admin')
                <a href="{{ route('cars.create') }}" class="de-add-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Add a car
                </a>
            @endif
        </div>
    </x-slot>

    <div class="de-stack de-font">



        {{-- Statistics --}}
        <div class="de-stats">

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--a"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Total Cars</p>
                    <h2 class="de-stat__value de-stat__value--gradient">{{ $cars->count() }}</h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--b"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Available</p>
                    <h2 class="de-stat__value de-stat__value--emerald">{{ $cars->where('status', 'available')->count() }}
                    </h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--c"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Fleet Brand</p>
                    <h2 class="de-stat__value">DriveEasy</h2>
                </div>
            </div>

        </div>

        {{-- Cars Grid --}}
        @php
            $chipPalette = [
                ['class' => 'de-chip--violet'],
                ['class' => 'de-chip--cyan'],
                ['class' => 'de-chip--amber'],
            ];
            $statusMeta = [
                'available' => ['stripe' => 'de-card__stripe--available', 'pill' => 'de-pill--available', 'label' => 'Available'],
                'rented' => ['stripe' => 'de-card__stripe--rented', 'pill' => 'de-pill--rented', 'label' => 'Rented'],
                'maintenance' => ['stripe' => 'de-card__stripe--maintenance', 'pill' => 'de-pill--maintenance', 'label' => 'Maintenance'],
            ];
        @endphp

        <div class="de-grid">

            @forelse($cars as $car)

                @php $meta = $statusMeta[$car->status] ?? $statusMeta['maintenance']; @endphp

                <div class="de-card">

                    <div class="de-card__stripe {{ $meta['stripe'] }}"></div>

                    <div class="de-card__media">

                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" class="de-card__img">
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
                            @if($car->status == 'available')
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            @elseif($car->status == 'rented')
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <path d="M12 7v5l3 3" />
                                </svg>
                            @else
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M14.7 6.3a4 4 0 1 0-5.6 5.6l-5.6 5.6 2 2 5.6-5.6a4 4 0 0 0 5.6-5.6l-2.8-2.8-1.4 1.4Z" />
                                </svg>
                            @endif
                            <span>{{ $meta['label'] }}</span>
                        </div>
                    </div>

                    <div class="de-card__body">

                        <div class="de-card__top">
                            <div>
                                <h2 class="de-brand">{{ $car->brand }}</h2>
                                <p class="de-model">{{ $car->model }}</p>
                            </div>

                            <div class="de-price">
                                <p class="de-price__value">{{ $car->price_per_day }}</p>
                                <span class="de-price__unit">DH / day</span>
                            </div>
                        </div>

                        <div class="de-specs">
                            <span class="de-spec de-spec--violet">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="5" width="18" height="16" rx="2" />
                                    <path d="M3 9h18M8 3v4M16 3v4" />
                                </svg>
                                {{ $car->year }}
                            </span>

                            <span class="de-spec de-spec--cyan">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="8" cy="8" r="3" />
                                    <path d="M2 21c0-3.3 2.7-6 6-6s6 2.7 6 6" />
                                    <path d="M16 8a3 3 0 1 0 0-6" />
                                    <path d="M22 21c0-2.8-1.9-5.1-4.5-5.8" />
                                </svg>
                                {{ $car->seats }} seats
                            </span>
                        </div>

                        <div class="de-chips">
                            @forelse($car->features->take(3) as $feature)
                                @php $palette = $chipPalette[$loop->index % count($chipPalette)]; @endphp
                                <span class="de-chip {{ $palette['class'] }}">{{ $feature->name }}</span>
                            @empty
                                <span class="de-chip de-chip--empty">No features listed</span>
                            @endforelse
                        </div>

                        <div class="de-actions">

                            <a href="{{ route('cars.show', $car) }}" class="de-btn-outline">
                                Details
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M13 6l6 6-6 6" />
                                </svg>
                            </a>

                            @if(Auth::user()->role == 'client')

                                <a href="{{ route('bookings.create', $car) }}" class="de-btn-book">Book now</a>

                            @else

                                <div class="de-actions-group">

                                    <a href="{{ route('cars.edit', $car) }}" class="de-btn-edit">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('cars.destroy', $car) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this car?')"
                                            class="de-btn-delete">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path
                                                    d="M4 7h16M10 11v6M14 11v6M6 7l1 13a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1l1-13M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>

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
                                <path d="M3 17.5 4.6 13a2 2 0 0 1 1.9-1.4h11a2 2 0 0 1 1.9 1.4l1.6 4.5" />
                                <path
                                    d="M5 17.5h14a1.5 1.5 0 0 1 1.5 1.5v.5A1.5 1.5 0 0 1 19 21H5a1.5 1.5 0 0 1-1.5-1.5V19A1.5 1.5 0 0 1 5 17.5Z" />
                                <circle cx="7.5" cy="14.5" r=".75" fill="currentColor" stroke="none" />
                                <circle cx="16.5" cy="14.5" r=".75" fill="currentColor" stroke="none" />
                            </svg>
                        </div>
                        <h2 class="de-empty__title">No cars found</h2>
                        <p class="de-empty__text">There are currently no cars in the fleet.</p>

                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('cars.create') }}" class="de-empty__cta">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>
                                Add first car
                            </a>
                        @endif
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>
