const formulario_asignaturas = document.getElementById('validacion_asignatura');
const textarea_asignaturas = document.querySelectorAll('#validacion_asignatura textarea');
const inputs = document.querySelectorAll('#validacion_asignatura input');

const campos_asignaturas = {
	claveasignatura: false,
	nombreasignatura: false,
    nombrecortoasignatura: false,
    creditoasignatura: false,
    horasteoricas: false,
	horaspracticas: false,
	horastotales: false,
	planacademico: false,
	caracterizacion: false,
	intuicion: false,
	competencia: false
}
const expresiones_asignaturas = {
	creditototal: /^[0-9]{1,3}$/,
	clavemateria:/^[a-zA-Z0-9\_\-]{1,20}$/,
	nombreasig:/^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	nombreasigcorto: /^[a-zA-Z0-9\_\-]{1,30}$/,
	horas:  /^[0-9]{1,4}$/,
	text:/^[a-zA-ZÀ-ÿ\s]{1,500}$/

	
}

const validarFormulario_asignaruras = (e) => {
	switch (e.target.name) {
		case "claveasignatura":
			validarCampo_asignatura(expresiones_asignaturas.clavemateria, e.target, 'claveasignatura');
		break;
		case "nombreasignatura":
			validarCampo_asignatura(expresiones_asignaturas.nombreasig, e.target, 'nombreasignatura');
		break;
		case "nombrecortoasignatura":
			validarCampo_asignatura(expresiones_asignaturas.nombreasigcorto, e.target, 'nombrecortoasignatura');
		break;
		case "creditoasignatura":
			validarCampo_asignatura(expresiones_asignaturas.creditototal, e.target, 'creditoasignatura');
		break;
		case "horasteoricas":
			validarCampo_asignatura(expresiones_asignaturas.horas, e.target, 'horasteoricas');
		break;
		case "horaspracticas":
			validarCampo_asignatura(expresiones_asignaturas.horas, e.target, 'horaspracticas');
		break;
		case "planacademico":
			validarCampo_asignatura(expresiones_asignaturas.clavemateria, e.target, 'planacademico');
		break;
		case "caracterizacion":
			validartextarea_asignaturas(expresiones_asignaturas.text, e.target, 'caracterizacion');
		break;
		case "competencia":
			validartextarea_asignaturas(expresiones_asignaturas.text, e.target, 'competencia');
		break;
		case "intuicion":
			validartextarea_asignaturas(expresiones_asignaturas.text, e.target, 'intuicion');
		break;
	}
}

//validacion de inputs
const validarCampo_asignatura = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.querySelector(`#grupo__${campo} input`).classList.remove('is-invalid');
		document.querySelector(`#grupo__${campo} input`).classList.add('is-valid');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos_asignaturas[campo] = true;
		if(campos_asignaturas.claveasignatura && campos_asignaturas.nombreasignatura && campos_asignaturas.nombrecortoasignatura && campos_asignaturas.creditoasignatura 
			&& campos_asignaturas.horasteoricas && campos_asignaturas.horaspracticas && campos_asignaturas.horastotales && campos_asignaturas.planacademico 
			&& campos_asignaturas.caracterizacion && campos_asignaturas.intuicion && campos_asignaturas.competencia){
            var x = document.getElementById("alerta_asignaturas");
            x.style.display = "none";
        }
		
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} input`).classList.remove('is-valid');
		document.querySelector(`#grupo__${campo} input`).classList.add('is-invalid');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos_asignaturas[campo] = false;
	}
}

//validacion de text area

