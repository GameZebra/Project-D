var frmvalidator = new Validator("register");
frmvalidator.addValidation("FirstName","req","Please enter your First Name");
frmvalidator.addValidation("FirstName","maxlen=20", "Max length for FirstName is 20");

frmvalidator.addValidation("LastName","req");
frmvalidator.addValidation("LastName","maxlen=20");

frmvalidator.addValidation("username","req");
frmvalidator.addValidation("username","maxlen=20");

frmvalidator.addValidation("email","maxlen=50");
frmvalidator.addValidation("email","req");
frmvalidator.addValidation("email","email");

frmvalidator.addValidation("Phone","maxlen=10");
frmvalidator.addValidation("Phone","numeric");

frmvalidator.addValidation("password","req");
frmvalidator.addValidation("password","minlen=6");
frmvalidator.addValidation("cpwd", "req");

function validateForm() {
    var x = document.forms["register"]["password"].value;
    var y = document.forms["register"]["cpwd"].value;
    if (x != y) {
        alert("Passwords don't match");
      return false;
    }
  }