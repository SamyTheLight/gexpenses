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