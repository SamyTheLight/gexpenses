
const data = document.querySelector('.data');
const data_login = document.querySelector('.formulari-login');
const data_register = document.querySelector('.formulari-register');
const back_login = document.querySelector('.back-box-login');
const back_register = document.querySelector('.back-box-register');
const button_login = document.querySelector('#buttonLogin');
const button_register = document.querySelector('#buttonRegister');
const register = document.querySelector('.Register');
const buttonBackLogin = document.querySelector('#BackBoxButtonLogin');
const buttonBackRegister = document.querySelector('#BackBoxButtonRegister');
const registeredAlert = document.getElementById('has_registered');


buttonBackRegister.addEventListener('click', registrar);
buttonBackLogin.addEventListener('click', loguear);

if (registeredAlert) registrar(true); else loguear(true);

function registrar(first_time = false) {
    document.querySelectorAll(".form_block").forEach(element => {
        element.classList.remove('active')
    });;
    data_register.classList.add('active');
    
    data.style.left = "300px"
  
    back_login.style.opacity = "1";
    back_register.style.opacity = "0";
}

function loguear(first_time = false) {
    document.querySelectorAll(".form_block").forEach(element => {
        element.classList.remove('active')
    });;
    data_login.classList.add('active');
    data.style.left = "-380px"
    back_login.style.opacity = "0";
    back_register.style.opacity = "1";
}

