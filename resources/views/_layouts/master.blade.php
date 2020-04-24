<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<!-- This project was proudly build by Think Tomorrow. More info at https://thinktomorrow.be-->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta name="google-site-verification" content="mypbHik5tUwY0YOMfxp5r6Eb39JrlhO9f22zwXgmPAk" />
    <title>Teamspace &bull; Karakterrollen</title>
    <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
    @include('_layouts._partials.metaheader')

    <link rel="shortcut icon" href="{{ asset('assets/front/img/logo.svg') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@300;500;700&family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">

    @include('_layouts._partials.tag-manager')
</head>
<body>
    {{ svg_spritesheet() }}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GOOGLE_TAG_MANAGER_ID') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    {{-- @include('_layouts._partials.env-banner') --}}
    @include('elements.cookiebar')

    <main class="flex flex-wrap">
        <aside class="h-screen overflow-hidden border-r border-dashed border-grey-200 content-between flex flex-wrap items-stretch justify-evenly mx-auto w-24">
            @include('_layouts.navigation')
        </aside>


        <section style="flex:5">
            @yield('content')
        </section>
    </main>


    <script src="{{ cached_asset('assets/front/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>

    @stack('custom-scripts')

</body>
</html>
