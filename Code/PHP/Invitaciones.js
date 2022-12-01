class UI {
    addAct(e) {
        
        const actList = document.getElementById('invitaciones-table');
        const element = document.createElement('tr');
        element.innerHTML = `

                            <td id="td-act"><input type="text"class="input-mail"name="emailEnviados[]" id="input-mail"value="EMAIL"></td>

                        
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


