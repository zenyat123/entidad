

/*======  Validar Formulario de Trámite  ======*/


function ValidarTramite()
{

	var radicado = $("#radicado").val();

	if(radicado != "")
	{

		var expresion = /^[0-9]*$/;

		if(!expresion.test(radicado))
		{

			$(".container").after("<div class = 'alert alert-danger col-md-2 col-md-offset-5'>El campo radicado debe ser númerico</div>");

			return false;

		}

	}

	return true;

}

/*======  Reconocer Trámite Repetido  ======*/


var reconocerTramiteRepetido = false;


$("#radicado").change(function()
{

	var radicado = $("#radicado").val();

	var datos = new FormData();

	datos.append("verificarRadicado", radicado);

	$.ajax
	({

		url: servidor + "/ajax/tramites_ajax.php",
		method: "post",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta)
		{

			if(respuesta == "false")
			{

				$(".alert").remove();

				reconocerTramiteRepetido = false;					

			}
			else
			{				

				$(".container").after("<div class = 'alert alert-danger col-md-2 col-md-offset-5'>El número de radicado ya esta registrado, por favor digite uno nuevo</div>");	

				reconocerTramiteRepetido = true;

			}

		}

	})

})

/*======  Botón Registrar Trámite  ======*/


$("#botonRegistrar").click(function()
{


	var radicado = $("#radicado").val();
	var titulo = $("#titulo").val();
	var idTema = $("#tema").val();
	var fecha = $("#fecha_tramite").val();

	var datos = new FormData();

	datos.append("radicado", radicado);
	datos.append("titulo", titulo);
	datos.append("idTema", idTema);
	datos.append("fechaTramite", fecha);

	$.ajax
	({

		url: servidor + "/ajax/tramites_ajax.php",
		method: "post",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(){}

	})

})

/*======  Cargar la Tabla Dinámica de Trámites para Empleado  ======*/


$(".tablaTramitesEmpleado").DataTable
({

	"ajax": servidor + "/ajax/tabla_empleados_ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language":
	{

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

})

/*======  Cargar la Tabla Dinámica de Trámites para Persona  ======*/


$(".tablaTramites").DataTable
({

	"ajax": servidor + "/ajax/tabla_personas_ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language":
	{

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

})

/*======  Actualizar Trámite  ======*/


$(".tablaTramites tbody").on("click", ".botonEditarTramite", function()
{

	//  Consultar Trámite  

	var radicado = $(this).attr("radicado");

	var datos = new FormData();

	datos.append("radicado", radicado);

	$.ajax
	({

		url: servidor + "/ajax/tramites_ajax.php",
		method: "post",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta)
		{

			$("#modalEditarTramite .editarRadicado").val(respuesta[0]["radicado"]);
			$("#modalEditarTramite .editarTitulo").val(respuesta[0]["titulo"]);

			/*======  Actualizar Trámite  ======*/


			$(".botonGuardarTramite").click(function()
			{

				var radicado = $("#modalEditarTramite .editarRadicado").val();
				var titulo = $("#modalEditarTramite .editarTitulo").val();

				datos = new FormData();

				datos.append("editarRadicado", radicado);
				datos.append("titulo", titulo);

				$.ajax
				({

 					url: servidor + "/ajax/tramites_ajax.php",
 					method: "post",
 					data: datos,
 					cache: false,
 					contentType: false,
 					processData: false,
 					success: function(respuesta)
 					{

 						if(respuesta == "Actualizado")
						{

							swal
							({

								title: "Trámite Actualizado",
								text: "¡Actualizado Correctamente!",
								type: "success",
								confirmButtonText: "¡Bien!",
								confirmButtonColor: "#316599"
							  
							},

							function(isConfirm)
							{

								if(isConfirm)
								{

									window.location = "panel-persona";

								}

							});

						}

 					}

				})

			})

		}

	})

})

/*======  Cambiar Estado de Trámite  ======*/


$(".tablaTramitesEmpleado tbody").on("click", ".botonEstado", function()
{

	var radicado = $(this).attr("radicado");
	var cambioEstado = $(this).attr("cambioEstado");

	if(cambioEstado == "Tramitado")
	{

		$(this).addClass("btn-success");
		$(this).removeClass("btn-warning");
		$(this).html("Tramitado");
		$(this).attr("cambioEstado", "Recibido");

	}
	else
	{

		$(this).removeClass("btn-success");
		$(this).addClass("btn-warning");
		$(this).html("Recibido");
		$(this).attr("cambioEstado", "Tramitado");

	}

	var datos = new FormData();

	datos.append("activarRadicado", radicado);
	datos.append("cambiarEstado", cambioEstado);

	$.ajax
	({

 		url: servidor + "/ajax/tramites_ajax.php",
 		method: "post",
 		data: datos,
 		cache: false,
 		contentType: false,
 		processData: false,
 		success: function(){}

	})

})

/*======  Eliminar Trámite  ======*/


$(".tablaTramites tbody").on("click", ".botonEliminarTramite", function()
{

	//  Consultar Trámite  

	var radicado = $(this).attr("radicado");
	var titulo = $(this).attr("titulo");

	swal
	({

		title: "¿Está seguro de eliminar el Trámite " + titulo + "?",
		text: "Si no lo está puede cancelar la acción",
		type: "warning",
		confirmButtonText: "Eliminar",
		confirmButtonColor: "#DD6B55",
		showCancelButton: true,
		cancelButtonText: "Cancelar"
	  
	},

	function(isConfirm)
	{

		if(isConfirm)
		{

			window.location = "index.php?ruta=panel-persona&radicado="+radicado;

		}

	}); 			 

})

