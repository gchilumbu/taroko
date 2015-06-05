/*This function checks whether the two passwords have been entered, and if true,
it checks whether they match. The function also checks for the minimum length 
required for a valid password. Spaces in the password are not allowed */
function validateForm(){
  var space = document.signup.password.value.indexOf(" "); //check for spaces
  var minLength = 6; // Minimum length of the required password
  var pwdLength = document.signup.password.value.length;//length of entered password
  var password = document.signup.password.value;
  var password2 = document.signup.password2.value;
  
  // check to ensure the two pasword have been entered 
  if (password == '' || password2 == '') {
    alert('Password fields cannot be empty. Please, enter matching passwords');
    return false;
  }
  
  // check for minimum length of the pasword
  if (pwdLength < minLength) {
    alert('Your password must be at least ' + minLength + ' characters long. Try again.');
    return false;
  }
  // check for spaces in the provided password. Spaces are not allowed.
  if (space > -1) {
    alert("Spaces in the password are not allowed. Please try again.");
    return false;
  }
 
  else {
    if (password != password2) { //check to see if the passwords entered match
      alert ("Your passwords do not match. Please try again");
      return false;
    }
  }
  
}  


      

