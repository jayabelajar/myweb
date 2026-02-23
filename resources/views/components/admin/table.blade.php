@props([
    'headers' => [],
])

<div class="bg-zinc-900/20 border border-white/5 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="text-xs uppercase tracking-widest text-zinc-500 bg-black/30">
                <tr>
                    @foreach ($headers as $header)
                        @php
                            $label = is_array($header) ? ($header['label'] ?? '') : $header;
                            $align = is_array($header) ? ($header['align'] ?? 'left') : 'left';
                            $nowrap = is_array($header) ? ($header['nowrap'] ?? false) : false;
                            $classes = 'px-4 py-3 text-' . $align;
                            if ($nowrap) {
                                $classes .= ' whitespace-nowrap';
                            }
                        @endphp
                        <th class="{{ $classes }}">{{ $label }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
