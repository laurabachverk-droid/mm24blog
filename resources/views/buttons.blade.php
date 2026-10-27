@extends('partials.layout')
@section('content')
    <section class="mx-auto max-w-3xl space-y-8 px-4 py-8">
        <div>
            <h1 class="mb-2 text-2xl font-bold text-gray-900">Bootstrap primary button with Tailwind</h1>
            <p class="text-gray-600">These buttons use Tailwind utility classes only — no Bootstrap CSS and no custom CSS.</p>
        </div>

        <div class="space-y-3">
            <h2 class="text-lg font-semibold text-gray-900">Tailwind version</h2>
            <div class="flex flex-wrap items-center gap-4">
                <button type="button"
                    class="inline-block rounded-md border border-transparent bg-[#0d6efd] px-3 py-1.5 text-base font-normal leading-6 text-white transition-colors hover:bg-[#0b5ed7] active:bg-[#0a58ca] active:translate-y-px focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#0d6efd]/50 disabled:pointer-events-none disabled:opacity-[0.65]">
                    Primary button
                </button>

                <button type="button" disabled
                    class="inline-block rounded-md border border-transparent bg-[#0d6efd] px-3 py-1.5 text-base font-normal leading-6 text-white transition-colors hover:bg-[#0b5ed7] active:bg-[#0a58ca] active:translate-y-px focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#0d6efd]/50 disabled:pointer-events-none disabled:opacity-[0.65]">
                    Disabled button
                </button>
            </div>
            <p class="text-sm text-gray-600">Try hovering, clicking, and using Tab to move keyboard focus to the enabled button. The disabled button cannot be focused or clicked.</p>
        </div>

        <div class="space-y-3">
            <h2 class="text-lg font-semibold text-gray-900">Tailwind classes used</h2>
            <code class="block whitespace-normal break-words rounded-md bg-gray-100 p-4 text-sm leading-6 text-gray-800">inline-block rounded-md border border-transparent bg-[#0d6efd] px-3 py-1.5 text-base font-normal leading-6 text-white transition-colors hover:bg-[#0b5ed7] active:bg-[#0a58ca] active:translate-y-px focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-[#0d6efd]/50 disabled:pointer-events-none disabled:opacity-[0.65]</code>
        </div>
    </section>
@endsection
