@extends('layouts.app')

@section('title', 'Reliable Software Studio')
@section('seo_title', 'VeritasDev | Reliable Software Studio untuk Web & Produk Digital')
@section('seo_description', 'VeritasDev adalah software studio yang membantu tim membangun web app dan produk digital yang cepat, aman, dan scalable dengan standar engineering profesional.')
@section('seo_canonical', route('home'))
@section('seo_keywords', 'software house indonesia, web development, product engineering, jasa pembuatan website, laravel development')

@section('content')
@php
    $sectionViews = [
        'hero' => 'home.sections.hero',
        'logos' => 'home.sections.logos',
        'services' => 'home.sections.services',
        'testimonials' => 'home.sections.testimonials',
        'blog' => 'home.sections.blog',
        'cta' => 'home.sections.cta',
    ];
@endphp

<section class="flex flex-col items-center justify-center">
    @foreach ($homeSections as $section)
        @includeIf($sectionViews[$section->key] ?? null, ['services' => $services, 'posts' => $posts, 'section' => $section])
    @endforeach
</section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endpush

@push('structured_data')
@php
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'VeritasDev',
        'url' => route('home'),
        'logo' => asset('favicon.ico'),
        'sameAs' => [
            route('blog'),
        ],
    ];

    $websiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'VeritasDev',
        'url' => route('home'),
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => route('blog') . '?q={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/home.js') }}" defer></script>
@endpush
