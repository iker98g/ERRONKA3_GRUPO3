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

				newRow += "<div class='col-12 col-md-6 col-lg-4'>"
								+"<div class='card'>"
									+"<div class='card-body'>"
										+"<img src='"+room.imagen+"'</img>"
										+"<h5 class='card-title'>"+room.tipo+"</h5>"
										+"<p class='card-text'>"+room.precio+"</p>"
									+"</div>"
								+"</div>"	
							+"</div>";
 
			}); 
		},
	})
	$("#habitas").append(newRow);
});