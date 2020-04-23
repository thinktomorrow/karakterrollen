<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<!-- This project was proudly build by Think Tomorrow. More info at https://thinktomorrow.be-->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta name="google-site-verification" content="mypbHik5tUwY0YOMfxp5r6Eb39JrlhO9f22zwXgmPAk" />
    <title>@yield('seo_title', trans('seo.title'))</title>
    <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
    @include('_layouts._partials.metaheader')
    <link rel="shortcut icon" href="{{ asset('assets/front/img/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">

    @include('_layouts._partials.tag-manager')
</head>
<body class="bg-grey-lightest font-m overflow-x-hidden">
    {{-- Google Tag Manager (noscript) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ env('GOOGLE_TAG_MANAGER_ID') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    {{-- End Google Tag Manager (noscript) --}}

    @include('_layouts._partials.env-banner')
    @include('elements.cookiebar')

    @include('_layouts.header')

    <main class="center-center text-center">
        @yield('content')
    </main>

    @include('_layouts.footer')

    <script src="{{ cached_asset('assets/front/js/main.js') }}"></script>
    <script src="{{ cached_asset('assets/front/js/toggle-class.js') }}"></script>

    @stack('custom-scripts')

</body>
</html>
