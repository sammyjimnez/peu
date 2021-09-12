const formulario_planes = document.getElementById('validacionplanes');
const inputs_planes = document.querySelectorAll('#validacionplanes input');

const expresiones_planes = {
	plan: /^[A-Z]$/,
    texto: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
	claveoficial: /^[a-zA-Z0-9\_\-]{1,10}$/,
	numerico: /^[0-9]{1,2}$/,
    creditototal: /^[0-9]{1,3}$/
}

const campos_planes = {
    carrera: false,
	plan: false,
	claveoficial: false,
    periododuracion: false,
    creditostotales: false,
    periodomaximo:false
}

const validarFormulario_planes = (e) => {
	switch (e.target.name) {
        case "carrera":
			validar_input_planes(expresiones_planes.texto, e.target, 'carrera');
		break;
        case "plan":
			validar_input_planes(expresiones_planes.plan, e.target, 'plan');
		break;
		case "claveoficial":
			validar_input_planes(expresiones_planes.claveoficial, e.target, 'claveoficial');
		break;
		case "periododuracion":
			validar_input_planes(expresiones_planes.numerico, e.target, 'periododuracion');
		break;
		case "creditostotales":
			validar_input_planes(expresiones_planes.creditototal, e.target, 'creditostotales');
		break;
		case "periodomaximo":
			validar_input_planes(expresiones_planes.numerico, e.target, 'periodomaximo');
        break;
	}
}


//validacion de text area

const validar_input_planes = (expresion, textarea, campo) => {
	if(expresion.test(textarea.value)){
		document.querySelector(`#grupo__${campo} input`).classList.remove('is-invalid');
		document.querySelector(`#grupo__${campo} input`).classList.add('is-valid');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos_planes[campo] = true;
            if(campos_planes.carrera && campos_planes.plan && campos_planes.claveoficial && campos_planes.periododuracion && campos_planes.creditostotales && periodomaximo){
                var x_planes = document.getElementById("alerta_planes");
                x_planes.style.display = "none";
            }
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} input`).classList.remove('is-valid');
		document.querySelector(`#grupo__${campo} input`).classList.add('is-invalid');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos_planes[campo] = false;
	}
}


inputs_planes.forEach((input) => {
	input.addEventListener('keyup', validarFormulario_planes);
	input.addEventListener('blur', validarFormulario_planes);
});

/* if(formulario_planes){
    formulario_planes.addEventListener('submit', (e) => {
        e.preventDefault();
    
        if(campos_planes.carrera && campos_planes.plan && campos_planes.claveoficial && campos_planes.periododuracion && campos_planes.creditostotales && periodomaximo){
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
            formulario_planes.reset();
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                document.querySelector('#grupo__carrera input').classList.remove('is-valid');
                document.querySelector('#grupo__plan input').classList.remove('is-valid');
                document.querySelector('#grupo__claveoficial input').classList.remove('is-valid');
                document.querySelector('#grupo__periododuracion input').classList.remove('is-valid');
                document.querySelector('#grupo__creditostotales input').classList.remove('is-valid');
                document.querySelector('#grupo__periodomaximo input').classList.remove('is-valid');
            });
             // window.location.href="";
          });
    
    
        }
        else{
            var x = document.getElementById("alerta_planes");
            x.style.display = "block";
        }
    
    });
    
} */







