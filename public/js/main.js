var pathname = window.location.pathname;

//Function Datatable
var dataTable = function(selector, list){
	var options = {
		"order": [
            [0, "asc"]
        ],
        "bLengthChange": true,
        //'iDisplayLength': 7,
        "oLanguage": {
        	"sLengthMenu": "_MENU_ registros por página",
        	"sInfoFiltered": " - filtrada de _MAX_ registros",
            "sSearch": "Buscar: ",
            "sZeroRecords": "No hay " + list,
            "sInfoEmpty": " ",
            "sInfo": 'Mostrando _END_ de _TOTAL_',
            "oPaginate": {
                "sPrevious": "Anterior",
                "sNext": "Siguiente"
            }
        }
	};
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
    }, message: '<h2><img style="margin-right: 30px" src="../img/spiffygif.gif" >' + message + '</h2>'});
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

$(function(){
	var data = {};

	//setup Ajax
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	    }
	});

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
	

	$(document).on('change', '#txtDate', function(){
		var range  = $('#txtDate').val();
		data.idProduct = $('#idProdcut').val();
		data.range = range;
		var url = pathname+'/'+data;
		console.log(url);die;
		ajaxForm(url, 'get', data)
		.done( function (data){
			$(".data_product").html(data);
			$.unblockUI();
		})
		.fail( function(data) {
			console.log(data);
		});
	});
});
