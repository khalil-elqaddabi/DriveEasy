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

        .de-card-form { background: #fff; border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(15,23,42,.06); box-shadow: 0 20px 40px -20px rgba(15,23,42,.18); }
        .de-card-form__stripe { height: 6px; background: linear-gradient(90deg, var(--de-violet), var(--de-blue), var(--de-cyan)); }
        .de-card-form__body { padding: 2rem; }
        @media (min-width: 640px) { .de-card-form__body { padding: 2.5rem; } }

        .de-form-group { display: flex; flex-direction: column; gap: .5rem; margin-bottom: 1.5rem; }
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
        <a href="{{ route('features.index') }}" class="de-back-btn">
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
                <h1 class="de-title">Add a New Feature</h1>
                <p class="de-subtitle">Create a new premium feature to associate with your rental cars.</p>
            </div>

            <a href="{{ route('features.index') }}" class="de-back-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Back to Features
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

        <div class="de-card-form">
            <div class="de-card-form__stripe"></div>

            <div class="de-card-form__body">
                <form action="{{ route('features.store') }}" method="POST">
                    @csrf

                    <div class="de-form-group">
                        <label class="de-label">Feature Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="de-input" placeholder="e.g. GPS Navigation">
                    </div>

                    <div class="de-form-group">
                        <label class="de-label">Description</label>
                        <textarea name="description" rows="4" class="de-input" placeholder="Describe the feature details and benefits...">{{ old('description') }}</textarea>
                    </div>

                    <div class="de-actions-row">
                        <a href="{{ route('features.index') }}" class="de-btn-cancel">
                            Cancel
                        </a>

                        <button type="submit" class="de-btn-gradient">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/>
                                <polyline points="7 3 7 8 15 8"/>
                            </svg>
                            Save Feature
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</x-app-layout>
