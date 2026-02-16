@props([
    'editUrl' => null,
    'editDrawerUrl' => null,
    'editTitle' => 'Edit',
    'deleteUrl' => null,
    'confirm' => 'Hapus data ini?',
])

<div class="flex items-center justify-end gap-2 w-[88px]">
    
    @if ($editUrl)
        <a href="{{ $editUrl }}"
           @if ($editDrawerUrl)
               data-drawer-url="{{ $editDrawerUrl }}" 
               data-drawer-title="{{ $editTitle }}"
           @endif
           class="flex items-center justify-center rounded-lg border border-white/10 h-9 w-9 text-zinc-400 hover:text-sky-300 hover:border-white/20"
           aria-label="Edit">

            <svg viewBox="0 0 24 24"
                 class="w-4 h-4 block"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2">
                <path d="M12 20h9"></path>
                <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
            </svg>
        </a>
    @endif


    @if ($deleteUrl)
        <form method="POST"
              action="{{ $deleteUrl }}"
              onsubmit="return confirm('{{ $confirm }}')"
              class="m-0 p-0 flex">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="flex items-center justify-center rounded-lg border border-white/10 h-9 w-9 text-zinc-400 hover:text-rose-300 hover:border-white/20"
                    aria-label="Delete">

                <svg viewBox="0 0 24 24"
                     class="w-4 h-4 block"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">
                    <path d="M3 6h18"></path>
                    <path d="M8 6V4h8v2"></path>
                    <path d="M6 6l1 14h10l1-14"></path>
                </svg>
            </button>
        </form>
    @endif

</div>
