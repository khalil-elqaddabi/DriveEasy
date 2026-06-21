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

        .de-form-grid { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
        @media (min-width: 768px) { .de-form-grid { grid-template-columns: repeat(2, 1fr); gap: 2rem; } }

        .de-form-group { display: flex; flex-direction: column; gap: .5rem; }
        .de-label { font-size: .875rem; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--de-ink); }

        .de-input { width: 100%; box-sizing: border-box; border: 1px solid var(--de-border); border-radius: 1rem; padding: 1rem 1.25rem; font-size: 1rem; font-family: inherit; color: var(--de-ink); background: #f8fafc; transition: all .2s; }
        .de-input:focus { outline: none; box-shadow: 0 0 0 4px rgba(124,58,237,.15); border-color: var(--de-violet); background: #fff; }

        .de-select { appearance: none; background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); background-position: right .5rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; padding-right: 2.5rem; }

        .de-features-grid { display: grid; grid-template-columns: 1fr; gap: 1rem; margin-top: .5rem; }
        @media (min-width: 480px) { .de-features-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 768px) { .de-features-grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 1024px) { .de-features-grid { grid-template-columns: repeat(4, 1fr); } }

        .de-checkbox-card { display: flex; align-items: center; gap: .75rem; padding: 1rem; border: 1px solid var(--de-border); border-radius: 1rem; background: #f8fafc; cursor: pointer; transition: all .2s; }
        .de-checkbox-card:hover { border-color: #ddd6fe; background: #f5f3ff; }
        .de-checkbox-card:has(input:checked) { border-color: var(--de-violet); background: #f5f3ff; box-shadow: 0 0 0 1px var(--de-violet); }
        .de-checkbox-input { width: 1.25rem; height: 1.25rem; accent-color: var(--de-violet); cursor: pointer; }
        .de-checkbox-label { font-weight: 600; color: var(--de-ink); cursor: pointer; user-select: none; }

        .de-file-upload { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 2.5rem 2rem; border: 2px dashed var(--de-border); border-radius: 1rem; background: #f8fafc; transition: all .2s; cursor: pointer; }
        .de-file-upload:hover { border-color: var(--de-violet); background: #f5f3ff; }
        .de-file-upload__icon { display: flex; align-items: center; justify-content: center; width: 4rem; height: 4rem; border-radius: 999px; background: #ede9fe; color: var(--de-violet); margin-bottom: 1rem; }
        .de-file-upload__icon svg { width: 2rem; height: 2rem; }
        .de-file-upload__text { font-weight: 600; color: var(--de-ink); text-align: center; }
        .de-file-upload__subtext { margin-top: .5rem; font-size: .875rem; color: var(--de-muted); text-align: center; }
        .de-file-input { display: none; }

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
                <h1 class="de-title">Add a New Car</h1>
                <p class="de-subtitle">Expand your fleet by adding a new vehicle. Fill in the details below.</p>
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

        <div class="de-card-form">
            <div class="de-card-form__stripe"></div>

            <div class="de-card-form__body">
                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="de-form-grid">

                        <div class="de-form-group">
                            <label class="de-label">Brand</label>
                            <input type="text" name="brand" value="{{ old('brand') }}" class="de-input" placeholder="e.g. Toyota">
                        </div>

                        <div class="de-form-group">
                            <label class="de-label">Model</label>
                            <input type="text" name="model" value="{{ old('model') }}" class="de-input" placeholder="e.g. Camry">
                        </div>

                        <div class="de-form-group">
                            <label class="de-label">Year</label>
                            <input type="number" name="year" value="{{ old('year') }}" class="de-input" placeholder="e.g. 2024">
                        </div>

                        <div class="de-form-group">
                            <label class="de-label">Seats</label>
                            <input type="number" name="seats" value="{{ old('seats') }}" class="de-input" placeholder="e.g. 5">
                        </div>

                        <div class="de-form-group">
                            <label class="de-label">Price Per Day (DH)</label>
                            <input type="number" step="0.01" name="price_per_day" value="{{ old('price_per_day') }}" class="de-input" placeholder="e.g. 350.00">
                        </div>

                        <div class="de-form-group">
                            <label class="de-label">Status</label>
                            <select name="status" class="de-input de-select">
                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>Rented</option>
                                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                    </div>

                    <div class="de-form-group mt-6">
                        <label class="de-label">Description</label>
                        <textarea name="description" rows="4" class="de-input" placeholder="Provide details about the car condition, history, or special notes...">{{ old('description') }}</textarea>
                    </div>

                    <div class="de-form-group mt-6">
                        <label class="de-label">Features</label>
                        <div class="de-features-grid">
                            @foreach ($features as $feature)
                                <label class="de-checkbox-card">
                                    <input type="checkbox" name="features[]" value="{{ $feature->id }}" class="de-checkbox-input" {{ is_array(old('features')) && in_array($feature->id, old('features')) ? 'checked' : '' }}>
                                    <span class="de-checkbox-label">{{ $feature->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="de-form-group mt-6">
                        <label class="de-label">Car Image</label>
                        <label class="de-file-upload">
                            <div class="de-file-upload__icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <polyline points="17 8 12 3 7 8" />
                                    <line x1="12" y1="3" x2="12" y2="15" />
                                </svg>
                            </div>
                            <span class="de-file-upload__text">Click to upload or drag and drop</span>
                            <span class="de-file-upload__subtext">PNG, JPG, JPEG up to 5MB</span>
                            <input type="file" name="image" class="de-file-input">
                        </label>
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
                            Save Car
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</x-app-layout>
