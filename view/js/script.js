$( document ).ready(function() {
	var user;
	var pass;
	
	//datos del login
	$('.btnLogin').click(function(){
		
		user=$('#username').val();
		pass=$('#password').val();
		
		if(user.length==0 || pass.length==0 ){
			alert("Los campos no pueden estar vacios")
		}else{
			$.ajax({
   		       	type: "GET",
   		       	data:{ 'user':user, 'pass':pass},
   		       	url: "../controller/CLogin.php", 
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
	
	
	
});