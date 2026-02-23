@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">
    @hasSection('panel_header')
        <section>
            @yield('panel_header')
        </section>
    @endif

    <section>
        @yield('panel_content')
    </section>
</div>
@endsection
