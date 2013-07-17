$(document).ready(function() {

	var mostrarDiv = $("div#contPadre div#contBarcode");

	$(mostrarDiv).hide("fast");

	$("#boton").click(function() {
		$(mostrarDiv).show("slow");

		var miObjeto = new valores();

		fecha(miObjeto.getVal());
		$.ajax(enviarPeticion);
	});

	function valores() {

		var val = $("#vaginaSucia").val();

		this.setVal = setVal;
		this.getVal = getVal;

		function getVal() {
			return val;
		}

		function setVal(nVal) {
			val = nVal;
		}

<<<<<<< HEAD
		fecha(miObjeto.getVal());
		//$.ajax(enviarPeticion); 
	});
=======
	}
>>>>>>> 07aab6de8eaeae039cc6e6ee846feb25886a7a74

	function fecha(m) {
		//exd = new Date();
		var mes1 = m;
		var mesVig;

		switch(mes1) {

			case "1":
				mesVig = "10012014";
				console.log(mesVig);
				break;
			case "2":
				mesVig = "10022014";
				console.log(mesVig);
				break;
			case "3" :
				mesVig = "10032014";
				console.log(mesVig);
				break;
			case "4" :
				mesVig = "10042014";
				console.log(mesVig);
				break;
			case "5" :
				mesVig = "10052014";
				
				break;
			case "6" :
				mesVig = "10062014";
				console.log(mesVig);
				break;
			case "7" :
				mesVig = "10072014";
				console.log(mesVig);
				break;
			case "8" :
				mesVig = "10082014";
				console.log(mesVig);
				break;
			case "9" :
				mesVig = "10092014";
				console.log(mesVig);
				break;
			case "10" :
				mesVig = "10102014";
				console.log(mesVig);
				break;
			case "11" :
				mesVig = "10112014";
				console.log(mesVig);
				break;
			case "12" :
				mesVig = "10122014";
				console.log(mesVig);
				break;
			default:
				console.log("Fecha invalida, MECO! :(");

				break;

		}
		return mesVig;
	}

	var enviarPeticion = {

		type : 'POST',
		url : "./php/conexionCliente.php",
		async : true,
		data : 
			 {'fecha':'1023231'}
		,
		success : function(data) {

			var datos = data;
			console.log(datos);
			console.log('que pedo');
			$("#contBarcode").JsBarcode(datos, {
				width : 1.5,
				height : 40,
			});
		},
		error : function(obj, error, objError) {
			//avisar que ocurrió un error
		}
	};

});
