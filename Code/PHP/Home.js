fetch('mostrarActivitat.php')
.then(mostrarActivitats => mostrarActivitats.json())
.then(activitat => {
    
    let str= '';
    activitat.map(item => {
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

});