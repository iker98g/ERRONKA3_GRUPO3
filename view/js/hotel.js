$( document ).ready(function() {
	
	//ajax habitaciones
	$.ajax({
		type:"GET",
		url:"../controller/CHabitacionesList.php",
		datatype:"json",

		success:function(result){
			alert(result);
			var habitaciones=JSON.parse(result);
			console.log(result);
			var newRow="hhhhhhhhhhhh";

		/* 	$.each(habitaciones,function(index,room){
				newRow += "<div class='col-12 col-md-6 col-lg-4'></div"
								+"<div class='card'></div>"
									+"<div class='card-body'></div>"
										+'<img src="'+room.imagen+'"</img>'
										+"<h5 class='card-title'>"+room.tipo+"</h5>"
										+"<p class='card-text'>"+room.precio+"</p>"

			}); */
			$("#habitas").append(newRow);
		},
		error : function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
	});
});