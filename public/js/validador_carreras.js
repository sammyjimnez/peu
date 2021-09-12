const formulario_carreras = document.getElementById('validacioncarreras');
const inputs_carreras = document.querySelectorAll('#validacioncarreras input');

const expresiones_carreras = {
    texto: /^[a-zA-ZÀ-ÿ\s]{1,50}$/,
	coordinador: /^[a-zA-ZÀ-ÿ\s]{1,75}$/
}

const campos_carreras = {
    carrera: false,
	coordinador: false
}

const validarFormulario_carreras = (e) => {
	switch (e.target.name) {
        case "carrera":
			validar_input_carreras(expresiones_carreras.texto, e.target, 'carrera');
		break;
		case "coordinador":
			validar_input_carreras(expresiones_carreras.coordinador, e.target, 'coordinador');
		break;
	}
}


//validacion de text area

const validar_input_carreras = (expresion, textarea, campo) => {
	if(expresion.test(textarea.value)){
		document.querySelector(`#grupo__${campo} input`).classList.remove('is-invalid');
		document.querySelector(`#grupo__${campo} input`).classList.add('is-valid');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos_carreras[campo] = true;
            if(campos_carreras.carrera && campos_carreras.coordinador){
                var x_carreras = document.getElementById("alerta_carreras");
                x_carreras.style.display = "none";
            }
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} input`).classList.remove('is-valid');
		document.querySelector(`#grupo__${campo} input`).classList.add('is-invalid');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos_carreras[campo] = false;
	}
}


inputs_carreras.forEach((input) => {
	input.addEventListener('keyup', validarFormulario_carreras);
	input.addEventListener('blur', validarFormulario_carreras);
});

/* if(formulario_carreras){
    formulario_carreras.addEventListener('submit', (e) => {
        e.preventDefault();
    
        if(campos_carreras.carrera && campos_carreras.coordinador){
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
            formulario_carreras.reset();
            document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                document.querySelector('#grupo__carrera input').classList.remove('is-valid');
                document.querySelector('#grupo__coordinador input').classList.remove('is-valid');
                
            });
             // window.location.href="";
          });
    
    
        }
        else{
            var x = document.getElementById("alerta_carreras");
            x.style.display = "block";
        }
    
    });
    
} */

if(formulario_carreras){
    formulario_carreras.addEventListener('submit', (e) => {    
        if(campos_carreras.carrera && campos_carreras.coordinador){
            
    
    
        }
        else{
            e.preventDefault();
            var x = document.getElementById("alerta_carreras");
            x.style.display = "block";
        }
    
    });
    
} 

function alerta() {
	validar_input_carreras(expresiones_carreras.texto,'carrera', 'carrera');
	validar_input_carreras(expresiones_carreras.coordinador, 'coordinador', 'coordinador');
}







