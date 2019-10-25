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
	
	//Cerrar sesion
	$('.cerrarSesion').click(function(){
		$.ajax({
		       	type: "GET",
		       	url: "../controller/CCerrarSesion.php", 
		       	datatype: "json",  //type of the result
		       	success: function(result){  
		       		
		       		alert("Sesion cerrada");
		       		window.location.replace(result); //recarga la pagina
		       	},
		       	error : function(xhr) {
		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		   		}
		       });
	});
	
});