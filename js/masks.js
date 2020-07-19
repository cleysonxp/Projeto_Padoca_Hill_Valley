"use stricts";

const masks = {
    text : value => value.replace(/[^a-zA-Z À-ÿ]/,''),
    cellphone : value => value.replace(/\D/g,'')
                              .replace(/(\d{2})(\d)/,'($1)$2')
                              .replace(/(\d{5})(\d)/,'$1-$2'),
    telefone : value => value.replace(/\D/g,'')
                              .replace(/(\d{2})(\d)/,'($1)$2')
                              .replace(/(\d{4})(\d)/,'$1-$2'),
    cep : value => value.replace(/\D/g,'')
                        .replace(/(\d{5})(\d)/,'$1-$2'),                        
    number: value => value.replace(/\D/g,''),
                    
};

const validator = element => {
    element.addEventListener('input', ( event ) => {
        const $input = event.target;
        const typeMask = $input.dataset.type;
        if ( masks.hasOwnProperty(typeMask) ){
            $input.value = masks[typeMask]($input.value);        
        }        
    });
};

validator (document.getElementById('form'));

