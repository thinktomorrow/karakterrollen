<header class="w-full flex items-center bg-grey-200">
    <a href="/" class="mx-auto stack">
        @svg('logo', 'w-8 h-8 text-grey-500')
        {{-- <img src="{{ asset('assets/front/img/logo.svg') }}" alt="Logo" class="w-8 h-8"> --}}
    </a>
</header>

<nav class="w-full flex flex-col">
    {{-- Here comes the navigation  --}}
    {{-- @for($i=0;$i<3;$i++) --}}
    <a href="#0" title="home" aria-label="home" class="px-4 py-3 m-4 rounded hover:bg-grey-200 mx-auto hover:bg-grey-300">
       @svg('home', 'w-4 h-4')
    </a>
    <a href="#0" title="persons" aria-label="home" class="px-4 py-3 m-4 rounded hover:bg-grey-200 mx-auto hover:bg-grey-300">
       @svg('person', 'w-4 h-4')
    </a>
    <a href="#0" title="info" aria-label="home" class="px-4 py-3 m-4 rounded hover:bg-grey-200 mx-auto hover:bg-grey-300">
       @svg('info', 'w-4 h-4')
    </a>
    {{-- @endfor --}}

</nav>

<footer class="w-full">
    <code class="mx-auto p-4">v0.3.4</code>
</footer>

