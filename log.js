//this is the js for the login script

//this is the way to get the errors in form of variables
const errorName = document.getElementById("errorName");
const errorEmail = document.getElementById("errorEmail");
const errorPass = document.getElementById("errorPass");
const errorForm = document.getElementById("errorForm");


//the method below validates the name
function validateName(){
    const name = document.getElementById("username").value;
    if(name.length == ""){
        errorName.innerHTML = "the name field is required";
        return false;
    }
    else{
        errorName.innerHTML = "valid";
        return true;

    }
}
function validateEmail(){
  const name = document.getElementById("email").value;
  if(name.length == ""){
      errorEmail.innerHTML = "the name field is required";
      return false;
  }
  else{
      errorEmail.innerHTML = "valid";
      return true;

  }
}

function validatePass(){
  const name = document.getElementById("password").value;
  if(name.length == ""){
      errorPass.innerHTML = "the name field is required";
      return false;
  }
  else{
      errorPass.innerHTML = "valid";
      return true;

  }
}

// this method validates the form
function validateForm(){
  if(!validateName()){
    errorForm.innerHTML = "not valid";
    return false;
  }
  else{

    errorForm.style.display = "block";
    setTimeout(removeText(), 3000);
    return true;

    function removeText(){
        errorForm.style.display = "none";
    }
  }
}