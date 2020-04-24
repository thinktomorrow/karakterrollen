<header class="w-full flex items-center bg-grey-200">
    <a href="/" class="mx-auto stack">
        @svg('logo', 'w-8 h-8 text-grey-500')
    </a>
</header>

<nav class="w-full flex flex-col">
    {{-- Overview of teammembers with their roles --}}
    <a href="{{ route('pages.dashboard')}}" title="Overzicht rollen" aria-label="home" class="leading-none p-4 my-2 rounded-full hover:bg-grey-200 mx-auto">
       @svg('chart', 'w-6 h-6')
    </a>
    {{-- Overview pîe chart of registered teammembers --}}
    <a href="{{ route('pages.members')}}" title="persons" aria-label="home" class="leading-none p-4 my-2 rounded-full hover:bg-grey-200 mx-auto">
       @svg('person', 'w-6 h-6')
    </a>
    {{-- General information and FAQ section --}}
    <a href="{{ route('pages.info')}}" title="info" aria-label="home" class="leading-none p-4 my-2 rounded-full hover:bg-grey-200 mx-auto">
       @svg('info', 'w-6 h-6')
    </a>

</nav>

<footer class="w-full">
    <code class="mx-auto p-4">v0.3.4</code>
</footer>

