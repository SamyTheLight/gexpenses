// const error = document.getElementById("error");
// error.className = "error";



function addAdscrito() {
  const value = document.getElementById("nombre").value;
  const actList = document.getElementById("emails");
  const element = document.createElement("div");
  const btn = document.createElement("btn");
  const input = document.createElement("input");

  element.classList.add("news-mails");
  actList.appendChild(element);
  input.type = "text";
  input.classList.add("input-mail");
  input.setAttribute("id", "input-mail");
  input.name = "nombre_adscritos[]";
  input.value = value;
  element.appendChild(input);
  btn.classList.add("btn-mail");
  btn.setAttribute("id", "btn-mail");
  btn.name = "btn-mail";
  btn.append("BORRAR");
  element.appendChild(btn);

  document.getElementById("nombre").value = "";
}

function deleteAct(element) {
  if (element.name === "btn-mail") {
    element.parentElement.remove();
  }
}

document.getElementById("btn-adscrito").addEventListener("click", addAdscrito);

document.getElementById("emails").addEventListener("click", function (e) {
  deleteAct(e.target);
});
