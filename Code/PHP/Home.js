class Actividad {
    constructor(name, description, divisa) {
        this.name = name;
        this.description = description;
        this.divisa = divisa;

    }
}

class UI {
    addAct(product) {
       
        const actList = document.getElementById('table-act');
        const element = document.createElement('tr');
        element.innerHTML = `
                            <td id=td-act>${product.name}</td>
                            <td id=td-act>${product.description}</td>
                            <td id=td-act>${product.divisa}</td>
                        
                        <button name="btn-delete" class="btn-delete">DELETE</button>
        `;
        actList.appendChild(element);
        e.preventDefault();

    }
    resetForm() {
        document.getElementById('act-form').reset();
    }
    deleteAct(element) {
        if (element.name === 'btn-delete') {
            element.parentElement.remove();
        }
    }


}

document.getElementById('act-form')
    .addEventListener('submit', function (e) {
        
        
       
      
        const name = document.getElementById('name').value;
        const description = document.getElementById('description').value;
        const divisa = document.getElementById('divisa').value;

      
        const act = new Actividad(name, description, divisa);
        const ui = new UI();
        
        ui.addAct(act);
        // ui.resetForm();
        
       
       
    });
document.getElementById('act-list').addEventListener('click', function (e) {
    const ui = new UI();
    ui.deleteAct(e.target);
});
