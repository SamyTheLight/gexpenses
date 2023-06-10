const data = document.querySelector(".data");
const data_login = document.querySelector(".formulari-login");
const data_register = document.querySelector(".formulari-register");
const back_login = document.querySelector(".back-box-login");
const back_register = document.querySelector(".back-box-register");
const button_login = document.querySelector("#buttonLogin");
const button_register = document.querySelector("#buttonRegister");
const register = document.querySelector(".Register");
const buttonBackLogin = document.querySelector("#BackBoxButtonLogin");
const buttonBackRegister = document.querySelector("#BackBoxButtonRegister");
const registeredAlert = document.getElementById("has_registered");
const email = document.getElementById("input-mail-register");
const usernameRegister = document.getElementById("input-nameuser-register");
const passwordRegister = document.getElementById("input-password2-register");
const alert = document.querySelector(".alert-success");
const formRegistre = document.getElementById("formRegistre");
const password = document.getElementById("input-password2-register");
const buttonRegister = document.getElementById("buttonRegister");
// Expresiones regulares para validar el correo electrónico y la contraseña
const exprMail = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
const exprPassword =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;

// Variable para controlar si los datos del formulario son válidos o no
let validR = 0;

// Event listeners para los botones de volver a la pantalla anterior
buttonBackRegister.addEventListener("click", registrar);
buttonBackLogin.addEventListener("click", loguear);

// Si se ha registrado con éxito, mostramos un mensaje de confirmación
if (registeredAlert) registrar(true);
else loguear(true);

// Función que valida los datos del formulario de registro
function validarDades(email, password, validR) {
  if (exprMail.test(email.value)) {
    // Si el correo electrónico es válido
    email.style.backgroundColor = "green"; // Marcamos el campo como válido
    validR = 0;
  } else {
    email.style.backgroundColor = "red"; // Marcamos el campo como inválido
    validR = 1; // Actualizamos la variable
  }

  if (exprPassword.test(password.value)) {
    password.style.backgroundColor = "green";
    validR = 0;
  } else {
    password.style.backgroundColor = "red";
    validR = 1;
  }
  return validR;
}

// Event listener para el botón de enviar el formulario de registro
formRegistre.addEventListener("submit", (e) => {
  e.preventDefault();

  let dadesvalidades = validarDades(email, password, validR); // Validamos los datos del formulario

  if (dadesvalidades == 0) {
    // Si los datos son válidos ...
    formRegistre.submit(); // Enviamos el formulario
  }

  formRegistre.reset(); // Borramos los datos del formulario
});

//Animaciones para pasar entre loguear y registrar
function registrar(first_time = false) {
  document.querySelectorAll(".form_block").forEach((element) => {
    element.classList.remove("active");
  });
  data_register.classList.add("active");

  data.style.left = "300px";

  back_login.style.opacity = "1";
  back_register.style.opacity = "0";
}

function loguear(first_time = false) {
  document.querySelectorAll(".form_block").forEach((element) => {
    element.classList.remove("active");
  });
  data_login.classList.add("active");
  data.style.left = "-380px";
  back_login.style.opacity = "0";
  back_register.style.opacity = "1";
}
