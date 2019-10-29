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
	
});