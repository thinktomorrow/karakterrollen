@extends('_layouts.master')

@section('content')

    <div class="p-12 h-screen overflow-scroll">
        <div class="">
         {{-- Intro  --}}
        <header class="w-2/3 mb-6">
            <h2>Karakterrollen?</h2>
            <div class="border-l border-grey-200 pl-4">
                Jij bent misschien een goede planner, of juist heel creatief, de ander communiceert makkelijk en weer een ander teamlid kan een probleem goed analyseren.
                Al deze kwaliteiten heb je nodig om samen een goed resultaat neer te zetten. Teamleden vullen elkaar aan. De karakterrollen bieden je dus gereedschap om de samenwerking in je team vanaf het begin van het project handig te organiseren en aan te passen mocht het toch even stroef lopen.
            </div>
        </header>
        <h2>8 Verschillende karakterrollen 👇</h2>
        <div class="flex flex-wrap -mx-2">
        {{-- Karakterrollen --}}
            @for($i=1;$i<9;$i++)
            <article class="p-2 w-1/4">
                <div class="flex flex-wrap border border-grey-200 p-6 h-full ">
                    <img src="@lang('characters.role-'.$i.'.image')" alt="@lang('characters.role-'.$i.'.name')">
                    <div class="">
                        <h3 class="font-bold text-2xl mb-0 pb-1">@lang('characters.role-'.$i.'.name')</h3>
                        <p class="mb-0 font-bold">Kenmerken</p>
                        <p>@lang('characters.role-'.$i.'.characteristics')</p>
                    </div>
                </div>
            </article>
            @endfor
        </div>
        </div>
        <div class="py-4">
            Illustraties zijn van Pablo Stanley via <a href="https://www.opendoodles.com/" title="Open Doodles" target="_blank" class="underline hover:text-secondary-500">Open Doodles</a>
        </div>
    </div>
@endsection
