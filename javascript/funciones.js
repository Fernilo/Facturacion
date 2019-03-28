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
function validarCamposProveedor() {
    nombre = document.getElementById('nombre').value;
    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        document.getElementById("ocultarNombre").style.display = 'block';
        nom = document.getElementById("nombre");
        nom.className += " is-invalid";
        return false;
    }
    cont = document.getElementById('contacto').value;
    if (cont == null || cont.length == 0 || /^\s+$/.test(cont)) {
        document.getElementById("ocultarContacto").style.display = 'block';
        con = document.getElementById("contacto");
        con.className += " is-invalid";
        return false;
    }
    telefono = document.getElementById('telefono').value;
    if (telefono == null || telefono.length == 0 || /^\s+$/.test(telefono)) {
        document.getElementById("ocultarTelefono").style.display = 'block';
        tel = document.getElementById("telefono");
        tel.className += " is-invalid";
        return false;
    }
    direccion = document.getElementById('direccion').value;
    if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)) {
        document.getElementById("ocultarDireccion").style.display = 'block';
        dir = document.getElementById("direccion");
        dir.className += " is-invalid";
        return false;
    }
}

//jquery
$(document).ready(function(){
//registro de usuario 	
	$("#submit_registrar").click(function (e){
		e.preventDefault();

		if($('#nombre').val() == '' || $('#correo').val()=='' || $('#usuario').val()=='' || $('#clave').val()=='')
		{
			$('#alerta').html('<p class="mb-2 mal">Complete todos los campos</p>').show();
			
			return false;
		}
	    

	    $.ajax({
	    	url:"registro.php",
	    	type:"post",
	    	dataType:"text",
	    	data:$('#form-ingreso').serialize(),
	    	beforeSend:function(){
	    		$('#loader').show();
	    	},
	    	success:function(re){
	    	console.log(re);
	    	re=re.trim();

	    		if(re == 'userExist'){
	    			
	    			$('#alerta').html('<p class="mb-2 mal">El usuario y/o correo ya existen</p>').show();
	    			
	    		}

	    		if(re == 'errorDatos'){
	    			$('#alerta').html('<p class="mb-2 mal">Error al crear el usuario</p>').show();
	    		}

	    		if(re == 'save'){
	    			$('#form_ingreso').trigger("reset");
	    			location.href="sistema.php";
	    		}
	    		
	    	},
	    	error:function(r){
	    		console.log("Error",r);
	    	},
	    	complete:function(){
		    	$('#loader').hide();
		    }
	    }); 
	});


//agregar usuario
$("#submit_agregar_usuario").click(function (e) {
		e.preventDefault();

		if($('#nombre').val() == '' || $('#email').val()=='' || $('#usuario').val()=='' || $('#clave').val()=='')
		{
			$('#alerta').html('<p class="mal">Complete todos los campos</p>').show();
			
			return false;
		}
	    
	    

	    $.ajax({
	    	url:"usuario.php",
	    	type:"post",
	    	dataType:"text",
	    	data:$('#form_agregar_usuario').serialize(),
	    	beforeSend:function(){
	    		$('#loader').show();
	    	},
	    	success:function(re){
	    		console.log(re);
	    		re=re.trim();
	    		
	    		if(re =='userExist'){
	    			$('#alerta').html('<p class="mal">El usuario y/o correo ya existen ,ingrese otro</p>').show();
	    			
	    		}

	    		if(re == 'errorDatos'){
	    			$('#alerta').html('<p class="mal">Error al crear el usuario</p>').show();
	    			
	    		}
	    		if(re == 'save'){
	    			
	    			$('#alerta').html('<p class="bien">Usuario agregado correctamente</p>').show();
	    			$('#form_agregar_usuario').trigger("reset");
	    		}
	    		
	    		
	    	},
	    	error: function(re){
		        	$('#loader').hide();
		           console.log("Error",r);
		        },
		    complete:function(){
		    	$('#loader').hide();
		    }	
	    });
	});
//agregar proveedor
$("#submit_agregar_proveedor").click(function (e) {
		e.preventDefault();

		if($('#nombre').val() == '' || $('#contacto').val()=='' || $('#telefono').val()=='' || $('#direccion').val()=='')
		{
			$('#alerta').html('<p class="mal">Complete todos los campos</p>').show();
			
			return false;
		}
	    

	    $.ajax({
	    	url:"agregar-proveedor.php",
	    	type:"post",
	    	dataType:"text",
	    	data:$('#form_agregar_proveedor').serialize(),
	    	beforeSend:function(){
	    		$('#loader').show();
	    	},
	    	success:function(re){
	    		console.log(re);
	    		re=re.trim();
	    		
	    		if(re =='userExist'){
	    			$('#alerta').html('<p class="mal">El nombre  ya existe ,ingrese otro</p>').show();
	    			
	    		}

	    		if(re == 'errorDatos'){
	    			$('#alerta').html('<p class="mal">Error al crear el proveedor</p>').show();
	    			
	    		}
	    		if(re == 'save'){
	    			
	    			$('#alerta').html('<p class="bien">Proveedor agregado correctamente</p>').show();
	    			$('#form_agregar_proveedor').trigger("reset");
	    			
	    		}
	    		

	    		
	    	},
	    	error: function(re){
		           console.log("Error",r);
		        },
		    complete:function(){
		    	$('#loader').hide();
		    }	
	    });
	});
//agregar producto
$("#submit_agregar_producto").click(function (e) {
		
		e.preventDefault();
		if($('#proveedor').val() == '' || $('#producto').val()=='' || $('#precio').val()=='' || $('#precio').val()<=0 || $('#cantidad').val()=='' || $('#cantidad').val()<=0)
		{	
			$('#alerta').html('<p class="mal">Complete todos los campos</p>').show();
			
			return false;
		}
		//enviar imagen
	   var parametros =new FormData($("#form_agregar_producto")[0])
	    $.ajax({
	    	url:"registro-producto.php",
	    	type:"post",
	    	processData:false,
			contentType:false,
			data: parametros,
	    	cache:false,	
	    	
	    	
	    	beforeSend:function(){
	    		$('#loader').show();
	    	},
	    	success:function(r){
	    		console.log(r);
	    		r=r.trim();
	    		
	    		
	    		/*if(re =='userExist'){
	    			$('#alerta-mal').html('<p class="mal">El nombre  ya existe ,ingrese otro</p>')
	    			$('#alerta-mal').toggle(1000);
	    		}*/

	    		if(r == 'errorDatos'){
	    			$('#alerta').html('<p class="mal">Error al registrar el producto</p>').show();
	    			
	    		}	
	    		if(r == 'save'){
	    			$('#alerta').html('<p class="bien">Producto agregado correctamente</p>').show();
	    			// limpia el formulario si se inserto correctamente
	    			$('#form_agregar_producto').trigger("reset");
	    		}
	    		
	    		
	    	},
	    	error: function(r){
		           console.log("Error",r);
		        },
		    // se ejecuta sin importa si falla o no
		    complete: function() {
          		$('#loader').hide();
       		 }
	    });
	});
	
	//--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#imagen").on("change",function(){
    	var uploadFoto = document.getElementById("imagen").value;
        var imagen       = document.getElementById("imagen").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
        
            if(uploadFoto !='')
            {
                var type = imagen[0].type;
                var name = imagen[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
                {
                    contactAlert.innerHTML = '<p class="errorArchivo">El archivo no es válido.</p>';                        
                    $("#img").remove();
                    $(".delPhoto").addClass('notBlock');
                    $('#imagen').val('');
                    return false;
                }else{  
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    }
              }else{
              	alert("No selecciono foto");
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
    	$('#imagen').val('');
    	$(".delPhoto").addClass('notBlock');
    	$("#img").remove();

    });
});



