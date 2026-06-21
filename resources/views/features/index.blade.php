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
            transition: transform .2s, box-shadow .2s;
        }

        .de-add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px -10px rgba(124, 58, 237, .6);
        }

        .de-stack {
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
            margin: 2rem auto;
            max-width: 72rem;
            padding: 0 1rem;
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
            color: var(--de-ink);
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
            gap: 1.5rem;
        }

        @media (min-width: 640px) {
            .de-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .de-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
            }
        }

        .de-card {
            display: flex;
            flex-direction: column;
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
            background: linear-gradient(90deg, var(--de-violet), var(--de-blue));
        }

        .de-card__body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .de-feature-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 1rem;
            background: #f5f3ff;
            color: var(--de-violet);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .de-feature-icon svg {
            width: 1.5rem;
            height: 1.5rem;
        }

        .de-brand {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--de-ink);
            margin: 0;
        }

        .de-model {
            color: var(--de-muted);
            margin: .25rem 0 0;
            font-size: .95rem;
            line-height: 1.5;
            flex-grow: 1;
        }

        .de-actions {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-top: auto;
            padding-top: 1.25rem;
            border-top: 1px solid var(--de-border);
        }

        .de-btn-edit {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .6rem 1rem;
            font-weight: 600;
            background: #fffbeb;
            color: #b45309;
            text-decoration: none;
            border: none;
            font-size: .9rem;
            transition: background .2s;
        }

        .de-btn-edit:hover {
            background: #fef3c7;
        }

        .de-btn-delete {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            border-radius: .75rem;
            padding: .6rem 1rem;
            font-weight: 600;
            background: #fff1f2;
            color: #be123c;
            border: none;
            cursor: pointer;
            font-size: .9rem;
            font-family: inherit;
            transition: background .2s;
        }

        .de-btn-delete:hover {
            background: #ffe4e6;
        }

        .de-empty {
            text-align: center;
            background: #fff;
            border-radius: 1.5rem;
            padding: 4rem 2rem;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 20px 40px -20px rgba(15, 23, 42, .15);
            grid-column: 1 / -1;
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
            color: var(--de-violet);
        }

        .de-empty__icon svg {
            width: 2.5rem;
            height: 2.5rem;
        }

        .de-empty__title {
            margin-top: 1.5rem;
            font-size: 1.875rem;
            font-weight: 800;
            color: var(--de-ink);
        }

        .de-empty__text {
            margin-top: .75rem;
            color: var(--de-muted);
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
            transition: transform .2s, box-shadow .2s;
        }

        .de-empty__cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px -8px rgba(37, 99, 235, .5);
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

        <a href="{{ route('admin.dashboard') }}" class="de-back-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 19l-7-7 7-7" />
    </svg>
    Back
</a>
        <div class="de-header-row de-font">
            <div>
                <span class="de-eyebrow">DriveEasy Features</span>
                <h1 class="de-title">Manage Fleet Features</h1>
                <p class="de-subtitle">Add and configure the premium features available across your rental cars.</p>
            </div>

            @if(Auth::user()->role == 'admin')
                <a href="{{ route('features.create') }}" class="de-add-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                    Add Feature
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
                    <p class="de-stat__label">Total Features</p>
                    <h2 class="de-stat__value de-stat__value--gradient">{{ $features->count() }}</h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--b"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Total Assignments</p>
                    <h2 class="de-stat__value de-stat__value--emerald">
                        {{ $features->sum(function ($f) {
    return $f->cars->count(); }) }}</h2>
                </div>
            </div>

            <div class="de-stat">
                <div class="de-stat__bar de-stat__bar--c"></div>
                <div class="de-stat__body">
                    <p class="de-stat__label">Feature Platform</p>
                    <h2 class="de-stat__value">DriveEasy</h2>
                </div>
            </div>

        </div>

        {{-- Features Grid --}}
        <div class="de-grid">

            @forelse($features as $feature)

                <div class="de-card">
                    <div class="de-card__stripe"></div>

                    <div class="de-card__body">

                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div class="de-feature-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                            </div>

                            <div>
                                <h2 class="de-brand">{{ $feature->name }}</h2>
                            </div>
                        </div>

                        <p class="de-model">{{ $feature->description ?? 'No description provided.' }}</p>

                        @if(Auth::user()->role == 'admin')
                            <div class="de-actions">
                                <a href="{{ route('features.edit', $feature) }}" class="de-btn-edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9" />
                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                    </svg>
                                    Edit
                                </a>

                                <form action="{{ route('features.destroy', $feature) }}" method="POST"
                                    style="margin: 0; display: flex; flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this feature?')" class="de-btn-delete"
                                        style="width: 100%;">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

            @empty

                <div class="de-empty">
                    <div class="de-empty__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                    </div>
                    <h2 class="de-empty__title">No features found</h2>
                    <p class="de-empty__text">You haven't added any features to the fleet yet.</p>

                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('features.create') }}" class="de-empty__cta">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                            Add First Feature
                        </a>
                    @endif
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>
