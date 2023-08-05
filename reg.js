
//in this page, we are going to handle the registration logic

// we are going to get the element by id
const form = document.getElementById("form");
const fname = document.getElementById("fname");
const username = document.getElementById("username");
const phone = document.getElementById("phone");
const email = document.getElementById("email");
const pass = document.getElementById("password");
const cPass = document.getElementById("cpass");

//an event listener is used to "listen" to the submit event
form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});
const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const isValidateEmail = email => {
    const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return re.test(String(email).toLowerCase());
}


const validateInputs = () => {
    const fullnameValue = fname.value.trim();
    const usernameValue = username.value.trim();
    const phoneValue = phone.value.trim();
    const emailValue = email.value.trim();
    const passValue = pass.value.trim();
    const cPassValue = cPass.value.trim();

    if(fullnameValue === ''){
        setError(fname, 'fullname is required');
    }else{
        setSuccess(fname);
    }

    if(usernameValue === ''){
        setError(username, 'Username is required');
    }else{
        setSuccess(username);
    }

    if(phoneValue === ''){
        setError(phone, 'phonenumber is required');
    }else{
        setSuccess(phone);
    }

    if(emailValue === ''){
        setError(email, 'Email is required');
    }else{
        setSuccess(email);
    }

    if(passValue === ''){
        setError(pass, 'password is required');
    }else if(passValue.length < 8 && passValue.length > 12){
        setError(pass, 'password is short ');
    }
    else{
        setSuccess(pass);
    }

    if(cPassValue === ''){
        setError(cPass, 'confirm password is required');
    }else if(cPassValue != ''){
        setError(cPass, 'passwords dont match');
    }
    
    else{
        setSuccess(cPass);
    }

}















// function checkPass(){
//     if(pass != cPass){
        
//     }
// }
