$( document ).ready(function() {
	
	//Ajax de los datos de usuarios

	$.ajax({
       	type:"GET",
       	url: "controller/CUsers.php", 
    	datatype: "json",  //type of the result
       	
    	success: function(result){  
       		
       		var users = JSON.parse(result);
       		
       		console.log(result);
       		    		
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
	//Ajax de los datos de reservas

	$.ajax({
       	type:"GET",
       	url: "controller/CReservas.php", 
    	datatype: "json",  //type of the result
       	
    	success: function(result){  
       		
       		var reservas = JSON.parse(result);
       		
       		console.log(result);
       		    		
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
	//Ajax de los datos de habitaciones

	$.ajax({
       	type:"GET",
       	url: "controller/CHabitaciones.php", 
    	datatype: "json",  //type of the result
       	
    	success: function(result){  
       		
       		var habitaciones = JSON.parse(result);
       		
       		console.log(result);
       		    		
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
});