$(document).ready(function () {
    $('#mutual_fund_modal form').submit(function (event) {
        var form = this;

       
        var invalidElements = [];

        $(form).find('input[required], select[required]').each(function () {
            if (!$(this).val()) {
                invalidElements.push(this);
            }
        });

        if (invalidElements.length > 0) {
            
            event.preventDefault();

           
            invalidElements.forEach(function (element) {
                $(element).addClass('is-invalid');
               
            });
        }
    });

 
    $('#mutual_fund_modal input, #mutual_fund_modal select').on('input change', function () {
        $(this).removeClass('is-invalid');
    });
});