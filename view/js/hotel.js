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
										+"<img src='"+room.imagen+"'</img>"
										+"<h4><b>"+room.tipo+"<b></h4>"
										+"<p>"+room.precio+"</p>"
									+"</div>"
								+"</div>"	
							+"</div>";
 
			}); 
			$("#habitas").append(newRow);
		}
	})
	
});