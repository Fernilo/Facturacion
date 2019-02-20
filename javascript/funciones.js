//javascript
/*function validarCamposUsuarios(){
	nombre=document.getElementById('nombre').value;
	if(nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
		document.getElementById("ocultarNombre").style.display='block';
		nom= document.getElementById("nombre");
		nom.className += " is-invalid";
		return false;
	}
	email=document.getElementById('email').value;
	if(email == null || email.length == 0 || /^\s+$/.test(email) ) {
		document.getElementById("ocultarEmail").style.display='block';
		ema= document.getElementById("email");
		ema.className += " is-invalid";
		return false;
	}
	usuario=document.getElementById('usuario').value;
	if(usuario == null || usuario.length == 0 || /^\s+$/.test(usuario) ) {
		document.getElementById("ocultarUsuario").style.display='block';
		usu= document.getElementById("usuario");
		usu.className += " is-invalid";
		return false;
	}
	clave=document.getElementById('clave').value;
	if(clave == null || clave.length == 0 || /^\s+$/.test(clave) ) {
		document.getElementById("ocultarClave").style.display='block';
		cla= document.getElementById("clave");
		cla.className += " is-invalid";
		return false;
	}

}*/
function validarCamposClientes(){
	nombre=document.getElementById('nombre').value;
	if(nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
		document.getElementById("ocultarNombre").style.display='block';
		nom= document.getElementById("nombre");
		nom.className += " is-invalid";
		return false;
	}
	dni=document.getElementById('dni').value;
	if(dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {
		document.getElementById("ocultarDNI").style.display='block';
		dni= document.getElementById("dni");
		dni.className += " is-invalid";
		return false;
	}
	telefono=document.getElementById('telefono').value;
	if(telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) ) {
		document.getElementById("ocultarTelefono").style.display='block';
		tel= document.getElementById("telefono");
		tel.className += " is-invalid";
		return false;
	}
	direccion=document.getElementById('direccion').value;
	if(direccion == null || direccion.length == 0 || /^\s+$/.test(direccion) ) {
		document.getElementById("ocultarDireccion").style.display='block';
		dir= document.getElementById("direccion");
		dir.className += " is-invalid";
		return false;
	}
}

//jquery
$(document).ready(function(){
//registro de usuario 	
	$("#submit_registrar").click(function (e) {
		e.preventDefault();

		if($('#nombre').val() == '' || $('#correo').val()=='' || $('#usuario').val()=='' || $('#clave').val()=='')
		{
			$('#alerta').html('<p class="mb-2">Complete todos los campos</p>');
			$('#alerta').toggle(1000);
			return false;
		}
	    
	    $('#loader').show();

	    $.ajax({
	    	url:"registro.php",
	    	type:"post",
	    	dataType:"text",
	    	data:$('#form-ingreso').serialize(),
	    	success:function(r){
	    	console.log(r);
	    		$("#loader").hide();

	    		if(r == 'userExist'){
	    			
	    			$('#alerta').html('<p class="mb-2">El usuario y/o correo ya existen ,ingrese otro</p>')
	    			$('#alerta').toggle(1000);
	    		}

	    		if(r == 'errorDatos'){
	    			$('#alerta').html('<p class="mb-2">Error al crear el usuario</p>');
	    			$('#alerta').toggle(1000);
	    		}
	    		if(r == 'save'){
	    			$('#loader').show();
	    			location.href="sistema.php";
	    		}
	    		
	    	},
	    	error:function(r){
	    		$('#loader').hide();
	    		console.log("Error",r);
	    	}
	    }); 
	});


//agregar usuario
$("#submit_agregar_usuario").click(function (e) {
		e.preventDefault();

		if($('#nombre').val() == '' || $('#email').val()=='' || $('#usuario').val()=='' || $('#clave').val()=='')
		{
			$('#alerta').html('<p class="">Complete todos los campos</p>');
			$('#alerta').toggle(1000);
			return false;
		}
	    
	    $('#loader').show();

	    $.ajax({
	    	url:"usuario.php",
	    	type:"post",
	    	dataType:"text",
	    	data:$('#form_agregar_usuario').serialize(),
	    	success:function(re){
	    		console.log(re);
	    		re=re.trim();
	    		$("#loader").hide();
	    		if(re =='userExist'){
	    			$('#alerta').html('<p class="mb-2">El usuario y/o correo ya existen ,ingrese otro</p>')
	    			$('#alerta').toggle(1000);
	    		}

	    		if(re == 'errorDatos'){
	    			$('#alerta').html('<p class="mb-2">Error al crear el usuario</p>');
	    			$('#alerta').toggle(1000);
	    		}
	    		if(re == 'save'){
	    			$('#loader').show();
	    			$('.alerta-agregado').html('<p class="mb-2">Usuario agregado correctamente</p>');
	    			$('.alerta-agregado').toggle(1000);
	    			$('#loader').hide();
	    		}
	    		
	    		
	    	},
	    	error: function(re){
		        	$('#loader').hide();
		           console.log("Error",r);
		        }	
	    });
	});
//agregar proveedor
$("#submit_agregar_proveedor").click(function (e) {
		e.preventDefault();

		if($('#nombre').val() == '' || $('#contacto').val()=='' || $('#telefono').val()=='' || $('#direccion').val()=='')
		{
			$('#alerta').html('<p class="">Complete todos los campos</p>');
			$('#alerta').toggle(1000);
			return false;
		}
	    
	    $('#loader').show();
	   

	    $.ajax({
	    	url:"agregar-proveedor.php",
	    	type:"post",
	    	dataType:"text",
	    	data:$('#form_agregar_proveedor').serialize(),
	    	success:function(re){
	    		console.log(re);
	    		re=re.trim();
	    		$("#loader").hide();
	    		if(re =='userExist'){
	    			$('#alerta').html('<p class="mb-2">El nombre  ya existe ,ingrese otro</p>')
	    			$('#alerta').toggle(1000);
	    		}

	    		if(re == 'errorDatos'){
	    			$('#alerta').html('<p class="mb-2">Error al crear el proveedor</p>');
	    			$('#alerta').toggle(1000);
	    		}
	    		if(re == 'save'){
	    			$('#loader').show();
	    			$('.alerta-agregado').html('<p class="mb-2">Proveedor agregado correctamente</p>');
	    			$('.alerta-agregado').toggle(1000);
	    			$('#loader').hide();
	    		}
	    		
	    		
	    	},
	    	error: function(re){
		        	$('#loader').hide();
		           console.log("Error",r);
		        }	
	    });
	});
});



