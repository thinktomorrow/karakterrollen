@if(app()->environment() == 'preprod')
    <div class="squished text-white bg-black text-center">
        <span>PRODUCTIE VOORBEREIDING</span><br>
        <span class="font-xs">Hier kan u de inhoud van de site voorbereiden.<strong>Opgelet: mailtjes worden wel effectief uitgestuurd</strong>.</span>
    </div>
@endif
@if(app()->environment() == 'staging')
    <div class="squished text-white bg-primary text-center">
        <span>STAGING</span><br>
    </div>
@endif