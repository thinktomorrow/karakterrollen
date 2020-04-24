@extends('_layouts.master')

@section('content')

    <div class="p-12 h-screen overflow-scroll">
        <div class="">
         {{-- Intro  --}}
        <header class="w-2/3 mb-6">
            <h2>Wat zijn karakterrollen?</h2>
            <div class="subline">
                Jij bent misschien een goede planner, of juist heel creatief, de ander communiceert makkelijk en weer een ander teamlid kan een probleem goed analyseren.
                Al deze kwaliteiten heb je nodig om samen een goed resultaat neer te zetten. Teamleden vullen elkaar aan. De karakterrollen bieden je dus gereedschap om de samenwerking in je team vanaf het begin van het project handig te organiseren en aan te passen mocht het toch even stroef lopen.
            </div>
        </header>
        <div class="flex flex-wrap -mx-2">
        {{-- Karakterrollen --}}
            @for($i=1;$i<9;$i++)
            <article class="p-2 w-1/4">
                <div class="flex flex-wrap border border-grey-200 p-4 h-full ">
                    <img src="@lang('characters.role-'.$i.'.image')" alt="@lang('characters.role-'.$i.'.name')">
                    <div class="">
                        <h3>@lang('characters.role-'.$i.'.name')</h3>
                        <p class="mb-0 font-bold">Kenmerken</p>
                        <p>@lang('characters.role-'.$i.'.characteristics')</p>
                    </div>
                </div>
            </article>
            @endfor
        </div>
        </div>
    </div>
@endsection
