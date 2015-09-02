var server        = "";
var pathname      = document.location.pathname;
var pathnameArray = pathname.split("/public/");

server =  pathnameArray.length > 0 ? pathnameArray[0]+"/public/" : "";

//Function Datatable
var dataTable = function(selector, list, condition){
	var options = {
		"order": [
            [0, "asc"]
        ],
        "bLengthChange": true,
        //'iDisplayLength': 7,
        "oLanguage": {
        	"sLengthMenu": "_MENU_ registros por página",
        	"sInfoFiltered": " - filtrada de _MAX_ registros",
            "sSearch": "Buscar todos los campos: ",
            "sZeroRecords": "No hay " + list,
            "sInfoEmpty": " ",
            "sInfo": 'Mostrando _END_ de _TOTAL_',
            "oPaginate": {
                "sPrevious": "Anterior",
                "sNext": "Siguiente"
            }
        }
	};
	if(condition){
		return $(selector).DataTable(options);	
	}
	$(selector).DataTable(options);
};

//Function Overlay
var loadingUI = function (message){
    $.blockUI({ css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: 0.5,
        color: '#fff'
    }, message: '<h2><img style="margin-right: 30px" src="'+ server  +'img/spiffygif.gif">' + message + '</h2>'});
};

var responseUI = function (message,color){
    $.unblockUI();
    $.blockUI({ css: {
        border: 'none',
        padding: '15px',
        backgroundColor: color,
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: 0.5,
        color: '#fff'
    }, message: '<h2>' + message + '</h2>'});
    setTimeout(function(){
        $.unblockUI();
    },750);
};
//End functions overlay

//Function Ajax
var ajaxForm = function (url, type, data){
	var message;
	var path = url;
	if(type == 'post'){
		message = 'Registrando';
	}else{
		message = 'Actualizando';
	}
	return $.ajax({
				url: path,
			    type: type,
			    data: {data: JSON.stringify(data)},
			    datatype: 'json',
			    //timeout: 100000,
			    beforeSend: function(){
		    		loadingUI(message);
		    		//console.log("antes de ir");
			    },
			    error:function(){
			    	$.unblockUI();
			    	bootbox.alert("<p class='red'>No se pueden grabar los datos.</p>")
			    	//responseUI('No se pueden grabar los datos.', 'red');
			    	//console.log("No se pueden grabar los datos");
			    }
			});
};

//Function SubmitAjax
var ajaxSubmit = function (url, type, data){
	var message;
	var path = url;
	if(type == 'post'){
		message = 'Registrando';
	}else{
		message = 'Actualizando';
	}
	return	$.ajax( {
		      	url: path,
		      	type: type,
		      	//data: $('#formStaff').serialize(),
		      	data: data,
				beforeSend: function(){
		    		loadingUI(message);
			    },
		      	error: function(jqXHR, textStatus, errorThrown){
					console.log('ERROR: ' + textStatus);
					$.unblockUI();
			    	bootbox.alert("<p class='red'>No se pueden grabar los datos.</p>")
				}
		    });
}

/**
 * [messageAjax - Response message after request ]
 * @param  {[json]} data [description messages error after request]
 * @return {[alert]}     [errors in alert]
 */
var messageAjax = function(data) {
	console.log(data.errors);
	$.unblockUI();
	if(data.success){
		messageSuccess(data.message);
	}
	else{
		messageError(data.errors);
	}
};

var messageSuccess = function(message){
	bootbox.alert('<p class="success-ajax">'+message+'</p>', function(){
		location.reload();
	});
};

var messageError = function(errors){
	var error = "";
	for (var element in errors){
		if(errors.hasOwnProperty(element)){
			error += errors[element] + '<br>';
		}
	}
	bootbox.alert('<p class="error-ajax">'+error+'</p>');
};

