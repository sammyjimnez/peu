const formulario = document.getElementById('validacion_modalunidades');
const textare = document.querySelectorAll('#validacion_modalunidades textarea');

const expresiones = {
	text:/^[a-zA-ZÀ-ÿ\s]{1,500}$/,
}

const campos = {
	descripcion1: false,
	sub: false,
    descripcion2: false,
    competenciasgenericas: false,
    actividades:false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "descripcion1":
			validartextarea(expresiones.text, e.target, 'descripcion1');
		break;
		case "sub":
			validartextarea(expresiones.text, e.target, 'sub');
		break;
		case "descripcion2":
			validartextarea(expresiones.text, e.target, 'descripcion2');
		break;
		case "competenciasgenericas":
			validartextarea(expresiones.text, e.target, 'competenciasgenericas');
		break;
		case "actividades":
			validartextarea(expresiones.text, e.target, 'actividades');
		break;
	}
}


//validacion de text area

const validartextarea = (expresion, textarea, campo) => {
	if(expresion.test(textarea.value)){
		document.querySelector(`#grupo__${campo} textarea`).classList.remove('is-invalid');
		document.querySelector(`#grupo__${campo} textarea`).classList.add('is-valid');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
        if(campos.descripcion1 && campos.sub && campos.descripcion2 && campos.competenciasgenericas && campos.actividades){
            var x = document.getElementById("alerta_modal");
            x.style.display = "none";
        }
        
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} textarea`).classList.remove('is-valid');
		document.querySelector(`#grupo__${campo} textarea`).classList.add('is-invalid');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}


textare.forEach((textarea) => {
	textarea.addEventListener('keyup', validarFormulario);
	textarea.addEventListener('blur', validarFormulario);
});

if(formulario){
	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
	
		if(campos.descripcion1 && campos.sub && campos.descripcion2 && campos.competenciasgenericas && campos.actividades){
			swal({
				title: '¿Estas seguro de actualizar?',
				text: "Esta por actualizar la información en la base de datos, se le recomienda verificar la información.",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#03A9F4',
				cancelButtonColor: '#F44336',
				confirmButtonText: '<i class="zmdi zmdi-check-circle"></i> Si, guardar',
				cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, regresar'
		  }).then(function () {
			formulario.reset();
			document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
				document.querySelector('#grupo__descripcion1 textarea').classList.remove('is-valid');
				document.querySelector('#grupo__sub textarea').classList.remove('is-valid');
				document.querySelector('#grupo__descripcion2 textarea').classList.remove('is-valid');
				document.querySelector('#grupo__competenciasgenericas textarea').classList.remove('is-valid');
				document.querySelector('#grupo__actividades textarea').classList.remove('is-valid');
				cerrarmodal();
				var nuevaunidad = document.getElementById("alerta_nuevaunidad");
				nuevaunidad.style.display = "block";
				$('#alerta_nuevaunidad').delay(6000).fadeOut(1100); 
				
			
			});
			 // window.location.href="";
		  });
	
	
		}
		else{
			var x = document.getElementById("alerta_modal");
			x.style.display = "block";
		}
	
	});
}

function cerrarmodal(){
	$("#exampleModal").modal('hide');
}







