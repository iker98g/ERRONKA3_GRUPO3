$( document ).ready(function() {
	
	//ajax habitaciones
	$.ajax({
		type:"GET",
		url:"../controller/CHabitacionesList.php",
		datatype:"json",

		success:function(result){
			alert(result);
			//var habitaciones=JSON.parse(result);
			alert("hola");
			console.log(result);
			alert("hola2")
			var newRow="";
			alert("hola3");

			$.each(habitaciones,function(index,room){
				/* newRow += "<div class='col-12 col-md-6 col-lg-4'>"
								+"<div class='card'></div>"
									+"<div class='card-body'></div>"
										+"<img src='"+room.imagen+"'</img>"
										+"<h5 class='card-title'>"+room.tipo+"</h5>"
										+"<p class='card-text'>"+room.precio+"</p>";
 */
				newRow+="<div class='col-12 col-md-6 col-lg-4'>
				<div class='card'>
					<div class='card-body'>
						<img src='img/estandar1.jpg' class='card-img-top' alt='...'>
						<h5 class='card-title'>Estandar</h5>
						<p class='card-text'>65€</p>
						<a href='#' class='btn btn-primary'>Reservar</a>
					</div>
				</div>
			</div>"
			}); 
			alert(newRow);
			$("#habitas").append(newRow);
		},
	});
});