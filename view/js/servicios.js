$( document ).ready(function() {

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
	
	$('#darkModeSwitch').click(function(){

		   var css = 'html {-webkit-filter: invert(100%);' +
		    '-moz-filter: invert(100%);' + 
		    '-o-filter: invert(100%);' + 
		    '-ms-filter: invert(100%); }',

		head = document.getElementsByTagName('head')[0],
		style = document.createElement('style');

		// a hack, so you can "invert back" clicking the bookmarklet again
		if (!window.counter) { window.counter = 1;} else  { window.counter ++;
		if (window.counter % 2 == 0) { var css ='html {-webkit-filter: invert(0%); -moz-filter:    invert(0%); -o-filter: invert(0%); -ms-filter: invert(0%); }'}
		 };

		style.type = 'text/css';
		if (style.styleSheet){
		style.styleSheet.cssText = css;
		} else {
		style.appendChild(document.createTextNode(css));
		}
		
		head.appendChild(style);
	   });

});
	function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
	}