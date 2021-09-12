
/*$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, .content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      document.getElementById("bodyContent").style.width="100%";
    });
});*/

/*buscador administrativo */
function buscar_administrativo(){
  const url = "http://localhost/peu_upqroo/";
  let buscar = document.getElementById("buscar").value;
  let perfil = document.getElementById("perfil").value;
  let carrera = document.getElementById("carrera").value;
  let pagina = 1;

  location.href = url + "perfil_administrativo/buscador/" + buscar + "/" + perfil + "/" + carrera + "/" + pagina;
}


function definirSeccionAlumno(matricula,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+ i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrativo_resultados/alumno/" + matricula + "/" + seccionSeleccionado;
}

function definirSeccionDirector(numcontrol,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url + "perfil_administrativo_resultados/director/" + numcontrol + "/" + seccionSeleccionado;
}

function definirSeccionDocente(numcontrol,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrativo_resultados/docente/" + numcontrol + "/" + seccionSeleccionado;
}
/*buscador administrativo */


/*buscador administrador */

function buscar_administrador(){
  const url = "http://localhost/peu_upqroo/";
  let buscar = document.getElementById("buscar").value;
  let perfil = document.getElementById("perfil").value;
  let carrera = document.getElementById("carrera").value;
  let pagina = 1;

  location.href = url + "perfil_administrador/buscador/" + buscar + "/" + perfil + "/" + carrera + "/" + pagina;
}

function definirSeccionAlumnoAdministrador(matricula,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+ i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrador_resultados/alumno/" + matricula + "/" + seccionSeleccionado;
}

function definirSeccionDirectorAdministrador(numcontrol,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url + "perfil_administrador_resultados/director/" + numcontrol + "/" + seccionSeleccionado;
}

function definirSeccionDocenteAdministrador(numcontrol,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrador_resultados/docente/" + numcontrol + "/" + seccionSeleccionado;
}

function definirSeccionAdministrativoAdministrador(numcontrol,i){
  const url = "http://localhost/peu_upqroo/";
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  console.log(seccionSeleccionado);
  location.href= url +"perfil_administrador_resultados/administrativo/" + numcontrol + "/" + seccionSeleccionado;
}

function cambiarlengua(){
  let grupoSeleccionado = document.getElementById("grupo_indigena").value;
  let array = grupoSeleccionado.split("-");
  let lengua = array[1];

  document.getElementById("lengua_indigena").value = lengua; 
}

/*buscador administrador */

/* perfil administrador */



