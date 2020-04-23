<section data-cookiebar data-cookiebar-default="functional" style="z-index:1000" class="hidden fixed right-0 bottom-0 shadow-lg bg-white m-4 w-3/4 md:w-1/2 text-blue-darker rounded overflow-hidden xs-inset-s m-inset-m">
    <h3>@lang('cookiebar.titel')</h3>
    <p>@lang('cookiebar.tekst')</p>
    <div class="mb-4 flex">
        <label class="block mr-4"><input data-cookiebar-checkbox class="mr-2" type="checkbox" name="functional" checked disabled>Functionele cookies</label>
        <label class="block hidden"><input data-cookiebar-checkbox class="mr-2" type="checkbox" name="analyzing" disabled>Analyzing cookies</label>
        <label class="block"><input data-cookiebar-checkbox class="mr-2" type="checkbox" name="marketing" checked>Marketing cookies</label>
    </div>
    <a class="btn btn-primary" data-cookiebar-accept>@lang('cookiebar.tekst-knop-1')</a>
</section>