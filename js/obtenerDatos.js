$(document).ready(function() {

	var mostrarDiv = $("div#contPadre div#contBarcode");

	$(mostrarDiv).hide("fast");

	$("#boton").click(function() {
		$(mostrarDiv).show("slow");

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

		}

		var miObjeto = new valores();

		fecha(miObjeto.getVal());
		$.ajax(enviarPeticion);
	});

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
				console.log(mesVig);
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
				console.log("Fecha invalida, MECO!");
				break;

		}
		return mesVig;
	}

	// fecha(val);
	var n = new fecha();
	var jsonObj = {

		"fecha" : n
	}

	// Lets convert our JSON object
	var postData = JSON.stringify(jsonObj);

	// Lets put our stringified json into a variable for posting
	var postArray = {
		json : postData
	};

	var enviarPeticion = {

		type : 'POST',
		url : "./php/conexionCliente.class.php",
		data : postArray,
		success : function(data) {
			console.log(jsonObj);
		}
	};
	
	/*
	 $.ajax(enviarPeticion);

	 var consultar = {
	 type : "POST",
	 url : "./php/consulta.php",
	 async : true,
	 success : function(datos) {
	 var dataJson = eval(datos);

	 $.each(dataJson, function(index, objeto) {
	 concatenacion = objeto.idUsuario + objeto.idCliente + objeto.idClienteUsuario;

	 //if(objeto.idCliente === )
	 });

	 $("#contBarcode").JsBarcode(concatenacion, {
	 width : 1.5,
	 height : 40,
	 });

	 //<input type="button" value="Agregar Producto" class="button" data-type="zoomin" />

	 },
	 error : function(obj, error, objError) {
	 //avisar que ocurrió un error
	 }
	 };
	 $.ajax(consultar);

	 var enviarPhp = {
	 type : 'POST',
	 url : "./php/conexionCliente.class.php",
	 data : postArray,
	 success : function(data) {

	 },
	 error : function(obj, error, objError) {
	 //avisar que ocurrió un error
	 }
	 };
	 */
});