var i = 0;
function crearDocumento(){
  var table = document.getElementById("table_documentos");
  var xmlhttp = ajaxReq();
  var url = "http://localhost/peu_upqroo/perfil_administrador/getTiposDocumentos";
  var params = "your post body parameters";
  xmlhttp.open("POST", url, true); // set true for async, false for sync request
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(null); // or null, if no parameters are passed  

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       try {
           var obj = JSON.parse(xmlhttp.responseText);
           console.log(obj);

           console.log(i);

           //
           let tr = document.createElement("tr");
           tr.setAttribute("id", "tr_doc" + i);
           table.appendChild(tr);
         
           let td1 = document.createElement("td");
           tr.appendChild(td1);
         
            let input = document.createElement("input");
            input.setAttribute("name", "nom_doc" + i);
            input.setAttribute("id", "nom_doc" + i);
            input.setAttribute("type", "text");
            input.setAttribute("required", "true");
            input.className = "form-control";
            td1.appendChild(input);
         
           let td2 = document.createElement("td");
           tr.appendChild(td2);
         
            let select1 = document.createElement("select");
            select1.setAttribute("name", "sel_tip" + i);
            select1.setAttribute("id", "sel_tip" + i);
            select1.className = "form-control";
            td2.appendChild(select1);

              for (let index = 0; index < obj.length; index++) {
                  let option = document.createElement("option");
                  option.value = obj[index]['ID_Tipo_Doc'];
                  option.text = obj[index]['Nombre'];
                  select1.appendChild(option);
              }
         
           let td3 = document.createElement("td");
           tr.appendChild(td3);
         
            let select2 = document.createElement("select");
            select2.setAttribute("name", "sel_est" + i);
            select2.setAttribute("id", "sel_est" + i);
            select2.className = "form-control";
            td3.appendChild(select2);
            
            let array_estatus = ["Correcto", "Incorrecto"];
              for (let index = 0; index < array_estatus.length; index++) {
                let option = document.createElement("option");
                option.value = array_estatus[index];
                option.text = array_estatus[index];
                select2.appendChild(option);
              }
            
          let td4 = document.createElement("td");
          tr.appendChild(td4);

            let button1 = document.createElement("input");
            button1.className = "btn-primary rounded";
            button1.style.color = "white";
            
            button1.setAttribute("name","imagen_documento" + i);
            button1.setAttribute("type", "file");
            button1.setAttribute("required", "true");
            button1.setAttribute("accept", ".pdf");
            td4.appendChild(button1);

            let td5 = document.createElement("td");
            tr.appendChild(td5);
  
              let button2 = document.createElement("button");
              button2.className = "btn btn-primary";
              button2.setAttribute("type", "button");
              button2.innerHTML = "Eliminar";
              button2.setAttribute("onclick","eliminarDocumento(" + i + ")");
              td5.appendChild(button2);

          i++;
       } catch (error) {
           throw Error;
       }
    }
  }
}

function agregarDocumento(){
  var table = document.getElementById("table_documentos");
  var xmlhttp = ajaxReq();
  var url = "http://localhost/peu_upqroo/perfil_administrador/getTiposDocumentos";
  var params = "your post body parameters";
  xmlhttp.open("POST", url, true); // set true for async, false for sync request
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(null); // or null, if no parameters are passed  

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       try {
           var obj = JSON.parse(xmlhttp.responseText);
           console.log(obj);
           //
           let tr = document.createElement("tr");
           tr.setAttribute("id", "tr_doc" + i);
           table.appendChild(tr);
         
           let td1 = document.createElement("td");
           tr.appendChild(td1);
         
            let input = document.createElement("input");
            input.setAttribute("name", "nom_doc" + i);
            input.setAttribute("id", "nom_doc" + i);
            input.setAttribute("type", "text");
            input.setAttribute("required", "true");
            input.className = "form-control";
            td1.appendChild(input);
         
           let td2 = document.createElement("td");
           tr.appendChild(td2);
         
            let select1 = document.createElement("select");
            select1.setAttribute("name", "sel_tip" + i);
            select1.setAttribute("id", "sel_tip" + i);
            select1.className = "form-control";
            td2.appendChild(select1);

              for (let index = 0; index < obj.length; index++) {
                  let option = document.createElement("option");
                  option.value = obj[index]['ID_Tipo_Doc'];
                  option.text = obj[index]['Nombre'];
                  select1.appendChild(option);
              }
         
           let td3 = document.createElement("td");
           tr.appendChild(td3);
         
            let select2 = document.createElement("select");
            select2.setAttribute("name", "sel_est" + i);
            select2.setAttribute("id", "sel_est" + i);
            select2.className = "form-control";
            td3.appendChild(select2);
            
            let array_estatus = ["Correcto", "Incorrecto"];
              for (let index = 0; index < array_estatus.length; index++) {
                let option = document.createElement("option");
                option.value = array_estatus[index];
                option.text = array_estatus[index];
                select2.appendChild(option);
              }
            
          let td4 = document.createElement("td");
          tr.appendChild(td4);

            let button1 = document.createElement("input");
            button1.className = "btn-primary rounded";
            button1.style.color = "white";
            
            button1.setAttribute("name","imagen_documento" + i);
            button1.setAttribute("type", "file");
            button1.setAttribute("required", "true");
            button1.setAttribute("accept", ".pdf");
            td4.appendChild(button1);
          i++;
       } catch (error) {
           throw Error;
       }
    }
  }
}

