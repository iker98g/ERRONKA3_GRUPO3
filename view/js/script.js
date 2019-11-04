$( document ).ready(function() {
	var user;
	var pass;
	
	//si los datos estan vacios no se puede hacer insert
		$('input[name = "loginInput"]').on('keyup', function() {
		    let empty = false;

		    $('input[name = "loginInput"]').each(function() {
		      empty = $(this).val().length == 0;
		    });

		    if (empty)
		      $('.btnLogin').attr('disabled', 'disabled');
		    else
		      $('.btnLogin').attr('disabled', false);
		  });
	
	
	//datos del login
	$('.btnLogin').click(function(){
		
		user=$('#username').val();
		pass=$('#password').val();
		
		if(user.length==0 || pass.length==0 ){
			alert("Los campos no pueden estar vacios")
		}else{
			$.ajax({
   		       	type: "POST",
   		       	data: {'user':user,'pass':pass},
   		       	url: "controller/cUsuario.php",
   		       	success: function(pagina){  		
   		       		console.log(pagina);
   		       		
   		       		if(pagina==""){
   		       			alert("Usuario o Contraseña erroneos")
   		       		}else{
   		       			window.location.replace(pagina);
   		       		}	
   		       	},
   		       	error : function(xhr){
   		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		   		}
   		    });
		}	
	});
	
	//al hacer click en enter hace lo mismo que el boton de login
	$(document).keypress(function(event) {
	    var keycode = event.keyCode || event.which;
	    if(keycode == '13') {
	    	user=$('#username').val();
			pass=$('#password').val();
			
			if(user.length==0 || pass.length==0 ){
				alert("Los campos no pueden estar vacios")
			}else{
				$.ajax({
	   		       	type: "POST",
	   		       	data: {'user':user,'pass':pass},
	   		       	url: "controller/cUsuario.php",
	   		       	success: function(pagina){  		
	   		       		console.log(pagina);
	   		       		
	   		       		if(pagina==""){
	   		       			alert("Usuario o Contraseña erroneos")
	   		       		}else{
	   		       			window.location.replace(pagina);
	   		       		}	
	   		       	},
	   		       	error : function(xhr){
	   		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		   		}
	   		    });
			}
	    }
	});
	
	//media query
	$(window).resize(function(){
		   var width = $(window).width();
		   if(width <= 600){
		       $('.tituloWeb').removeClass('display-1').addClass('display-4');
		   }
		   else{
		       $('.tituloWeb').removeClass('display-4').addClass('display-1');
		   }
		})
		.resize();
	//muestra el modal
	$('.btnSignin').click(function(){
		$('#modalInsertUser').appendTo("body").modal('show'); 
	}); 
		
	$('.botonExecuteInsertUsers').click(function(){
		nombre=$('#nombreFormInsert').val();
		apellido=$('#apellidoFormInsert').val();
		usuario=$('#usuarioFormInsert').val();
		contrasena=$('#passwordFormInsert').val();
		admin=$('input[name="radioAdminInsert"]:checked').val();
		
		findUser(usuario);
	});
	
	//si los datos estan vacios no se puede hacer insert
	$('input[name = "insertarUsu"]').on('keyup', function() {
	    let empty = false;

	    $('input[name = "insertarUsu"]').each(function() {
	      empty = $(this).val().length == 0;
	    });

	    if (empty)
	      $('.botonExecuteInsertUsers').attr('disabled', 'disabled');
	    else
	      $('.botonExecuteInsertUsers').attr('disabled', false);
	  });
	//funcion que comprueba si el usuario ya existe al crear usu
	function findUser(usuario) {
		$.ajax({
	       	type: "POST",
	       	data:{'username':usuario},
	       	url: "controller/cComprobarUsuario.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){
	       		var usuarioExistente = JSON.parse(result);
	       		
	       		if (usuarioExistente.length == 0){
					insertUser();
				}else {
					alert("Ese usuario ya existe")
				}
	       	},
		   	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}
	//inserta el usuario a la bbdd
	function insertUser() {
		$.ajax({
	       	type: "POST",
	       	data:{'nombre':nombre, 'apellido':apellido,'usuario':usuario, 'contrasena':contrasena, 'admin':admin},
	       	url: "controller/cInsertUser.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){         		
	       		console.log(result);
	       		alert(result);
	       		location.reload(true);  //recarga la pagina
	       	},
	       	error : function(xhr) {
	   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
	   		}
	    });
	}
});