function validarCampos(){
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
		var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });
	}


}