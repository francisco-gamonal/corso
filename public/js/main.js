var server = "";
var pathname = document.location.pathname;
var pathnameArray= pathname.split("/public/");

server =  pathnameArray.length > 0 ? pathnameArray[0]+"/public/" : "";

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
			    timeout: 100000,
			    beforeSend: function(){
		    		//loadingUI(message);
		    		console.log("antes de ir");
			    },
			    error:function(){
			    	//$.unblockUI();
			    	//bootbox.alert("<p class='red'>No se pueden grabar los datos.</p>")
			    	//responseUI('No se pueden grabar los datos.', 'red');
			    	console.log("No se pueden grabar los datos");
			    }
			});
};

$(function(){
	var data = {};

	//setup Ajax
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$("#txtDate").daterangepicker(
		{
			locale:
			{
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

	$(document).on('change', '#txtDate', function(){
		var range  = $('#txtDate').val();
		data.range = range;
		console.log(data, pathname);
		ajaxForm(pathname, 'post', data)
		.done( function (data){
			$(".data_product").html(data);
		})
		.fail( function(data) {
			console.log(data);
		});
	});
});
