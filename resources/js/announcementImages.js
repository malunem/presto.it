$(function(){
    //document ready!!!

    alert('ci sono');

    if ($("#drophere").length > 0){
        
        let crsfToken = $('meta[name="csrf-token"]').attr('content');
        let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');

        let myDropzone = new Dropzone('#drophere', {
            url: '/announcement/images/upload',

            params: {
                _token: crsfToken,
                uniqueSecret: uniqueSecret
            }
        });
    }
})

/* document.querySelector(function(){

    alert('ci sono');
    }); */