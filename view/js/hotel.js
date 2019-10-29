$( document ).ready(function() {
	var newRow="";
	var precioHabitacion;
	//ajax habitaciones
	$.ajax({
		type:"GET",
		url:"../controller/CHabitacionesList.php",
		datatype:"json",

		success:function(result){
			
			var habitaciones=JSON.parse(result);

			$.each(habitaciones,function(index,room){
				newRow += "<div class='col-12 col-md-6 col-lg-4'>"
								+"<div class='card'>"
									+"<div class='container'>"
										+'<img width="100%" height="200vh" src="'+room.imagen+'"</img>'
										+"<h4>"+room.tipo+"</h4>"
										+"<p>"+room.precio+"</p>"
										+"<button>"+'Reservar'+"</button>"
									+"</div>"
								+"</div>"	
							+"</div>";
 
			}); 
			$("#habitas").append(newRow);
		}
	});
	
	//Cerrar sesion
	$('.cerrarSesion').click(function(){
		$.ajax({
		       	type: "GET",
		       	url: "../controller/CCerrarSesion.php", 
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
	
	$("#fechaInicio").change(function(){
		var fechaInicio=$("#fechaInicio").val();

		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var fechaActual = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

		if (fechaInicio < fechaActual && fechaInicio != "") {
			alert("Es un poco tarde para reservar ese día amigo, elige otra fecha inicial.");
			$("#fechaInicio").val("");
			$("#fechaFin").val("");
			$("#fechaFin").attr('disabled','disabled');
			$("#precioTotal").fadeOut("slow");
			$("#tipo").slideUp( "slow" );
			$("select[name=tipoHabitacion]").val("elige");
		}else if (fechaInicio == fechaActual || fechaInicio > fechaActual && fechaInicio != ""){
			$("#fechaFin").removeAttr('disabled');
			if ($('#tipo').is(':visible')) {
				calcularTotal(precioHabitacion);
			}	
		}else {
			$("#fechaFin").val("");
			$("#fechaFin").attr('disabled','disabled');
			$("#precioTotal").fadeOut("slow");
			$("#tipo").slideUp( "slow" );
			$("select[name=tipoHabitacion]").val("elige");
		}	
	});

	$("#fechaFin").change(function(){
		var fechaInicio=$("#fechaInicio").val();
		var fechaFin=$("#fechaFin").val();

		if(fechaInicio > fechaFin) {
			alert("Tal vez esa combinacion de días no sea buena idea, elige otra fecha final.");
			$("#fechaFin").val("");
			$("#precioTotal").fadeOut("slow");
			$( "#tipo" ).slideUp( "slow");
			$("select[name=tipoHabitacion]").val("elige");
		}else if (fechaInicio == fechaFin){
			alert("Reserva al menos para una noche.");
			$("#fechaFin").val("");
			$("#precioTotal").fadeOut("slow");
			$("#tipo").slideUp( "slow");
			$("select[name=tipoHabitacion]").val("elige");
		}else {
			if ($('#tipo').is(':visible')) {
				calcularTotal(precioHabitacion);
			}

		  	$.ajax({
		       	type: "GET",
		       	data:{'fechaInicio':fechaInicio, 'fechaFin':fechaFin},
		       	url: "../controller/CDisponibilidadReserva.php", 
		       	datatype: "json",  //type of the result
		       	success: function(result){  
					if(fechaInicio < fechaFin) {
						$( "#tipo" ).slideDown("slow");
						
						var habitacionesOcupadas = JSON.parse(result);
	
						console.log(habitacionesOcupadas);
	
						var countSuites = 0;
						var countEstandares = 0;
						var countSuperiores = 0;
	
						for(i=0; i<habitacionesOcupadas.length; i++) {
							if(habitacionesOcupadas[i].idHabitacion > 0 && habitacionesOcupadas[i].idHabitacion < 5) {
								countSuites++;
								if(countSuites==4) {
									$("#suite").hide();
									console.log(countSuites);
									countSuites = 0;
									console.log(countSuites);
								}
							}else if(habitacionesOcupadas[i].idHabitacion > 4 && habitacionesOcupadas[i].idHabitacion < 9) {
								countEstandares++;
								console.log(countEstandares);
								if(countEstandares==4) {
									$("#estandar").attr('disabled','disabled');
									console.log(countEstandares);
									countEstandares = 0;
									console.log(countEstandares);
								}
							}else if(habitacionesOcupadas[i].idHabitacion > 8 && habitacionesOcupadas[i].idHabitacion < 13) {
								countSuperiores++;
								console.log(countSuperiores);
								if(countSuperiores==4) {
									$("#superior").attr('disabled','disabled');
									console.log(countSuperiores);
									countSuperiores = 0;
									console.log(countSuperiores);
								}
							}
						}			
					}
	
					$("select[name=tipoHabitacion]").change(function(){
						var tipoHabitacion=$("select[name=tipoHabitacion]").val();
						
						callTipo(tipoHabitacion, habitacionesOcupadas);
					});
		       	},
		       	error : function(xhr) {
		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		   		}
		    });
		}
	});

	function callTipo(tipoHabitacion, habitacionesOcupadas) {
		$.ajax({
	       	type: "GET",
	       	data:{'tipo':tipoHabitacion},
	       	url: "../controller/CTipoHabitacion.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){ 
				var tipoHabitaciones = JSON.parse(result);
				var idHabitacion;
				
				
				console.log(tipoHabitaciones);

				if(tipoHabitacion=="suite") {
					if (tipoHabitaciones.length == 0){
						idHabitacion=1;
					}else {
						for(i=0; i<tipoHabitaciones.length; i++) {
							var libre=1;
							console.log(tipoHabitaciones[i].idHabitacion);
							for(j=0; j<habitacionesOcupadas.length; j++) {
								if(tipoHabitaciones[i].idHabitacion == habitacionesOcupadas[j].idHabitacion) {
									console.log("Habitacion " +tipoHabitaciones[i].idHabitacion + " ocupada.");
									idHabitacion=0;
									libre=0;
									console.log(idHabitacion);
								}else {
									idHabitacion=tipoHabitaciones[i].idHabitacion;
									console.log(idHabitacion);
								}
							}
							
							if(libre==1){
								precioHabitacion=tipoHabitaciones[i].precio;
								i=tipoHabitaciones.length;
							}	
						}
					}
					
					calcularTotal(precioHabitacion);
					insertReserva(idHabitacion);
				}else if(tipoHabitacion=="estandar") {
					if (tipoHabitaciones.length == 0){
						idHabitacion=1;
					}else {
						for(i=0; i<tipoHabitaciones.length; i++) {
							var libre=1;
							console.log(tipoHabitaciones[i].idHabitacion);
							for(j=0; j<habitacionesOcupadas.length; j++) {
								if(tipoHabitaciones[i].idHabitacion == habitacionesOcupadas[j].idHabitacion) {
									console.log("Habitacion " +tipoHabitaciones[i].idHabitacion + " ocupada.");
									idHabitacion=0;
									libre=0;
									console.log(idHabitacion);
								}else {
									idHabitacion=tipoHabitaciones[i].idHabitacion;
									console.log(idHabitacion);
								}
							}
							
							if(libre==1){
								precioHabitacion=tipoHabitaciones[i].precio;
								i=tipoHabitaciones.length;
							}
						}
					}
					
					calcularTotal(precioHabitacion);
					insertReserva(idHabitacion);
				}else if(tipoHabitacion=="superior") {
					if (tipoHabitaciones.length == 0){
						idHabitacion=1;
					}else {
						for(i=0; i<tipoHabitaciones.length; i++) {
							var libre=1;
							console.log(tipoHabitaciones[i].idHabitacion);
							for(j=0; j<habitacionesOcupadas.length; j++) {
								if(tipoHabitaciones[i].idHabitacion == habitacionesOcupadas[j].idHabitacion) {
									console.log("Habitacion " +tipoHabitaciones[i].idHabitacion + " ocupada.");
									idHabitacion=0;
									libre=0;
									console.log(idHabitacion);
								}else {
									idHabitacion=tipoHabitaciones[i].idHabitacion;
									console.log(idHabitacion);
								}
							}
							
							if(libre==1){
								precioHabitacion=tipoHabitaciones[i].precio;
								i=tipoHabitaciones.length;
							}
						}
					}
					
					calcularTotal(precioHabitacion);
					insertReserva(idHabitacion);
				}
	       	},
		   	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}

	function insertReserva(idHabitacion) {
		$("#reserva").click(function(){
			var tipoHabitacion=$("select[name=tipoHabitacion]").val();
			var idUsuario=$("#dropdownMenuButton").html();
			var fechaInicio=$("#fechaInicio").val();
			var fechaFin=$("#fechaFin").val();
			var precioTotal=$("#precioTotal").val();
			
			$.ajax({
				type: "GET",
				data:{'idHabitacion':idHabitacion, 'idUsuario':idUsuario, 'fechaInicio':fechaInicio, 
				'fechaFin':fechaFin, 'precioTotal':precioTotal},
				url: "../controller/CNewReserva.php", 
				datatype: "json",  //type of the result
				success: function(){  
					alert("Reserva realizada correctamente");
				},
				error : function(xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}
			});	
		});
	}

	function calcularTotal(precioHabitacion) {
		var fechaInicio=$("#fechaInicio").val();
		var fechaFin=$("#fechaFin").val();
		var totalMilisegundos = Date.parse(fechaFin) - Date.parse(fechaInicio);
		var totalDias= totalMilisegundos / 1000 / 60 / 60 / 24;
		precioTotal=parseInt(precioHabitacion)*parseInt(totalDias);
		$('#precioTotal').val(precioTotal);
		$("#precioTotal").fadeIn("slow");
	}	
});