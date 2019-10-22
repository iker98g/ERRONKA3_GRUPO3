$( document ).ready(function() {
	
	// Ajax de los datos de usuarios

	$.ajax({
       	type:"GET",
       	url: "../controller/CUserList.php", 
    	datatype: "json",  // type of the result
       	
    	success: function(result){  
       		
       		var users = JSON.parse(result);
       		
       		console.log(result);
       		
       		var newRow="";
       		
       		$.each(users,function(index,user){
       			
       			var adminBoolean=""
       				if (user.admin==0) {
       					adminBoolean="No";
					} else {
						adminBoolean="Si";
					}
       			
       			newRow += "<tr>" + "<td>"+user.idUsuario+"</td>"
       									+"<td>"+user.nombre+"</td>"
       									+"<td>"+user.apellido+"</td>"
       									+"<td>"+user.usuario+"</td>"
       									+"<td>"+adminBoolean+"</td>"
       									+"<td><button type='button' class='btn btn-dark botonModificarUser m-1' value='"+user.idUsuario+"'><i class='fas fa-edit text-light'></i></button><button type='button' class='btn btn-dark botonDeleteUser text-light' value='"+user.idUsuario+"'><i class='fas fa-trash-alt'></i></button></td>"
       						+"</tr>"		
       		});
       		$("#tablaUsers").append(newRow);
       		
       		  var idUsuario="";
     		  var nombre="";
     		  var apellido="";
     		  var usuario="";
     		  var admin="";
     		  
       		$('.botonModificarUser').click(function() {
       			idUsuario=$(this).val();

       		  
       		$.each(users,function(index,userForm){
       			if (userForm.idUsuario==idUsuario) {
					nombre=userForm.nombre;
					apellido=userForm.apellido;
					usuario=userForm.usuario;
					admin=userForm.admin;
				}     			
       		});
       		
       		$('#idUsuarioForm').val(idUsuario);
       		$('#nombreForm').val(nombre);
       		$('#apellidoForm').val(apellido);
       		$('#usuarioForm').val(usuario);
       		$('#adminForm').val(admin);
       		  
       		$('#modalModificarUser').modal('show'); 
       		
       		});
       		
       		$('.botonExecuteModificarUsers').click(function(){
       			idUsuario=$('#idUsuarioForm').val();
       			nombre=$('#nombreForm').val();
       			apellido=$('#apellidoForm').val();
       			usuario=$('#usuarioForm').val();
       			admin=$('#adminForm').val();
       			
       			
       			$.ajax({
       		       	type: "GET",
       		       	data:{ 'idUsuario':idUsuario, 'nombre':nombre, 'apellido':apellido,'usuario':usuario, 'admin':admin},
       		       	url: "../controller/CUpdateUser.php", 
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
       		});
       		
       		$('.botonDeleteUser').click(function(){
       			idUsuario=$(this).val();
       			
       			var r = confirm("Estas seguro de que quieres borrar este usuario?");
       				if (r == true) {
       					$.ajax({
       	       		       	type: "GET",
       	       		       	data:{ 'idUsuario':idUsuario},
       	       		       	url: "../controller/CDeleteUser.php", 
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
	
	// Ajax de los datos de reservas

	$.ajax({
       	type:"GET",
       	url: "../controller/CReservas.php", 
    	datatype: "json",  // type of the result
       	
    	success: function(result){  
       		
       		var reservas = JSON.parse(result);
       		
       		console.log(result);
       		    		
       		var newRow="";
       		
       		$.each(reservas,function(index,reserva){
       			newRow += "<tr>" + "<td>"+reserva.idReserva+"</td>"
       									+"<td>"+reserva.idHabitacion+"</td>"
       									+"<td>"+reserva.idUsuario+"</td>"
       									+"<td>"+reserva.fechaInicio+"</td>"
       									+"<td>"+reserva.fechaFin+"</td>"
       									+"<td>"+reserva.precioTotal+"</td>"
       									+"<td><button type='button' class='btn btn-dark botonModificarReserva m-1'><i class='fas fa-edit text-light'></i></button><button type='button' class='btn btn-dark botonDeleteReserva text-light'><i class='fas fa-trash-alt'></i></button></td>"
       						+"</tr>"		
       		});
       		$("#tablaReservas").append(newRow);
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
	// Ajax de los datos de habitaciones

	$.ajax({
       	type:"GET",
       	url: "../controller/CHabitaciones.php", 
    	datatype: "json",  // type of the result
       	
    	success: function(result){  
       		
       		var habitaciones = JSON.parse(result);
       		
       		console.log(result);
       		    		
       		var newRow="";
       		
       		$.each(habitaciones,function(index,room){
       			newRow += "<tr>" + "<td>"+room.idHabitacion+"</td>"
       									+"<td>"+room.tipo+"</td>"
       									+'<td><img width="150vh" src="'+room.imagen+'"</td>'
       									+"<td>"+room.precio+"</td>"
       									+"<td><button type='button' class='btn btn-dark botonModificarHabitacion m-1'><i class='fas fa-edit text-light'></i></button></td>"
       						+"</tr>"		
       		});
       		$("#tablaHabitaciones").append(newRow);
       		
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
});