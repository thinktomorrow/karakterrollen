<section data-cookiebar data-cookiebar-default="functional" style="z-index:1000" class="hidden fixed right-0 bottom-0 shadow-lg bg-white w-full p-4 border border-grey-200">
    <div class="flex items-center">
        <div>
            <h3 class="mb-0">@lang('cookiebar.titel')</h3>
            <p class="mb-0">@lang('cookiebar.tekst')</p>

            <div class="mb-4 flex hidden" id="preferences">
                <label class="block mr-4"><input data-cookiebar-checkbox class="mr-2 cursor-pointer" type="checkbox" name="functional" checked disabled>Functionele cookies</label>
                <label class="block mr-4"><input data-cookiebar-checkbox class="mr-2 cursor-pointer" type="checkbox" name="analyzing" checked>Analyzing cookies</label>
                <label class="block mr-4"><input data-cookiebar-checkbox class="mr-2 cursor-pointer" type="checkbox" name="marketing" checked>Marketing cookies</label>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-secondary my-3" data-cookiebar-accept>@lang('cookiebar.tekst-knop-1')</a>
            <a class="hover:text-secondary-500 cursor-pointer my-3" data-toggle-class="#preferences">Aanpassen</a>
        </div>
    </div>
</section>
