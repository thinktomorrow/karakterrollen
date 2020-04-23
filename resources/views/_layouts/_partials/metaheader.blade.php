<meta name="title" content="@yield('seo_title', trans('seo.title'))" />
<meta name="description" content="@yield('seo_description', trans('seo.description'))" />
<meta name="keywords" content="@yield('seo_keywords', trans('seo.keywords'))" />
<meta name="author" content="Think Tomorrow">

{{-- FACEBOOK OG --}}
<meta property='og:type' content="website" />
<meta property='og:title' content="@yield('seo_title', trans('seo.title'))" />
<meta property='og:description' content="@yield('seo_description', trans('seo.description'))" />
<meta property='og:image' content="@yield('seo_social_image', trans('seo.social.image'))" />
<meta property='og:url' content="{{ request()->fullUrl() }}" />
<meta property='og:site_name' content="{{ env('app_name') }}" />