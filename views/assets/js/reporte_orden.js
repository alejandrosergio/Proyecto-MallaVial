
$(document).ready(function(){

    $("#button_buscar_ord").on('click',function(e){
        e.preventDefault();
        let serialize = $('#reporte_orden_form').serialize();
        console.log(serialize);
        $.ajax({
            url: 'controllers/C_orden_report.php',
            method: 'POST',
            data: serialize,
            success: function(data){
                alertas_crud("success","¡Reporte de Orden exitoso!","#28a745");
                var dataString = JSON.parse(data);
                let template = `
                <div class="container_repttt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">        
                                    <table id="sergio_el_rey_del_ajax" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha de Registro</th>
                                    <th>Prioridad</th>
                                    <th>Realizado por</th>
                                    <th>Tercero</th>
                                </tr>
                            </thead>
                            <tbody>`;
                for (let i = 0; i < dataString.length; i++){
                    template += `
                                    <tr>
                                        <td>${dataString[i].id}</td>
                                        <td>${dataString[i].fecha_reg}</td>
                                        <td>${dataString[i].prioridad}</td>
                                        <td>${dataString[i].usuario+' '+dataString[i].usuarioapellido}</td>
                                        <td>${dataString[i].tercero+' '+dataString[i].terceroapellido}</td>
                                    `}`
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    `
                if(dataString.length<1){
                    $("#reportes_orden").html("<tr><td colspan='8'>No se encontraron resultados</td></tr>");
                }
                else{
                $("#reportes_orden").html(template);
                    Datatable();
                }
            }
        })
    })
})