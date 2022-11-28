/*fetch('Home.php')
.then(resultado => resultado.json())
.then(dataQ => {
    
    let str= '';
    dataQ.map(item => {
        str += `
            <tr>
                <td>${item.id_activitat} </td>
                <td>${item.Nombre} </td>
                <td>${item.Descripcion} </td>
                <td>${item.Divisa} </td>
            
            </tr>
            `
    });

    document.getElementById("taulaMostrar").innerHTML=str;

});*/
document.getElementById('btn-anadir').addEventListener('click', function () {

    const form = document.getElementById('act-form');
    form.style.display = "block";
});

document.getElementById('btn-eliminar').addEventListener('click', function () {

    const form = document.getElementById('act-form');
    form.style.display = "none";
});

