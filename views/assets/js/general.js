var rows;

$(document).ready(function () {
    Datatable();
    
});

function llamarData2(){
    Datatable2();
}

function llamarData3(){
    Datatable3();
}

function onlytext(e){
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for(var i in especiales){
        if (key==especiales[i]) {
            teclado_especial = true;break;
        }
    }
    if (letras.indexOf(teclado)==-1 && !teclado_especial) {
        return false;
    }
}

/* resetear la modal */

$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
});

/* para los selectes no queden seleccionados */

function CancelarSelect(){   
    $('.select_cerrar option:selected').removeAttr('selected');
}


function Datatable(){
    $('#sergio_el_rey_del_ajax').DataTable({       
        pageLength: 6,
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
				},
				"sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]
    });
}

function Datatable2(){
$('#sergio_el_rey_del_ajax2').DataTable({
        destroy: true,
        pageLength: 6,
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
				},
				"sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	        
    });
}

function Datatable3(){
    $('#sergio_el_rey_del_ajax3').DataTable({
            destroy: true,
            pageLength: 6,
            language: {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "sProcessing":"Procesando...",
                },
            //para usar los botones   
            responsive: "true",
            dom: 'Bfrtilp',       
            buttons:[ 
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fas fa-file-pdf"></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info'
                },
            ]	        
        });
    }

/* FECHA */
function myFunc()  {
	var now = new Date();
	var time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	document.getElementById('display-time').innerHTML= time;
}
myFunc();
setInterval(myFunc, 1000);

/* ALERT SWEET */

//Funcion Alerta Validación
function alertas(title,confirmButtonColor) {
    Swal.fire({
        icon: 'warning',
        title: title,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: confirmButtonColor,
        iconColor: '#dc3545',
    })
}


//Funcion Alerta CRUD
function alertas_crud(icon,title,confirmButtonColor,iconColor) {
    Swal.fire({
        icon: icon,
        title: title,
        confirmButtonText: 'Aceptar',
        confirmButtonColor: confirmButtonColor,
        iconColor: iconColor,
    })
}

function validateForeing(tabla,foreing_N,Foreing_Id){
    
    $.ajax({
        url:'controllers/C_validate_Foreing.php',
        type:'POST',
        datatype:'json',
        data:{tabla:tabla,foreing_N:foreing_N,Foreing_Id:Foreing_Id},
        success:function(data){
            console.log(JSON.parse(data));
            rows = JSON.parse(data);
        },
        error:function(){
            console.log("no se pudo validar la foranea");
        }
    });
    return rows;
}
