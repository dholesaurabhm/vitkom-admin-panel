function validateClientForm() {
    var ClientName = form.elements('ClientName').value;
    var phone = form.elements('phone').value;
    var emailid = form.elements('emailid').value;
    var pancard = form.elements('pancard').value;
    var Aadhar = form.elements('Aadhar').value;
    var dateofBirth = form.elements('dateofBirth').value;
    var gender = form.elements('gender').value;

    if (ClientName.trim() === '') {
        alert('Please enter a Name');
        return false;
    }
    
    if (phone.trim() === '' || !phone.match(/[0-9]{3}-[0-9]{2}-[0-9]{3}/)) {
        alert('Please enter a valid Mobile Number (e.g., XXX-XX-XXX)');
        return false;
    }
    
    if (emailid.trim() === '') {
        alert('Please enter an Email ID');
        return false;
    }
    
    if (pancard.trim() === '') {
        alert('Please enter a Pancard Number');
        return false;
    }

    if (Aadhar.trim() === '') {
        alert('Please enter an Aadhar Number');
        return false;
    }

    if (dateofBirth.trim() === '') {
        alert('Please enter a Date of Birth');
        return false;
    }

    return true; 
}