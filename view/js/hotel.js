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
		}
	})
});