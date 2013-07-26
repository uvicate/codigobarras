(function ($) {
	$.fn.JsBarcode = function (content, options) {

		//Merge the user options with the default
		options = $.extend({}, $.fn.JsBarcode.defaults, options);

		//Create the canvas where the barcode will be drawn on
		var canvas = document.createElement('canvas');
		



		//Abort if the browser does not support HTML5canvas
		if (!canvas.getContext) {
			return this;
		}

		var encoder = new window[options.format](content);

		//Abort if the barcode format does not support the content
		if (!encoder.valid()) {
			return this;
		}

		//Encode the content
		var binary = encoder.encoded();

		//Get the canvas context
		var ctx = canvas.getContext("2d");

		//Set the width and height of the barcode
		canvas.width = binary.length * options.width + 2 * options.quite;
		canvas.height = options.height;

		//Paint the canvas white
		ctx.fillStyle = "#fff";
		ctx.fillRect(0, 0, canvas.width, canvas.height);

		//Creates the barcode out of the encoded binary
		for (var i = 0; i < binary.length; i++) {

			var x = i * options.width + options.quite;

			if (binary[i] == "1") {
				ctx.fillStyle = "#000";
			} else {
				ctx.fillStyle = "#fff";
			}

			ctx.fillRect(x, 0, options.width, options.height);
		}

		//Grab the dataUri from the canvas
		uri = canvas.toDataURL('image/png');

		//Put the data uri into the image
		
		//Modificaciones Jose Mussa
		this.html("");
		
		var imagen = document.createElement('img');
		this.prepend(imagen);
		this.css("width", canvas.width + 30);
		console.log(canvas.width + 30);
		var footer = document.createElement('p');
		var textoFooter = document.createTextNode(content);
		footer.appendChild(textoFooter);
		this.append(footer);
		this.find("p").css("text-align", "center");
		//Cierro opciones de DOM nuevas
		
		
		return $(this).find("img").attr("src", uri);
		
		//Cierro Modificaciones mussa

	};

	$.fn.JsBarcode.defaults = {
		width: 2,
		height: 100,
		quite: 10,
		format: "CODE128"
	};

})(jQuery);