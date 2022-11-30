class UI {
    addAct(e) {
        
        const actList = document.getElementById('invitaciones-table');
        const element = document.createElement('tr');
        element.innerHTML = `
<<<<<<< HEAD
                            <td id="td-act"><input type="text"class="input-mail"name="emailEnviados[]" id="input-mail"value="EMAIL"></td>
=======
                            <td id=td-act><input type="text"class="input-mail" id="input-mail"value="EMAIL"></td>
>>>>>>> 2fb73afc9445518f265d9f740491be5635336c8b
                        
                        <button name="btn-mail" class="btn-mail">-</button>
        `;
        actList.appendChild(element);
      

    }
    deleteAct(element) {
        if (element.name === 'btn-mail') {
            element.parentElement.remove();
        }
    }


}





document.getElementById('invitaciones-table').addEventListener('click', function (e) {

    const ui = new UI();;
    ui.deleteAct(e.target);
});

document.querySelector(".btn-email").addEventListener("click", e => {
    const ui = new UI();
    e.preventDefault();
    ui.addAct(e);
    

});


