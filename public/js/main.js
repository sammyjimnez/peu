let url = "http://localhost/peu_upqroo/";

$(document).ready(function(){
	
	$('.btn-sideBar-SubMenu').on('click', function(){
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	$('.btn-exit-system').on('click', function(){
		swal({
		  	title: '¿Estas seguro de cerrar sesión?',
		  	text: "Está por salir de la plataforma, se cerrará todas las opciones abiertas por seguridad de la información",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, salir',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, regresar'
		}).then(function () {
			window.location.href=url +  "login/cerrarsession";
		});
	});


	$('.btn-guardarcambios').on('click', function(){
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
			window.location.href="";
		});

		if(confirmButtonText==false){
			desactivarcaja()
		}
	});


	$('.btn-menu-dashboard').on('click', function(){
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});
	$('.btn-Notifications-area').on('click', function(){
		var NotificationsArea=$('.Notifications-area');
		if(NotificationsArea.css('opacity')=="0"){
			NotificationsArea.addClass('show-Notification-area');
		}else{
			NotificationsArea.removeClass('show-Notification-area');
		}
	});
	$('.btn-search').on('click', function(){
		swal({
		  title: 'What are you looking for?',
		  confirmButtonText: '<i class="zmdi zmdi-search"></i>  Search',
		  confirmButtonColor: '#03A9F4',
		  showCancelButton: true,
		  cancelButtonColor: '#F44336',
		  cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cancel',
		  html: '<div class="form-group label-floating">'+
			  		'<label class="control-label" for="InputSearch">write here</label>'+
			  		'<input class="form-control" id="InputSearch" type="text">'+
				'</div>'
		}).then(function () {
		  swal(
		    'You wrote',
		    ''+$('#InputSearch').val()+'',
		    'success'
		  )
		});
	});
	$('.btn-modal-help').on('click', function(){
		$('#Dialog-Help').modal('show');
	});

	//$("input").prop('disabled', true);
	//$("select").prop('disabled', true);
	





	$('#example').DataTable();

	

	

});

var contador=0;
function cantidadunidades(){
	contador=contador+1;
	$("#unidades").val(contador);
	$("#numerounidad").val(contador);
  }

function cerrarunidad(){
	contador=contador-1;
	$("#unidades").val(contador);
	$("#numerounidad").val(contador);
}
  


function bloquearinputs () {
	$("input").prop('disabled', true);
	$("select").prop('disabled', true);
	
  }




  function activarinput(){
	$("input").prop('disabled', false);
	$("select").prop('disabled', false);
	$("textarea").prop('disabled', false);
	$('#boton').show();
	$('#nuevaunidad').prop('disabled', false);
	document.getElementById('boton_agregar').style.display = "none";
	document.getElementById('alerta_agrega_unidad').style.display = "none";
	$("fieldset").prop('disabled', false);
  }

  function agregar(){
	$("input").prop('disabled', false);
	$("select").prop('disabled', false);
	$("textarea").prop('disabled', false);
	$('#nuevaunidad').prop('disabled', false);
	$('#boton_agregar').show();
	document.getElementById('boton').style.display = "none";
	document.getElementById('alerta_agrega_unidad').style.display = "block";
	$("fieldset").prop('disabled', true);


  }

  function desactivarcaja(){
	$("input").prop('disabled', true);
	$("select").prop('disabled', true);
	

  
	
}
$(document).on("click",function(e) {
	


	if($('#sub-menu').css('display') == 'none'){
		// Acción si el elemento no es visible
		
		
	 }else{
		// Acción si el elemento es visible
		var container = $("#sub-menu");
		var conta = $("#confi");
		if (!container.is(e.target) && container.has(e.target).length === 0) { 
		//Se ha pulsado en cualquier lado fuera de los elementos contenidos en la variable container
			if (!conta.is(e.target) && conta.has(e.target).length === 0){
				$('#sub-menu').toggle();
			}
		
		}
		
		
	 }

	
});


$(".dashboard-sideBar-Menu").find("li").click(function(){
	$(".dashboard-sideBar-Menu li").removeClass('seleccionar')
	$(this).addClass('seleccionar')
  })


  

  




  