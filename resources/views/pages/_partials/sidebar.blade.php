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
