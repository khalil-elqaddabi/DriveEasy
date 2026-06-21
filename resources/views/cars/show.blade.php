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

        .de-back-btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            align-self: flex-start;
            border-radius: .85rem;
            border: 2px solid rgba(255, 255, 255, .3);
            background: rgba(255, 255, 255, .1);
            padding: .85rem 1.5rem;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            transition: all .2s;
        }

        .de-back-btn:hover {
            background: rgba(255, 255, 255, .2);
        }

        .de-container {
            max-width: 72rem;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .de-hero {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            height: 28rem;
            box-shadow: 0 20px 40px -20px rgba(15, 23, 42, .18);
            margin-bottom: 2.5rem;
        }

        .de-hero__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .de-hero__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.5) 40%, transparent 100%);
        }

        .de-hero__content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 2rem;
        }

        @media (min-width: 640px) {
            .de-hero__content {
                padding: 3rem;
            }
        }

        .de-hero__title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin: 0 0 .5rem;
        }

        @media (min-width: 640px) {
            .de-hero__title {
                font-size: 3.5rem;
            }
        }

        .de-hero__subtitle {
            font-size: 1.25rem;
            font-weight: 600;
            color: rgba(255, 255, 255, .8);
            margin: 0;
        }

        .de-hero__placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e1b2e, #312e81);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
        }

        .de-stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        @media (min-width: 640px) {
            .de-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .de-stats {
                grid-template-columns: repeat(4, 1fr);
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
            background: linear-gradient(90deg, var(--de-amber), var(--de-orange));
        }

        .de-stat__bar--d {
            background: linear-gradient(90deg, var(--de-rose), var(--de-red));
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
            color: var(--de-ink);
        }

        .de-stat__value--gradient {
            background-image: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .de-badge {
            display: inline-flex;
            align-items: center;
            padding: .5rem 1.25rem;
            border-radius: 999px;
            font-weight: 700;
            font-size: .875rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-top: .75rem;
        }

        .de-badge--available {
            background: linear-gradient(90deg, var(--de-emerald), var(--de-teal));
            color: #fff;
        }

        .de-badge--rented {
            background: linear-gradient(90deg, var(--de-rose), var(--de-red));
            color: #fff;
        }

        .de-badge--maintenance {
            background: linear-gradient(90deg, var(--de-amber), var(--de-orange));
            color: #fff;
        }

        .de-section-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--de-ink);
            margin: 3rem 0 1.5rem;
        }

        .de-desc-card {
            background: #fff;
            border-radius: 1.5rem;
            padding: 2rem;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 15px 30px -15px rgba(15, 23, 42, .12);
            color: #475569;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .de-features-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .de-features-list {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }

        .de-feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
            background: #fff;
            border-radius: 1.25rem;
            padding: 1.5rem;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 10px 20px -10px rgba(15, 23, 42, .08);
            transition: transform .25s;
        }

        .de-feature-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -15px rgba(15, 23, 42, .12);
        }

        .de-feature-item__icon {
            flex-shrink: 0;
            width: 3rem;
            height: 3rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
            color: var(--de-violet);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .de-feature-item__icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .de-feature-item__content h3 {
            margin: 0 0 .25rem;
            font-weight: 700;
            color: var(--de-ink);
            font-size: 1.1rem;
        }

        .de-feature-item__content p {
            margin: 0;
            color: var(--de-muted);
            font-size: .9rem;
            line-height: 1.5;
        }

        .de-empty-state {
            background: #f8fafc;
            border: 1px dashed var(--de-border);
            border-radius: 1.25rem;
            padding: 2rem;
            text-align: center;
            color: var(--de-muted);
            font-weight: 600;
        }

        .de-btn-action-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--de-border);
        }

        .de-btn-book {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 1rem;
            padding: 1rem 2rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan));
            box-shadow: 0 12px 24px -10px rgba(37, 99, 235, .45);
            transition: all .2s;
        }

        .de-btn-book:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px -10px rgba(37, 99, 235, .55);
        }

        .de-btn-edit {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 1rem;
            padding: 1rem 2rem;
            font-weight: 700;
            color: #b45309;
            text-decoration: none;
            background: #fffbeb;
            transition: all .2s;
        }

        .de-btn-edit:hover {
            background: #fef3c7;
            transform: translateY(-2px);
        }

        .de-btn-delete {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 1rem;
            border: none;
            padding: 1rem 2rem;
            font-weight: 700;
            color: #be123c;
            background: #fff1f2;
            cursor: pointer;
            transition: all .2s;
            font-size: 1rem;
            font-family: inherit;
        }

        .de-btn-delete:hover {
            background: #ffe4e6;
            transform: translateY(-2px);
        }

        .de-btn-back {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            border-radius: 1rem;
            padding: 1rem 2rem;
            font-weight: 700;
            color: var(--de-muted);
            text-decoration: none;
            border: 2px solid var(--de-border);
            background: #fff;
            transition: all .2s;
        }

        .de-btn-back:hover {
            background: #f8fafc;
            color: var(--de-ink);
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
        <a href="{{ route('cars.index') }}" class="de-back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
        <div class="de-header-row de-font">
            <div>
                <span class="de-eyebrow">Car Details</span>
                <h1 class="de-title">{{ $car->brand }} {{ $car->model }}</h1>
            </div>

            <a href="{{ route('cars.index') }}" class="de-back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Back to Fleet
            </a>
        </div>
    </x-slot>

    <div class="de-container de-font">

        <div class="de-hero">
            @if($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->brand }}" class="de-hero__img">
            @else
                <div class="de-hero__placeholder">No Image Available</div>
            @endif
            <div class="de-hero__overlay"></div>
            <div class="de-hero__content">
                <h1 class="de-hero__title">{{ $car->brand }} {{ $car->model }}</h1>
                <p class="de-hero__subtitle">Model Year {{ $car->year }}</p>
            </div>
        </div>

        <div class="de-stats">
            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--a"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Seats</p>
                    <h2 class="de-stat__value">{{ $car->seats }}</h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--b"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Price / Day</p>
                    <h2 class="de-stat__value de-stat__value--gradient">{{ $car->price_per_day }} <span
                            style="font-size: 1rem; color: #94a3b8;">DH</span></h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--c"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Year</p>
                    <h2 class="de-stat__value">{{ $car->year }}</h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--d"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Status</p>
                    @if($car->status == 'available')
                        <div class="de-badge de-badge--available">Available</div>
                    @elseif($car->status == 'rented')
                        <div class="de-badge de-badge--rented">Rented</div>
                    @else
                        <div class="de-badge de-badge--maintenance">Maintenance</div>
                    @endif
                </div>
            </div>
        </div>

        <h2 class="de-section-title">Description</h2>
        <div class="de-desc-card">
            {{ $car->description }}
        </div>

        <h2 class="de-section-title">Features</h2>
        @if($car->features->count())
            <div class="de-features-list">
                @foreach($car->features as $feature)
                    <div class="de-feature-item">
                        <div class="de-feature-item__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                        </div>
                        <div class="de-feature-item__content">
                            <h3>{{ $feature->name }}</h3>
                            <p>{{ $feature->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="de-empty-state">
                No features available for this car.
            </div>
        @endif

        <div class="de-btn-action-group">
            @if(Auth::user()->role == 'client')
                <a href="{{ route('bookings.create', $car) }}" class="de-btn-book">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    Book Now
                </a>
            @endif

            @if(Auth::user()->role == 'admin')
                <a href="{{ route('cars.edit', $car) }}" class="de-btn-edit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9" />
                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z" />
                    </svg>
                    Edit
                </a>

                <form action="{{ route('cars.destroy', $car) }}" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this car?')" class="de-btn-delete">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M4 7h16M10 11v6M14 11v6M6 7l1 13a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1l1-13M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                        Delete
                    </button>
                </form>
            @endif

            <a href="{{ route('cars.index') }}" class="de-btn-back">
                Back to Fleet
            </a>
        </div>

    </div>

</x-app-layout>