function eliminarDocumento(i){
  console.log(i);
  let fila = document.getElementById("tr_doc" + i);
  document.getElementById("table_documentos").removeChild(fila);
}

var j = 0;
function crearAsignatura(){
  var table = document.getElementById("table_asignaturas");
  var xmlhttp = ajaxReq();
  var url = "http://localhost/peu_upqroo/perfil_administrador/getAsignaturas";
  var params = "your post body parameters";
  xmlhttp.open("POST", url, true); // set true for async, false for sync request
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(null); // or null, if no parameters are passed  

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       try {
           var obj = JSON.parse(xmlhttp.responseText);
           console.log(obj["carreras"]);

           let tr = document.createElement("tr");
           tr.setAttribute("id", "tr_asig" + j);
           table.appendChild(tr);
         
           let td1 = document.createElement("td");
           tr.appendChild(td1);
                  
            let select1 = document.createElement("select");
            select1.setAttribute("name", "sel_carr" + j);
            select1.setAttribute("id", "sel_carr" + j);
            select1.className = "form-control";
            td1.appendChild(select1);

              for (let index = 0; index < obj["carreras"].length; index++) {
                  let option = document.createElement("option");
                  option.value = obj["carreras"][index]['ID_Carrera'];
                  option.text = obj["carreras"][index]['Nom_Carrera'];
                  select1.appendChild(option);
              }

            let td2 = document.createElement("td");
           tr.appendChild(td2);
         
            let select2 = document.createElement("select");
            select2.setAttribute("name", "sel_asig" + j);
            select2.setAttribute("id", "sel_asig" + j);
            select2.className = "form-control";
            td2.appendChild(select2);
            
            for (let index = 0; index < obj["asignaturas"].length; index++) {
              let option = document.createElement("option");
              option.value = obj["asignaturas"][index]['ID_Asig'];
              option.text = obj["asignaturas"][index]['Nombre_Asig'];
              select2.appendChild(option);
            }
         
           let td3 = document.createElement("td");
           tr.appendChild(td3);
         
            let select3 = document.createElement("select");
            select3.setAttribute("name", "sel_asig_est" + j);
            select3.setAttribute("id", "sel_asig_est" + j);
            select3.className = "form-control";
            td3.appendChild(select3);
            
            let array_estatus = ["Activo", "Actual", "Desactivado"];
              for (let index = 0; index < array_estatus.length; index++) {
                let option = document.createElement("option");
                option.value = array_estatus[index];
                option.text = array_estatus[index];
                select3.appendChild(option);
              }
            
          let td4 = document.createElement("td");
          tr.appendChild(td4);
            
            let button2 = document.createElement("button");
            button2.className = "btn btn-primary";
            button2.setAttribute("type", "button");
            button2.innerHTML = "Eliminar";
            button2.setAttribute("onclick","eliminarAsignatura(" + j + ")");
            td4.appendChild(button2);
          j++;

       } catch (error) {
           throw Error;
       }
    }
  }
}

function eliminarAsignatura(j){
  let fila = document.getElementById("tr_asig" + j);
  document.getElementById("table_asignaturas").removeChild(fila);
}

function ajaxReq() {
  if (window.XMLHttpRequest) {
      return new XMLHttpRequest();
  } else if (window.ActiveXObject) {
      return new ActiveXObject("Microsoft.XMLHTTP");
  } else {
      alert("Browser does not support XMLHTTP.");
      return false;
  }
}



//http.send(params);

/*reportes administrativo */

function pdfAlumno(matricula, i){
  let seccionSeleccionado = document.getElementById('seccion'+i).value;
  let win = window.open('./../../controllers/administrativo/imprimir_ejemplo.php?matricula='+matricula + "&seccion=" + seccionSeleccionado, '_blank');
  win.focus();
}


