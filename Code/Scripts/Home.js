
document.getElementById('btn-anadir').addEventListener('click', function () {

    const form = document.getElementById('act-form');
    form.style.display = "block";
    const formDesplegat= document.getElementById('card');
    formDesplegat.style.marginTop = "-500px";
});

document.getElementById('btn-eliminar').addEventListener('click', function () {

    const form = document.getElementById('act-form');
    form.style.display = "none";
    const formDesplegat= document.getElementById('card');
    formDesplegat.style.marginTop = "-500px";
    

});



