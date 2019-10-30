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
   		       	type: "GET",
   		       	data: {'user':user,'pass':pass},
   		       	url: "controller/CUsuario.php",
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
		
		function findUser(usuario) {
			$.ajax({
		       	type: "GET",
		       	data:{'username':usuario},
		       	url: "controller/CComprobarUsuario.php", 
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
		
		function insertUser() {
			$.ajax({
		       	type: "GET",
		       	data:{'nombre':nombre, 'apellido':apellido,'usuario':usuario, 'contrasena':contrasena, 'admin':admin},
		       	url: "controller/CInsertUser.php", 
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