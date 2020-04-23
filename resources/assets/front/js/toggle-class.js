/*
| ---------------------------------------------------------------
| Class Toggle functionality
| ----------------------------------------------------------------
| Allows to toggle classes for the target selectors. Default class is 'hidden'
| which resp. hides or shows the target element.
| e.g. data-toggle-class="#dropdown"
| The class can be specifically given: data-toggle-class="#dropdown,hidden"
| Multiple targets can be set as well: data-toggle-class="#dropdown,hidden|#backdrop"
*/
;(function(){

    function handleToggle(e){

        e.preventDefault();

        const trigger = this,
              targetSelectors = trigger.getAttribute('data-toggle-class').split('|');

        targetSelectors.forEach(function(targetSelector){
            const targets = document.querySelectorAll(targetSelector.split(',')[0]),
                className = targetSelector.includes(',') ? targetSelector.split(',')[1] : 'hidden',
                triggerClassName = 'active';

            Array.from(targets).forEach(function(target){

                if(target.classList.contains(className)) {
                    trigger.classList.add(triggerClassName);
                    target.classList.remove(className);
                } else{
                    trigger.classList.remove(triggerClassName);
                    target.classList.add(className);
                }
            });
        });
    }

    window.registerClassToggles = function(){
        const toggles = document.querySelectorAll('[data-toggle-class]');

        Array.from(toggles).forEach((trigger) => {
            trigger.removeEventListener('click',handleToggle);
        });

        Array.from(toggles).forEach((trigger) => {
            trigger.addEventListener('click',handleToggle);
        });
    };

    window.registerClassToggles();

})();
