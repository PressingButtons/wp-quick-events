window.onload = event => {

    validateDateMetaFields(document.querySelector('#wpqe_dates'));

}

function validateDateMetaFields(date_container) {
    if(!date_container) return;

    const start = document.querySelector('#wpqe_dates #start-date' );
    const end   = document.querySelector('#wpqe_dates #end-date' );

    if(start.value == '') end.disabled = true;

    if(start.value > end.value) end.value = start.value;

    start.onchange = event => {
        end.disabled = false;
        if(start.value == '') end.disabled = true;
        end.setAttribute('min', start.value);
        if(start.value > end.value) end.value = start.value;
    }

}
