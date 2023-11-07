$(document).ready(function () {
    $('button[type="submit"]').on('click', function() {
       
        var isValid = true;

        $('.modal-body input[required], .modal-body select[required]').each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
                
            } else {
                $(this).removeClass('is-invalid');
            }
        });

      
        if (!isValid) {
            return false;
        }

        
    });

   
    $('.modal-body input[required], .modal-body select[required]').on('change', function() {
        if ($(this).val() !== '') {
            $(this).removeClass('is-invalid');
        }
    });
});