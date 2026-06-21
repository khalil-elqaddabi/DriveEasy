
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

        .de-back-btn { display: inline-flex; align-items: center; gap: .5rem; align-self: flex-start; border-radius: .85rem; border: 2px solid rgba(255,255,255,.3); background: rgba(255,255,255,.1); padding: .85rem 1.5rem; font-weight: 600; color: #fff; text-decoration: none; transition: all .2s; }
        .de-back-btn:hover { background: rgba(255,255,255,.2); }

        .de-container { max-width: 64rem; margin: 2rem auto; padding: 0 1rem; }

        .de-grid-layout { display: grid; grid-template-columns: 1fr; gap: 2rem; }
        @media (min-width: 1024px) { .de-grid-layout { grid-template-columns: 1fr 2fr; } }

        .de-card { background: #fff; border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 20px 40px -20px rgba(15,23,42,.18); height: fit-content; }

        .de-card__stripe { height: 6px; background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan)); }

        .de-card__media { position: relative; overflow: hidden; }
        .de-card__img { width: 100%; height: 14rem; object-fit: cover; display: block; }
        .de-card__placeholder { width: 100%; height: 14rem; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: .5rem; background: linear-gradient(135deg, #f5f3ff, #eff6ff, #ecfeff); color: #a78bfa; }
        .de-card__placeholder svg { width: 2.5rem; height: 2.5rem; }
        .de-card__placeholder span { font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; }

        .de-card__body { padding: 1.5rem; }
        .de-brand { font-size: 1.5rem; font-weight: 700; color: var(--de-ink); margin: 0; }
        .de-model { color: #64748b; margin: .15rem 0 0; }

        .de-price-box { margin-top: 1.5rem; padding: 1.25rem; background: #f8fafc; border-radius: 1rem; border: 1px solid var(--de-border); display: flex; align-items: center; justify-content: space-between; }
        .de-price-box__label { font-size: .875rem; font-weight: 700; color: var(--de-muted); text-transform: uppercase; letter-spacing: .05em; }
        .de-price-box__value { font-size: 1.5rem; font-weight: 800; background-image: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan)); -webkit-background-clip: text; background-clip: text; color: transparent; margin: 0; }
        .de-price-box__unit { font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: #94a3b8; }

        .de-card-form { background: #fff; border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 20px 40px -20px rgba(15,23,42,.18); }
        .de-card-form__stripe { height: 6px; background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan)); }
        .de-card-form__body { padding: 2rem; }
        @media (min-width: 640px) { .de-card-form__body { padding: 2.5rem; } }

        .de-form-grid { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        @media (min-width: 768px) { .de-form-grid { grid-template-columns: repeat(2, 1fr); gap: 2rem; } }

        .de-form-group { display: flex; flex-direction: column; gap: .5rem; }
        .de-label { font-size: .875rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--de-ink); }

        .de-input { width: 100%; box-sizing: border-box; border: 1px solid var(--de-border); border-radius: 1rem; padding: 1rem 1.25rem; font-size: 1rem; font-family: inherit; color: var(--de-ink); background: #f8fafc; transition: all .2s; }
        .de-input:focus { outline: none; box-shadow: 0 0 0 4px rgba(124,58,237,.15); border-color: var(--de-violet); background: #fff; }

        .de-actions-row { display: flex; flex-direction: column-reverse; gap: 1rem; margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid var(--de-border); }
        @media (min-width: 640px) { .de-actions-row { flex-direction: row; align-items: center; justify-content: flex-end; } }

        .de-btn-cancel { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; border-radius: 1rem; border: 2px solid var(--de-border); background: #fff; padding: 1rem 2rem; font-weight: 700; font-size: 1rem; color: var(--de-muted); text-decoration: none; transition: all .2s; cursor: pointer; }
        .de-btn-cancel:hover { background: #f8fafc; color: var(--de-ink); border-color: #cbd5e1; }

        .de-btn-gradient { display: inline-flex; align-items: center; justify-content: center; gap: .5rem; background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan)); color: #fff; border: none; border-radius: 1rem; padding: 1rem 2rem; font-weight: 700; font-size: 1rem; cursor: pointer; box-shadow: 0 12px 24px -10px rgba(37,99,235,.45); transition: all .2s; }
        .de-btn-gradient:hover { transform: translateY(-2px); box-shadow: 0 16px 32px -10px rgba(37,99,235,.55); }

        .de-alert { display: flex; flex-direction: column; gap: .75rem; background: #fef2f2; border: 1px solid #fecaca; border-radius: 1rem; padding: 1.5rem; margin-bottom: 2rem; }
        .de-alert__header { display: flex; align-items: center; gap: .75rem; font-weight: 700; color: #991b1b; font-size: 1.125rem; }
        .de-alert__header svg { width: 1.5rem; height: 1.5rem; }
        .de-alert__list { margin: 0; padding-left: 1.5rem; color: #b91c1c; font-weight: 500; }
        .de-alert__list li { margin-bottom: .25rem; }

        .mt-6 { margin-top: 1.5rem; }
        .full-width { grid-column: 1 / -1; }
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
        <a href="{{ route('bookings.index') }}" class="de-back-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 19l-7-7 7-7" />
    </svg>
    Back
</a>
        <div class="de-header-row de-font">
            <div>
                <span class="de-eyebrow">DriveEasy Reservation</span>
                <h1 class="de-title">Complete your booking</h1>
                <p class="de-subtitle">Select your dates and pickup location to finalize your reservation.</p>
            </div>

            <a href="{{ route('cars.index') }}" class="de-back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Back to Fleet
            </a>
        </div>
    </x-slot>

    <div class="de-container de-font">

        @if ($errors->any())
            <div class="de-alert">
                <div class="de-alert__header">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    Please fix the following errors:
                </div>
                <ul class="de-alert__list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="de-grid-layout">

            <!-- Selected Car Summary -->
            <div class="de-card">
                <div class="de-card__stripe"></div>
                <div class="de-card__media">
                    @if($car->image)
                        <img src="{{ asset('storage/'.$car->image) }}" class="de-card__img" alt="{{ $car->brand }} {{ $car->model }}">
                    @else
                        <div class="de-card__placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 17.5 4.6 13a2 2 0 0 1 1.9-1.4h11a2 2 0 0 1 1.9 1.4l1.6 4.5" />
                                <path d="M5 17.5h14a1.5 1.5 0 0 1 1.5 1.5v.5A1.5 1.5 0 0 1 19 21H5a1.5 1.5 0 0 1-1.5-1.5V19A1.5 1.5 0 0 1 5 17.5Z" />
                                <circle cx="7.5" cy="14.5" r=".75" fill="currentColor" stroke="none" />
                                <circle cx="16.5" cy="14.5" r=".75" fill="currentColor" stroke="none" />
                            </svg>
                            <span>No image</span>
                        </div>
                    @endif
                </div>

                <div class="de-card__body">
                    <h2 class="de-brand">{{ $car->brand }}</h2>
                    <p class="de-model">{{ $car->model }}</p>

                    <div class="de-price-box">
                        <span class="de-price-box__label">Price</span>
                        <div>
                            <span class="de-price-box__value">{{ $car->price_per_day }}</span>
                            <span class="de-price-box__unit">DH / day</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="de-card-form">
                <div class="de-card-form__stripe"></div>

                <div class="de-card-form__body">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">

                        <div class="de-form-grid">

                            <div class="de-form-group">
                                <label class="de-label">Start Date</label>
                                <input type="date" name="start_date" value="{{ old('start_date') }}" class="de-input" required>
                            </div>

                            <div class="de-form-group">
                                <label class="de-label">End Date</label>
                                <input type="date" name="end_date" value="{{ old('end_date') }}" class="de-input" required>
                            </div>

                            <div class="de-form-group full-width">
                                <label class="de-label">Pickup Location</label>
                                <input type="text" name="pickup_location" value="{{ old('pickup_location') }}" class="de-input" placeholder="e.g. Casablanca Airport, Rabat City Center..." required>
                            </div>

                        </div>

                        <div class="de-actions-row">
                            <a href="{{ route('cars.index') }}" class="de-btn-cancel">
                                Cancel
                            </a>

                            <button type="submit" class="de-btn-gradient">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                    <polyline points="17 21 17 13 7 13 7 21"/>
                                    <polyline points="7 3 7 8 15 8"/>
                                </svg>
                                Confirm Booking
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

</x-app-layout>
