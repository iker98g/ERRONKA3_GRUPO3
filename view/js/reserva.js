$( document ).ready(function() {
	
	// Ajax de los datos de reservas
	
	var userId=$("#nombreUsuario").data("id");;
	

	$.ajax({
       	type:"GET",
       	data:{ 'userId':userId},
       	url: "../controller/cReservasAdmin.php", 
    	datatype: "json",  // type of the result
       	
    	success: function(result){  
       		
       		var reservas = JSON.parse(result);
       		
       		console.log(result);
       		    		
       		var newRow="";
       		
       		$.each(reservas,function(index,reserva){
       			newRow += "<tr>" + "<td>"+reserva.idReserva+"</td>"
       									+"<td>"+reserva.objectHabitacion.tipo+"</td>"
       									+"<td>"+reserva.objectUsuario.usuario+"</td>"
       									+"<td>"+reserva.fechaInicio+"</td>"
       									+"<td>"+reserva.fechaFin+"</td>"
       									+"<td>"+reserva.precioTotal+"</td>"
       									+"<td><button type='button' class='btn btn-dark botonDeleteReserva text-light' value='"+reserva.idReserva+"'><i class='fas fa-trash-alt'></i></button></td>"
       						+"</tr>"		
       		});
       		$("#tablaReservas").append(newRow);
       		
    
       		//recoge la id y la manda al controlador que ejecuta un delete
       		$('.botonDeleteReserva').click(function(){
       			idReserva=$(this).val();
       			
       			var r = confirm("Estas seguro de que quieres borrar esta reserva?");
       				if (r == true) {
       					$.ajax({
       	       		       	type: "GET",
       	       		       	data:{ 'idReserva':idReserva},
       	       		       	url: "../controller/cDeleteReserva.php", 
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
       				} else {
       					alert("Operacion cancelada")
       				}
       			
       		});
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
	
	
	
	
	
	
	
});