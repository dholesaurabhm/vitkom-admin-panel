function validateClientForm() {
    var ClientName = document.getElementById('ClientName').value;
    var phone = document.getElementById('phone').value;
    var emailid = document.getElementById('emailid').value;
    var pancard = document.getElementById('pancard').value;
    var Aadhar = document.getElementById('Aadhar').value;
    var dateofBirth = document.getElementById('dateofBirth').value;
    var gender = document.getElementById('gender').value;

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