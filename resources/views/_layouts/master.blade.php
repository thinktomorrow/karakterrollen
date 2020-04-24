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
            @include('_layouts.header')
        </aside>
        <section class="mx-auto border-r border-dashed border-grey-200 px-6 py-4 h-screen overflow-scroll" style="flex:1">
            <h2>Teamspace</h2>
            @for($i=0;$i<9;$i++)
        <article class="member group px-3 py-2 my-4 border-l-2 cursor-pointer" id="member-{{$i}}" data-toggle-class="#member-{{$i}},selected">
                <div class="flex items-center">
                    <div class="avatar w-8 h-8 overflow-hidden rounded-full center-center">
                        @svg('person', 'w-4 h-4')
                    </div>
                    <div class="px-2 text-grey-800">Aurélie Berkmans</div>
                </div>
            </article>
            @endfor
            <article class="mt-8 my-4 bg-grey-200 border-l-2 border-black cursor-pointer">
                <div class="bg-primary-200">
                <img src="{{ asset('assets/front/img/hi-there.svg') }}" alt="Hi there">
                </div>
                <div class="p-3">
                    <h3 class="text-lg mb-0">Heb je nog een teamlid?</h3>
                    <p class="mb-3">Nodig hem uit tot deze teamspace en ontdek welke rollen die heeft.</p>
                    <form class="relative">
                        <label class="hidden">E-mail</label>
                        <input type="email" class="bg-white border-b-2 border-grey-400 p-3 w-full" placeholder="Voeg e-mail toe">
                        <button type="submit" value="Submit" class="absolute inline-block right-0 inset-y-0 px-2 hover:bg-grey-400 border-b-2 border-grey-400">
                            @svg('arrow', 'w-4 h-4 text-grey-700')
                        </button>
                    </form>
                </div>
            </article>
        </section>

        <section class="p-4 h-screen overflow-scroll" style="flex:4">
            @yield('content')
        </section>
    </main>


    <script src="{{ cached_asset('assets/front/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>

    @stack('custom-scripts')

</body>
</html>
