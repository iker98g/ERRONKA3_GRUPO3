$( document ).ready(function() {
	var newRow="";
	//ajax habitaciones
	$.ajax({
		type:"GET",
		url:"../controller/CHabitacionesList.php",
		datatype:"json",

		success:function(result){
			var habitaciones=JSON.parse(result);
			console.log(result);

			$.each(habitaciones,function(index,room){
				//alert("estoy en each");
				//alert(newRow);
				newRow += "<div class='col-12 col-md-6 col-lg-4'>"
								+"<div class='card'>"
									+"<div class='container'>"
										+'<img width="100%" height="200vh" src="'+room.imagen+'"</img>'
										+"<h4>"+room.tipo+"</h4>"
										+"<p>"+room.precio+"</p>"
										+"<button>"+'Reservar'+"</button>"
									+"</div>"
								+"</div>"	
							+"</div>";
 
			}); 
			$("#habitas").append(newRow);
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