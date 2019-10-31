$( document ).ready(function() {
	
	// Ajax de los datos de usuarios

	$.ajax({
       	type:"GET",
       	url: "../controller/cUserList.php", 
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
       		
       		$('#adminNo').attr('checked', false);
       		$('#adminSi').attr('checked', false);
       		
       		  
       		$('#modalModificarUser').appendTo("body").modal('show'); 
       		if(admin==0){
       			$('#adminNo').attr('checked', true);
       		}else{
       			$('#adminSi').attr('checked', true);
       		}
       		});
       		
       		$('.botonExecuteModificarUsers').click(function(){
       			idUsuario=$('#idUsuarioForm').val();
       			nombre=$('#nombreForm').val();
       			apellido=$('#apellidoForm').val();
       			usuario=$('#usuarioForm').val();
       			admin=$('input[name="radioAdmin"]:checked').val();
       			
       			
       			$.ajax({
       		       	type: "GET",
       		       	data:{ 'idUsuario':idUsuario, 'nombre':nombre, 'apellido':apellido,'usuario':usuario, 'admin':admin},
       		       	url: "../controller/cUpdateUser.php", 
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
       	       		       	url: "../controller/cDeleteUser.php", 
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
       		
       		$('.insertUsuario').click(function(){
       			$('#modalInsertUser').appendTo("body").modal('show'); 
       		}); 
       		
       		$('.botonExecuteInsertUsers').click(function(){
       			nombre=$('#nombreFormInsert').val();
       			apellido=$('#apellidoFormInsert').val();
       			usuario=$('#usuarioFormInsert').val();
       			contrasena=$('#passwordFormInsert').val();
       			admin=$('input[name="radioAdminInsert"]:checked').val();
       			
       			findUser(usuario);
       			
       			
       		});
       		
       		//si los datos estan vacios no se puede hacer insert
       		$('input[name = "insertarUsu"]').on('keyup', function() {
       		    let empty = false;

       		    $('input[name = "insertarUsu"]').each(function() {
       		      empty = $(this).val().length == 0;
       		    });

       		    if (empty)
       		      $('.botonExecuteInsertUsers').attr('disabled', 'disabled');
       		    else
       		      $('.botonExecuteInsertUsers').attr('disabled', false);
       		  });
       		
       		function findUser(usuario) {
       			$.ajax({
       		       	type: "POST",
       		       	data:{'username':usuario},
       		       	url: "../controller/cComprobarUsuario.php", 
       		       	datatype: "json",  //type of the result
       		       	success: function(result){
       		       		var usuarioExistente = JSON.parse(result);
       		       		
       		       		if (usuarioExistente.length == 0){
       						insertUser();
       					}else {
       						alert("Ese usuario ya existe")
       					}
       		       	},
       			   	error : function(xhr) {
       					alert("An error occured: " + xhr.status + " " + xhr.statusText);
       				}
       			});
       		}
       		
       		function insertUser() {
       			$.ajax({
       		       	type: "POST",
       		       	data:{'nombre':nombre, 'apellido':apellido,'usuario':usuario, 'contrasena':contrasena, 'admin':admin},
       		       	url: "../controller/cInsertUser.php", 
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
       		}

     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
	// Ajax de los datos de reservas

	$.ajax({
       	type:"GET",
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
       									+"<td><button type='button' class='btn btn-dark botonModificarReserva m-1' value='"+reserva.idReserva+"'><i class='fas fa-edit text-light'></i></button><button type='button' class='btn btn-dark botonDeleteReserva text-light' value='"+reserva.idReserva+"'><i class='fas fa-trash-alt'></i></button></td>"
       						+"</tr>"		
       		});
       		$("#tablaReservas").append(newRow);
       		
       		var idReserva="";
       		var idHabitacion="";
       		var idUsuario="";
       		var fechaInicio="";
       		var fechaFin="";
       		var precioTotal="";
       		
       		$('.botonModificarReserva').click(function() {
       			idReserva=$(this).val();

       		  
       		$.each(reservas,function(index,reservaForm){
       			if (reservaForm.idReserva==idReserva) {
       				idHabitacion=reservaForm.idHabitacion;
       				idUsuario=reservaForm.idUsuario;
       				fechaInicio=reservaForm.fechaInicio;
       				fechaFin=reservaForm.fechaFin;
       				precioTotal=reservaForm.precioTotal;
				}     			
       		});
       		
       		$('#idReservaForm').val(idReserva);
       		$('#idHabitacionReservaForm').val(idHabitacion);
       		$('#idUsuarioReservaForm').val(idUsuario);
       		$('#fechaInicioForm').val(fechaInicio);
       		$('#fechaFinForm').val(fechaFin);
       		$('#precioTotalForm').val(precioTotal);
       		  
       		$('#modalModificarReserva').appendTo("body").modal('show'); 
       		
       		});
       		
       		$('.botonExecuteModificarReservas').click(function(){
       			idReserva=$('#idReservaForm').val();
       			idHabitacion=$('#idHabitacionReservaForm').val();
       			idUsuario=$('#idUsuarioReservaForm').val();
       			fechaInicio=$('#fechaInicioForm').val();
       			fechaFin=$('#fechaFinForm').val();
       			precioTotal=$('#precioTotalForm').val();
       			
       			
       			$.ajax({
       		       	type: "GET",
       		       	data:{ 'idReserva':idReserva, 'idHabitacion':idHabitacion, 'idUsuario':idUsuario,'fechaInicio':fechaInicio, 'fechaFin':fechaFin, 'precioTotal':precioTotal},
       		       	url: "../controller/cUpdateReserva.php", 
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
	
	// Ajax de los datos de habitaciones

	$.ajax({
       	type:"GET",
       	url: "../controller/cHabitacionesList.php", 
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
       									+"<td><button type='button' class='btn btn-dark botonModificarHabitacion m-1' value='"+room.idHabitacion+"'><i class='fas fa-edit text-light'></i></button></td>"
       						+"</tr>"		
       		});
       		$("#tablaHabitaciones").append(newRow);
       		
       		
       	  var idHabitacion="";
		  var tipo="";
		  var imagen="";
		  var precio="";

		  
  		$('.botonModificarHabitacion').click(function() {
  			idHabitacion=$(this).val();

  		  
  		$.each(habitaciones,function(index,habitacionForm){
  			if (habitacionForm.idHabitacion==idHabitacion) {
				tipo=habitacionForm.tipo;
				imagen=habitacionForm.imagen;
				precio=habitacionForm.precio;
			}     			
  		});
  		
  		$('#idHabitacionForm').val(idHabitacion);
  		$('#tipoForm').val(tipo);
  		$('#imagenForm').val(imagen);
  		$('#precioForm').val(precio);
  		  
  		$('#modalModificarHabitacion').appendTo("body").modal('show'); 
  		
  		});
  		
  		$('.botonExecuteModificarHabitaciones').click(function(){
  			idHabitacion=$('#idHabitacionForm').val();
  			tipo=$('#tipoForm').val();
  			imagen=$('#imagenForm').val();
  			precio=$('#precioForm').val();  			
   			
   			$.ajax({
   		       	type: "GET",
   		       	data:{ 'idHabitacion':idHabitacion, 'tipo':tipo, 'imagen':imagen,'precio':precio},
   		       	url: "../controller/cUpdateHabitacion.php", 
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
       		
     	},
       	error : function(xhr) {
   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
   		}
  	});
	
	
	//Cerrar sesion
		$('.cerrarSesion').click(function(){
			$.ajax({
   		       	type: "GET",
   		       	url: "../controller/cCerrarSesion.php", 
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
		
		//media query

			   var width = $(window).width();
			   if(width <= 600){
			       $('.tituloWeb').removeClass('display-3').addClass('display-5');
			   }
			   else{
			       $('.tituloWeb').removeClass('display-5').addClass('display-3');
			   }
		
   function findUser(usuario) {
		$.ajax({
	       	type: "GET",
	       	data:{'username':usuario},
	       	url: "../controller/cComprobarUsuario.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){
	       		var usuarioExistente = JSON.parse(result);
	       		
	       		if (usuarioExistente.length == 0){
					insertUser();
				}else {
					alert("Ese usuario ya existe")
				}
	       	},
		   	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}
   
   function insertUser() {
	   $.ajax({
		   	type: "GET",
		   	data:{ 'nombre':nombre, 'apellido':apellido,'usuario':usuario, 'contrasena':contrasena, 'admin':admin},
		   	url: "../controller/cInsertUser.php", 
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
	} 
});