const validartextarea_asignaturas = (expresion, textarea, campo) => {
	if(expresion.test(textarea.value)){
		document.querySelector(`#grupo__${campo} textarea`).classList.remove('is-invalid');
		document.querySelector(`#grupo__${campo} textarea`).classList.add('is-valid');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos_asignaturas[campo] = true;
		if(campos_asignaturas.claveasignatura && campos_asignaturas.nombreasignatura && campos_asignaturas.nombrecortoasignatura && campos_asignaturas.creditoasignatura 
			&& campos_asignaturas.horasteoricas && campos_asignaturas.horaspracticas && campos_asignaturas.horastotales && campos_asignaturas.planacademico 
			&& campos_asignaturas.caracterizacion && campos_asignaturas.intuicion && campos_asignaturas.competencia){
            var x = document.getElementById("alerta_asignaturas");
            x.style.display = "none";
        }
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} textarea`).classList.remove('is-valid');
		document.querySelector(`#grupo__${campo} textarea`).classList.add('is-invalid');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos_asignaturas[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario_asignaruras);
	input.addEventListener('blur', validarFormulario_asignaruras);
});

textarea_asignaturas.forEach((textarea) => {
	textarea.addEventListener('keyup', validarFormulario_asignaruras);
	textarea.addEventListener('blur', validarFormulario_asignaruras);
});

 if(formulario_asignaturas){
/*	formulario_asignaturas.addEventListener('submit', (e) => {
		e.preventDefault()
	
		if(campos_asignaturas.claveasignatura && campos_asignaturas.nombreasignatura && campos_asignaturas.nombrecortoasignatura && campos_asignaturas.creditoasignatura 
			&& campos_asignaturas.horasteoricas && campos_asignaturas.horaspracticas && campos_asignaturas.horastotales && campos_asignaturas.planacademico 
			&& campos_asignaturas.caracterizacion && campos_asignaturas.intuicion && campos_asignaturas.competencia){
				var numerounidad = $("#unidades").val();
			
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
					//formulario_asignaturas.reset();
					document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
						document.querySelector('#grupo__claveasignatura input').classList.remove('is-valid');
						document.querySelector('#grupo__nombreasignatura input').classList.remove('is-valid');
						document.querySelector('#grupo__nombrecortoasignatura input').classList.remove('is-valid');
						document.querySelector('#grupo__creditoasignatura input').classList.remove('is-valid');
						document.querySelector('#grupo__horasteoricas input').classList.remove('is-valid');
						document.querySelector('#grupo__horaspracticas input').classList.remove('is-valid');
						document.querySelector('#grupo__horastotales input').classList.remove('is-valid');
						document.querySelector('#grupo__planacademico input').classList.remove('is-valid');
						document.querySelector('#grupo__caracterizacion textarea').classList.remove('is-valid');
						document.querySelector('#grupo__intuicion textarea').classList.remove('is-valid');
						document.querySelector('#grupo__competencia textarea').classList.remove('is-valid');
						$("fieldset").prop('disabled', false);
				  		document.getElementById('alerta_agrega_unidad').style.display = "none";
				 		 document.getElementById('alerta_ahora_agregar').style.display = "block";
					});
					  //window.location.href="";
				  });
	
				  
			}
			else{
			var x = document.getElementById("alerta_asignaturas");
			x.style.display = "block";
		}
	
	});*/
} 

function quitarmensajeunidades(){
	var quitarmensajeuni = document.getElementById("alerta_asignaturas_nounidad");
    quitarmensajeuni.style.display = "none";
}

function sumahorastotales(){
	var total = 0;

  $(".monto").each(function() {

    if (isNaN(parseFloat($(this).val()))) {

      total += 0;

    } else {

      total += parseFloat($(this).val());

    }

  });

  //alert(total);
  $("#horastotales").val(total);
	document.querySelector(`#grupo__horastotales input`).classList.add('is-valid');
	document.getElementById(`grupo__horastotales`).classList.add('formulario__grupo-correcto');
	campos_asignaturas.horastotales=true;
}

function agregarunidad(){
	$('#agregar_unidad').show();
	document.getElementById('actualizar_unidad').style.display = "none";

}

function actualizarunidad(){
	$('#actualizar_unidad').show();
	document.getElementById('agregar_unidad').style.display = "none";
}




