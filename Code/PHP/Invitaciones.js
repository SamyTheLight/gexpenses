
function addAct() {

    const actList = document.getElementById('invitaciones-table');
    const element = document.createElement('tr');
    element.innerHTML = `

                            <td id="td-act"><input type="text"class="input-mail"name="emailEnviados[]" id="input-mail"placeholder="EMAIL"></td>

                        
                        <button name="btn-mail" class="btn-mail">-</button>
        `;
    actList.appendChild(element);


}
function deleteAct(element) {
    if (element.name === 'btn-mail') {
        element.parentElement.remove();
    }
}






// VALIDAR CORREO //
function validarCorreo(correo) {
    const expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    const esValido = expReg.test(correo);



    if (esValido == true) {
        addAct();

    } else if (esValido == false) {
        const td = document.getElementById('td-act');
        const p = document.createElement('p');
        p.append('El correo no es correcto, porfavor introduzca los carácteres necesarios');
        td.appendChild(p);
    }
}
document.getElementById('invitaciones-table').addEventListener('click', function (e) {
    deleteAct(e.target);
});


const input = document.getElementById('input-mail').value;
console.log(input);
document.querySelector(".btn-email").addEventListener("click", e => {
    validarCorreo(input);


});


