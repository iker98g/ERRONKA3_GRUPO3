$( document ).ready(function() {
	
	$.ajax({
		type:"GET",
		url: "../controller/CHabitaciones.php", 
	 	datatype: "json",  // type of the result
		
	 	success: function(result){  
			
			var habitaciones = JSON.parse(result);
			
			console.log(result);
						
			var newRow="";
			
			$.each(habitaciones,function(index,room){
				newRow += '<img src="'+room.imagen+'" class="card-img-top" alt="..."></img>'
							+"<h5>"+room.tipo+" class='card-title'</h5>"
							+"<p>"+room.precio+" class='card-text'</h5>"
							+"<button type='button' class='btn btn-primary></button>"
			});
			$(".card-body").append(newRow);
			
	  },
		error : function(xhr) {
			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		}
   });
});