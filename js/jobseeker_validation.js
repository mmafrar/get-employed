function validate() {
      if(document.register.first_name.value=='') {
            alert("Please enter your first name");
            return false;
      }

      if(document.register.last_name.value=='') {
            alert("Please enter your last name");
            return false;
      }

      if(document.register.gender.value=='') {
            alert("Please enter your gender");
            return false;
      }

      if(document.register.dob.value=='') {
            alert("Please enter your date of birth");
            return false;
      }

      if(document.register.email.value=='') {
            alert("Please enter your email address");
            return false;
      }

      if(document.register.contact.value=='') {
            alert("Please enter your contact number");
            return false;
      }      

      if(document.register.password.value=='') {
            alert("Please enter your password");
            return false;
      }

      if(document.register.password_confirm.value=='') {
            alert("Please confirm your password");
            return false;
      }

      if(document.register.password.value!=document.user.password_confirm.value) {
            alert("Password confirmation does not match");
            return false;
      }
      
      alert(confirm("Do you want to register?"));
}