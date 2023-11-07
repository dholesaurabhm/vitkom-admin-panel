$(document).ready(function () {
    // Show the first tab initially
    $('.tab-pane').first().addClass('show active');

    
    $('.tab-pane button[type="submit"]').on('click', function () {
        var currentForm = $(this).closest('.tab-pane');
        var inputs = currentForm.find('input[required], select[required]');

        var valid = true;
        inputs.each(function () {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                valid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (valid) {
            currentForm.removeClass('show active');
            currentForm.next('.tab-pane').addClass('show active');
        }
    });

   
    $('.nav-link').on('click', function (e) {
        e.preventDefault();
        var targetTab = $(this).attr('href');
        $('.tab-pane').removeClass('show active');
        $(targetTab).addClass('show active');
    });

    $('input[required], select[required]').on('input', function () {
        $(this).removeClass('is-invalid');
    });
});