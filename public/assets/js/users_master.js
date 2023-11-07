 function validateForm() {
            let form = document.forms["employeeForm"];
            let name = form.elements["employee_name"].value.trim();
            let email = form.elements["emplyee_mail_id"].value.trim();
            let password = form.elements["password_input"].value;
            let joiningDate = form.elements["employee_joining_date"].value;
            let endDate = form.elements["employee_end_date"].value;

            if (!/^[a-zA-Z]+$/.test(name)) {
                alert('Name should contain only letters');
                return false;
            }

            if (name === '' || email === '' || password === '' || joiningDate === '') {
                alert('Please fill in all required fields.');
                return false;
            }

           

            return true;
        }
        