$(obtener_RRHH());

function obtener_RRHH(RRHH)
{
	$.ajax({
		url : 'arch-ajax/RRHHAjax.php',
		type : 'POST',
		dataType : 'html',
		data : { RRHH: RRHH },
		})

	.done(function(resultado){
		$("#tabla_resultadoRRHH").html(resultado);
	})
}

$(document).on('keyup', '#busquedaRRHH', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_RRHH(valorBusqueda);
	}
	else
		{
			obtener_RRHH();
		}
});

//Laboral
$(obtener_Lab());

function obtener_Lab(Lab)
{
	$.ajax({
		url : 'arch-ajax/LabAjax.php',
		type : 'POST',
		dataType : 'html',
		data : { Lab: Lab },
		})

	.done(function(resultado){
		$("#tabla_resultadoLab").html(resultado);
	})
}

$(document).on('keyup', '#busquedaLab', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_Lab(valorBusqueda);
	}
	else
		{
			obtener_Lab();
		}
});

//Educativa
$(obtener_Educ());

function obtener_Educ(Educ)
{
	$.ajax({
		url : 'arch-ajax/EducAjax.php',
		type : 'POST',
		dataType : 'html',
		data : { Educ: Educ },
		})

	.done(function(resultado){
		$("#tabla_resultadoEduc").html(resultado);
	})
}

$(document).on('keyup', '#busquedaEduc', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_Educ(valorBusqueda);
	}
	else
		{
			obtener_Educ();
		}
});

//Personal
$(obtener_Pers());

function obtener_Pers(Pers)
{
	$.ajax({
		url : 'arch-ajax/PersAjax.php',
		type : 'POST',
		dataType : 'html',
		data : { Pers: Pers },
		})

	.done(function(resultado){
		$("#tabla_resultadoPers").html(resultado);
	})
}

$(document).on('keyup', '#busquedaPers', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_Pers(valorBusqueda);
	}
	else
		{
			obtener_Pers();
		}
});

//Adicional
$(obtener_Otros());

function obtener_Otros(Otros)
{
	$.ajax({
		url : 'arch-ajax/OtrosAjax.php',
		type : 'POST',
		dataType : 'html',
		data : { Otros: Otros },
		})

	.done(function(resultado){
		$("#tabla_resultadoOtros").html(resultado);
	})
}

$(document).on('keyup', '#busquedaOtros', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_Otros(valorBusqueda);
	}
	else
		{
			obtener_Otros();
		}
});