$(function(){
	var data = {};
	//setup Ajax
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	if($('.product').attr('data-url') == 'state'){
		
		$("#datePicker").datepicker({
	        format: "mm/yyyy",
	        startDate: $('#startDate').val(),
	        endDate: $('#endDate').val(),
	        minViewMode: 1,
	        language: "es",
	        orientation: "auto",
	        autoclose: true
	    });

		$(document).on('click', "#file-state button", function (){
            $("#file-state input[type=file]").click();
        });

        $(document).on('change', "#file-state input[type=file]", function (){
            var arr = this.files[0].name.split('.');
            if (arr[1].toLowerCase() != 'xls' && arr[1].toLowerCase() != 'xlsx'){
                $("#file-state input[type=file]").val('');
                $("#file-state input[type=text]").val('');
                alert('Debe seleccionar un archivo Excel');
            }else{
                $("#file-state input[type=text]").val(arr[0]);
            }
        });
	}

	if($('.product').attr('data-url') == 'product'){
		$("#txtDate").daterangepicker(
			{
				locale:{
					monthNames: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Set','Oct','Nov','Dic'],
					applyLabel: 'Aceptar',
					cancelLabel: 'Cancelar',
					fromLabel: 'Desde',
					toLabel: 'Hasta'
				},
				minViewMode: 'month',
			    format: 'MM/YYYY',
			    startDate: $('#startDate').val(),
			    endDate: $('#endDate').val(),
			    minDate: $('#startDate').val(),
			    maxDate: $('#endDate').val(),
			    hideFormInputs: false,
			    opens: 'right',
			    autoApplyClickedRange : true
			},
			function(start, end, label) {
			 	$('#txtDate').val(start.format('MM/YYYY')+'-'+end.format('MM/YYYY'));
			}
		);
	}

	$(document).off('change', '#txtDate');
	$(document).on('change', '#txtDate', function(){
		data.idProduct = $('#idProduct').val();
		data.range = $('#txtDate').val();
		var url = 'search';
		ajaxForm(url, 'post', data)
		.done( function (data){
			$(".data_product").html(data);
			var urlExcel = $("#urlExcel").val();
			var urlPdf = $("#urlPdf").val();
			var btnExport = '<div class="btn-group pull-right">';
			btnExport    += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Exportar <span class="caret"></span></button>';
			btnExport    += '<ul class="dropdown-menu" role="menu">';
			btnExport    += 	'<li><a href="'+urlExcel+'" target="_blank">Excel</a></li>';
			btnExport    += 	'<li><a href="'+urlPdf+'" target="_blank">PDF</a></li>';
			btnExport    += '</ul></div>';
			$(".dataTables_info").parent().removeClass('col-sm-6').addClass('col-sm-5');
    		$(".dataTables_paginate").parent().removeClass('col-sm-6').addClass('col-sm-7');
    		$(".dataTables_length").parent().removeClass('col-sm-6').addClass('col-sm-5');
    		$("#table_dataProduct_filter").parent().removeClass('col-sm-6').addClass('col-sm-7');
    		$("#table_dataProduct_filter label").addClass('pull-left');
    		$(btnExport).appendTo('#table_dataProduct_filter');
			$.unblockUI();
		})
		.fail( function(data) {
			console.log(data);
		});
	});
	
	/**
	 * Staff
	 */
	
	//Save Empleado
	$('#formStaff').submit(function(e) {
	    e.preventDefault();
    	var url = $('#formStaff').attr('action');
    	var type = $('#formStaff').attr('method');
	    ajaxSubmit(url, type, $('#formStaff').serialize())
	    .done(function(response){
	    	messageAjax(response);
	    });
  	});

	//Active Staff
	$(document).off('click', '#activeEmpleado');
	$(document).on('click', '#activeEmpleado', function(e){
		e.preventDefault();
		var url;
		var idEmpleado  = $(this).parent().parent().find('.id_empleado').text();
		url = $(this).data('url');
		url = url + '/active/' + idEmpleado;
		data.idEmpleado = idEmpleado;
		ajaxForm(url, 'patch', data)
		.done( function (data) {
			messageAjax(data);
		});
	});

	//Delete Staff
	$(document).off('click', '#deleteEmpleado');
	$(document).on('click', '#deleteEmpleado', function(e){
		e.preventDefault();
		var url;
		var idEmpleado  = $(this).parent().parent().find('.id_empleado').text();
		url = $(this).data('url');
		url = url + '/delete/' + idEmpleado;
		data.idEmpleado = idEmpleado;
		ajaxForm(url, 'delete', data)
		.done( function (data) {
			messageAjax(data);
		});
	});

  	dataTable('#table_empleado', 'empleados');
});