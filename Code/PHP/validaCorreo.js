function validarCorreo(correo) {
	const expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
	const esValido = expReg.test(correo);


	const td = document.getElementById('td-act');
	if (esValido == false) {
		const p = document.createElement('p');
		p.append('El correo no es correcto, porfavor introduzca los carácteres necesarios');
		td.appendChild(p);
	}
}


const correo = document.getElementById('input-mail');
document.querySelector(".btn-enviar").addEventListener("click", e => {
    e.preventDefault();
    validarCorreo(correo);
    

});