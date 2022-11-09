
const data= document.querySelector('.data');
const data_login= document.querySelector('.formulari-login');
const data_register= document.querySelector('.formulari-register');
const back_login= document.querySelector('back-box-login');
const back_register= document.querySelector('back-box-register');






function registrar(){
   
   //data_register.style.display="block";
    data_login.style.left="1200px"
    //data_login.style.display="none";
    back_login.style.opacity="1";
    back_register.style.opacity="0";
}


document.getElementById('BackBoxButtonLogin').addEventListener("click",registrar);