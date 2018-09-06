

/*======  Documento Javascript Principal  ======*/


/*======  Ruta del Servidor  ======*/


var servidor = $("#servidor").val();

/*======  Validar el Formulario de Ingreso al Sistema  ======*/


function ValidarIngreso()
{

	$(".alert").remove();

	var email = $("#email").val();
	var password = $("#password").val();

	if(email != "")
	{

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email))
		{

			$(".container").after("<div class = 'alert alert-danger col-md-2 col-md-offset-5'>El campo de email no es valido</div>");

			return false;

		}

	}

	if(password != "")
	{

		var expresion = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\\,\\.\\ ]*$/;

		if(!expresion.test(password))
		{

			$(".container").after("<div class = 'alert alert-danger col-md-2 col-md-offset-5'>La contraseña no debe contener caracteres extraños como <>!-+*(){}</div>");

			return false;

		}

	}

	return true;

}

