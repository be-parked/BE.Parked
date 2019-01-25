function check() {
    var firstname = document.getElementById('firstname').value;
    if (firstname === '') {
        alert('Please fill out your First Name');
        document.getElementById('firstname').focus();
        return false;
    }

    var lastname = document.getElementById('lastname').value;
    if (lastname === '') {
        alert('Please fill out your Last Name');
        document.getElementById('lastname').focus();
        return false;
    }

    var middlename = document.getElementById('middlename').value;
    if (middlename === '') {
        alert('Please fill out your Middle Name');
        document.getElementById('middlename').focus();
        return false;
    }

    var email = document.getElementById('email').value;
    if (email === '') {
        alert('Please fill out your Email');
        document.getElementById('email').focus();
        return false;
    }

    var password = document.getElementById('password').value;
    if (password === '') {
        alert('Please fill out your Password');
        document.getElementById('password').focus();
        return false;
    }
}