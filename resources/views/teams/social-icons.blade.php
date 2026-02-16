@php
    $iconName = $icon ?? '';
@endphp

@switch($iconName)
    @case('github')
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 19c-5 1.5-5-2.5-7-3"></path>
            <path d="M16 22v-3.87a3.37 3.37 0 0 0-.94-2.61"></path>
            <path d="M17.5 3.5a5.44 5.44 0 0 1 1.5 3.78c0 5.42-3.3 6.61-6.44 7"></path>
            <path d="M8.44 14.28c-3.14-.35-6.44-1.54-6.44-7A5.44 5.44 0 0 1 3.5 3.5"></path>
            <path d="M9 14c2.4-1 4.6-1 7 0"></path>
            <path d="M4.09 1S5.27.65 8 2.5a13.38 13.38 0 0 1 7 0C17.73.65 18.91 1 18.91 1"></path>
        </svg>
        @break
    @case('linkedin')
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path>
            <path d="M6 10v10"></path>
            <path d="M10 10v10"></path>
            <path d="M10 14a4 4 0 0 1 8 0v6"></path>
        </svg>
        @break
    @case('instagram')
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="5"></rect>
            <circle cx="12" cy="12" r="4"></circle>
            <circle cx="17" cy="7" r="1"></circle>
        </svg>
        @break
    @case('dribbble')
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M4.5 9h7.5"></path>
            <path d="M19.5 9a12 12 0 0 0-7.5 3"></path>
            <path d="M4.5 15a12 12 0 0 1 10.5-3"></path>
            <path d="M9 4.5a12 12 0 0 1 4.5 7.5"></path>
        </svg>
        @break
    @case('behance')
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 6h6a3 3 0 0 1 0 6H3z"></path>
            <path d="M3 12h6a3 3 0 0 1 0 6H3z"></path>
            <path d="M14 8h7"></path>
            <path d="M14 12h5a3 3 0 0 1 0 6h-5z"></path>
            <path d="M14 10a2 2 0 0 1 2-2h5"></path>
        </svg>
        @break
    @case('twitter')
        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 5.8a8.4 8.4 0 0 1-2.4.7 4.2 4.2 0 0 0 1.8-2.3 8.4 8.4 0 0 1-2.7 1 4.2 4.2 0 0 0-7.1 3.8 12 12 0 0 1-8.7-4.4 4.2 4.2 0 0 0 1.3 5.6 4.1 4.1 0 0 1-1.9-.5v.1a4.2 4.2 0 0 0 3.4 4.1 4.2 4.2 0 0 1-1.9.1 4.2 4.2 0 0 0 3.9 2.9 8.5 8.5 0 0 1-5.2 1.8A8.7 8.7 0 0 1 2 19.5a12 12 0 0 0 6.5 1.9c7.8 0 12.1-6.5 12.1-12.1v-.6A8.6 8.6 0 0 0 22 5.8z"></path>
        </svg>
        @break
@endswitch
