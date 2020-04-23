<div id="{{ $modalId ?? 'modal' }}" class="fixed pin center-center z-50 hidden" aria-hidden="true" role="dialog">
    
    <div data-modal-backdrop data-toggle-class="#{{ $modalId ?? 'modal' }}" class="cursor-pointer absolute pin bg-grey-lightest w-full h-full opacity-75"></div>
    
    <div data-modal-content class="relative max-w-md min-w-50 min-h-60 bg-white shadow-md m-auto overflow-y-auto max-h-screen rounded"  aria-hidden="true" role="dialog">
        <span data-toggle-class="#{{ $modalId ?? 'modal' }}" class="absolute pin-r pin-t block center-center bg-black text-white hover:bg-grey-dark hover:text-white p-2 text-grey-light cursor-pointer">
        <div class="w-4 h-4 center-center">x</div>
        </span>
        {!! $slot !!}
    </div>

</div>