
const data= document.querySelector('.data');
const data_login= document.querySelector('.formulari-login');
const data_register= document.querySelector('.formulari-register');
const back_login= document.querySelector('back-box-login');
const back_register= document.querySelector('back-box-register');
const button_login =document.querySelector('#buttonLogin');
const button_register= document.querySelector('#buttonRegister');
const register= document.querySelector('.Register')

const login= document.querySelector('.Login');
login.addEventListener('mouseover',colorTextoLogin);
register.addEventListener('mouseover',colorTextoRegister)

login.addEventListener('mouseout',colorTextoLoginOut);
register.addEventListener('mouseout',colorTextoRegisterOut)


function colorTextoLogin(){
    button_login.style.color="white";
    button_login.style.background="black";
}

function colorTextoRegister(){
    button_register.style.color="white";
    button_register.style.background="black";
}


function colorTextoLoginOut(){
    button_login.style.color="black";
    button_login.style.background="white";
}

function colorTextoRegisterOut(){
    button_register.style.color="black";
    button_register.style.background="white";
}



/*
function registrar(){
   
   //data_register.style.display="block";
    data_login.style.left="1200px"
    //data_login.style.display="none";
    back_login.style.opacity="1";
    back_register.style.opacity="0";
}


*/