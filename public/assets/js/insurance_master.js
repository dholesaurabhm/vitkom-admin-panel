document.addEventListener('DOMContentLoaded', function () {
    
    const schemeForm = document.querySelector('#scheme_modal form');

    schemeForm.addEventListener('submit', function (event) {
        const insuranceSchemeName = document.querySelector('#insurance_scheme_name');
        const selectedCompany = document.querySelector('#scheme_modal select');

        if (!insuranceSchemeName.value.trim()) {
            alert('Please enter the Insurance Scheme Name.');
            event.preventDefault(); 
        }

        if (!selectedCompany.value) {
            alert('Please select an Insurance Company.');
            event.preventDefault();
        }
    });

    const insurerForm = document.querySelector('#insurer_modal form');

    
    insurerForm.addEventListener('submit', function (event) {
        const insuranceCompanyName = document.querySelector('#insurance_company_name');

        if (!insuranceCompanyName.value.trim()) {
            alert('Please enter the Insurance Company Name.');
            event.preventDefault(); 
        }
    });
});
