function validarCorreo(correo) {
	const expReg = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	const esValido = expReg.test(correo);


	const td = document.getElementById('td-act');
	if (esValido == false) {
		const p = document.createElement('p');
		p.append('El correo no es correcto, porfavor introduzca los carácteres necesarios');
		td.appendChild(p);
	}else {
        window.location.href = "Home.php";
    }
}


const correo = document.getElementById('input-mail');
document.querySelector(".btn-enviar").addEventListener("click", e => {
    e.preventDefault();
    validarCorreo(correo);
    

});