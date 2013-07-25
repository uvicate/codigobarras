$(document).ready(function() {


	var mostrarDiv = $("div#contPadre div#contBarcode");
			//var divFormulario = document.createElement('button');
			
			$(mostrarDiv).hide("fast");
			
			$("#boton").click(function() {
				$(mostrarDiv).show("slow");

				var miObjeto = new valores();

				var jsonObj = {
					"fecha" : fecha(miObjeto.getVal())
				}

			// Lets convert our JSON object
			var postData = JSON.stringify(jsonObj);
			// Lets put our stringified json into a variable for posting
			var postArray = {
				json : postData
			};
			var enviarPeticion = {

				type : 'POST',
				url : "./php/conexionCliente.php",
				async : true,
				data : postArray,
				success : function(data) {

					console.log(postArray);

					var dataJson = JSON.parse(data);
			/* var codigo = dataJson.codigo;
			
			$.each(dataJson, function(index, objeto) {
			});
			
			var datos = data;
			*/
			var codigo = dataJson.codigo;
			console.log(codigo);
			
			$("#contBarcode").JsBarcode(codigo, {
				width : 1.5,
				height : 40

			});
			/*$("#contBarcode").JsBarcode(codigo, {
			width : 1.5,
			height : 40,
		});*/
			
		},
		error : function(obj, error, objError) {
			//avisar que ocurrió un error
		}
	};

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

}

function fecha(m) {
			//exd = new Date();
			var mes1 = m;
			var mesVig;
			
			switch(mes1) {

				case "1":
				mesVig = "10012014";

				break;
				case "2":
				mesVig = "10022014";

				break;
				case "3" :
				mesVig = "10032014";

				break;
				case "4" :
				mesVig = "10042014";

				break;
				case "5" :
				mesVig = "10052014";

				break;
				case "6" :
				mesVig = "10062014";

				break;
				case "7" :
				mesVig = "10072014";

				break;
				case "8" :
				mesVig = "10082014";

				break;
				case "9" :
				mesVig = "10092014";

				break;
				case "10" :
				mesVig = "10102014";

				break;
				case "11" :
				mesVig = "10112014";

				break;
				case "12" :
				mesVig = "10122014";

				break;
				default:
				console.log("Fecha invalida, MECO! :(");

					break;

				}
				return mesVig;
			}
			
		});
