$( document ).ready(function() {
	var newRow="";
	var precioHabitacion;
	var idHabitacion;
	var fechaInicio;
	var fechaFin;
	var habitacionesOcupadas;
	
	//ajax habitaciones
	$.ajax({
		type:"POST",
		url:"../controller/cHabitacionesList.php",
		datatype:"json",

		success:function(result){
			
			var habitaciones=JSON.parse(result);

			$.each(habitaciones,function(index,room){
				newRow += "<div class='col-12 col-md-6 col-lg-4'>"
								+"<div class='card'>"
									+"<div class='container'>"
										+'<img class="imgHabitaciones rounded" width="100%"; height="200vh"; src="'+room.imagen+'"</img>'
										+"<h4>"+room.tipo+"</h4>"
										+"<p>"+room.precio+"</p>"
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
		       	type: "POST",
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
	
	$(".labelPrecio").hide();
	
	$("#fechaInicio").change(function(){
		idHabitacion="";

		fechaInicio=$("#fechaInicio").val();

		if ($('#precioTotal').is(':visible')) {
			$("#precioTotal").fadeOut("slow");
			$(".labelPrecio").fadeOut("slow");
		}
		
		$("select[name=tipoHabitacion]").val("elige");
		var elige = $("select[name=tipoHabitacion]").val();

		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();
		var fechaActual = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

		if (fechaInicio < fechaActual && fechaInicio != "") {
			alert("Es un poco tarde para reservar ese día amigo, elige otra fecha inicial.");
			$("#fechaInicio").val("");
			$("#fechaFin").val("");
			$("#fechaFin").attr('disabled','disabled');
			$("#reserva").attr('disabled','disabled');
			$("#precioTotal").fadeOut("slow");
			$(".labelPrecio").fadeOut("slow");
			$("#tipo").slideUp( "slow" );
			$("select[name=tipoHabitacion]").val("elige");
		}else if (fechaInicio == fechaActual || fechaInicio > fechaActual && fechaInicio != ""){
			$("#fechaFin").removeAttr('disabled');
			if ($('#tipo').is(':visible')  && elige != "elige") {
				calcularTotal(precioHabitacion);
			}	
		}else {
			$("#fechaFin").val("");
			$("#fechaFin").attr('disabled','disabled');
			$("#reserva").attr('disabled','disabled');
			$("#precioTotal").fadeOut("slow");
			$(".labelPrecio").fadeOut("slow");
			$("#tipo").slideUp( "slow" );
			$("select[name=tipoHabitacion]").val("elige");
		}	
	});

	$("#fechaFin").change(function(){
		idHabitacion="";
		
		fechaInicio=$("#fechaInicio").val();
		fechaFin=$("#fechaFin").val();

		if ($('#precioTotal').is(':visible')) {
			$("#precioTotal").fadeOut("slow");
			$(".labelPrecio").fadeOut("slow");
		}

		$("select[name=tipoHabitacion]").val("elige");
		var elige = $("select[name=tipoHabitacion]").val();

		if(fechaInicio > fechaFin) {
			alert("Tal vez esa combinacion de días no sea buena idea, elige otra fecha final.");
			$("#fechaFin").val("");
			$("#precioTotal").fadeOut("slow");
			$(".labelPrecio").fadeOut("slow");
			$( "#tipo" ).slideUp( "slow");
			$("select[name=tipoHabitacion]").val("elige");
		}else if (fechaInicio == fechaFin){
			alert("Reserva al menos para una noche.");
			$("#fechaFin").val("");
			$("#precioTotal").fadeOut("slow");
			$(".labelPrecio").fadeOut("slow");
			$("#tipo").slideUp( "slow");
			$("select[name=tipoHabitacion]").val("elige");
		}else if (fechaInicio < fechaFin){
			if ($('#tipo').is(':visible') && elige != "elige") {
				calcularTotal(precioHabitacion);
			}

		disponibilidadReserva(fechaInicio, fechaFin); 	
		}
	});

	$("#reserva").click(function(){
		var idUsuario=$("#nombreUsuario").data("id");
		var precioTotal=$("#precioTotal").val();

		fechaInicio="";
		fechaFin="";
		fechaInicio=$("#fechaInicio").val();
		fechaFin=$("#fechaFin").val();
		
		$.ajax({
			type: "POST",
			data:{'idHabitacion':idHabitacion, 'idUsuario':idUsuario, 'fechaInicio':fechaInicio, 
			'fechaFin':fechaFin, 'precioTotal':precioTotal},
			url: "../controller/cNewReserva.php", 
			datatype: "json",  //type of the result
			success: function(){  
				alert("Reserva realizada correctamente");
			},
			error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	});

	function disponibilidadReserva(fechaInicio, fechaFin) {
		$.ajax({
			type: "POST",
			data:{'fechaInicio':fechaInicio, 'fechaFin':fechaFin},
			url: "../controller/cDisponibilidadReserva.php", 
			datatype: "json",  //type of the result
			success: function(result){  
				if(fechaInicio < fechaFin) {
					$( "#tipo" ).slideDown("slow");
					
					habitacionesOcupadas = JSON.parse(result);

					var countSuites = 0;
					var countEstandares = 0;
					var countSuperiores = 0;

					for(i=0; i<habitacionesOcupadas.length; i++) {
						if(habitacionesOcupadas[i].idHabitacion > 0 && habitacionesOcupadas[i].idHabitacion < 5) {
							countSuites++;
							if(countSuites==4) {
								$("#suite").hide();
								countSuites = 0;
							}
						}else if(habitacionesOcupadas[i].idHabitacion > 4 && habitacionesOcupadas[i].idHabitacion < 9) {
							countEstandares++;
							if(countEstandares==4) {
								$("#estandar").hide();
								countEstandares = 0;
							}
						}else if(habitacionesOcupadas[i].idHabitacion > 8 && habitacionesOcupadas[i].idHabitacion < 13) {
							countSuperiores++;
							if(countSuperiores==4) {
								$("#superior").hide();
								countSuperiores = 0;
							}
						}
					}			
				}

				$("select[name=tipoHabitacion]").change(function(){
					var tipoHabitacion="";
					tipoHabitacion=$("select[name=tipoHabitacion]").val();
					
					callTipo(tipoHabitacion, habitacionesOcupadas);
				});
			},
			error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
	 	});
	}

	function callTipo(tipoHabitacion, habitacionesOcupadas) {
		$.ajax({
	       	type: "POST",
	       	data:{'tipo':tipoHabitacion},
	       	url: "../controller/cTipoHabitacion.php", 
	       	datatype: "json",  //type of the result
	       	success: function(result){ 
				var tipoHabitaciones = JSON.parse(result);
				var libre;

					if(tipoHabitacion=="suite") {
						if (habitacionesOcupadas.length == 0){
							idHabitacion=1;
							precioHabitacion=tipoHabitaciones[0].precio;
						}else {
							for(i=0; i<tipoHabitaciones.length; i++) {
								libre=1;
								for(j=0; j<habitacionesOcupadas.length; j++) {
									if(tipoHabitaciones[i].idHabitacion == habitacionesOcupadas[j].idHabitacion) {
										idHabitacion=0;
										libre=0;
									}else {
										idHabitacion=tipoHabitaciones[i].idHabitacion;
									}
								}
								
								if(libre==1){
									precioHabitacion=tipoHabitaciones[i].precio;
									i=tipoHabitaciones.length;
								}	
							}
						}

						calcularTotal(precioHabitacion);
						
					}else if(tipoHabitacion=="estandar") {
						if (habitacionesOcupadas.length == 0){
							idHabitacion=5;
							precioHabitacion=tipoHabitaciones[0].precio;
						}else {
							for(i=0; i<tipoHabitaciones.length; i++) {
								libre=1;
								for(j=0; j<habitacionesOcupadas.length; j++) {
									if(tipoHabitaciones[i].idHabitacion == habitacionesOcupadas[j].idHabitacion) {
										idHabitacion=0;
										libre=0;
									}else {
										idHabitacion=tipoHabitaciones[i].idHabitacion;
									}
								}
								
								if(libre==1){
									precioHabitacion=tipoHabitaciones[i].precio;
									i=tipoHabitaciones.length;
								}
							}
						}

						calcularTotal(precioHabitacion);

					}else if(tipoHabitacion=="superior") {
						if (habitacionesOcupadas.length == 0){
							idHabitacion=9;
							precioHabitacion=tipoHabitaciones[0].precio;
						}else {
							for(i=0; i<tipoHabitaciones.length; i++) {
								libre=1;
								for(j=0; j<habitacionesOcupadas.length; j++) {
									if(tipoHabitaciones[i].idHabitacion == habitacionesOcupadas[j].idHabitacion) {
										idHabitacion=0;
										libre=0;
									}else {
										idHabitacion=tipoHabitaciones[i].idHabitacion;
									}
								}
								
								if(libre==1){
									precioHabitacion=tipoHabitaciones[i].precio;
									i=tipoHabitaciones.length;
								}
							}
						}

						calcularTotal(precioHabitacion);
					}	
	       	},
		   	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		});
	}

	function calcularTotal(precioHabitacion) {
		fechaInicio=$("#fechaInicio").val();
		fechaFin=$("#fechaFin").val();
		var totalMilisegundos = Date.parse(fechaFin) - Date.parse(fechaInicio);
		var totalDias= totalMilisegundos / 1000 / 60 / 60 / 24;
		precioTotal=parseInt(precioHabitacion)*parseInt(totalDias);
		$('#precioTotal').val(precioTotal);
		$("#precioTotal").fadeIn("slow");
		$(".labelPrecio").fadeIn("slow");
		$("#reserva").removeAttr('disabled');
	}		
});