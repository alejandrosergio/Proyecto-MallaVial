<?php

    /* CONFIGURACIÓN Y MODELO */

        require_once('../config/Connection.php');

        require_once('../models/M_reporte_caso.php');

        $objectReporteCaso = new ReporteCaso();

        /* CONSULTA SOLO POR FECHA*/

        if(isset($_POST['fecha1']) && isset($_POST['fecha2']) ){
            $resultCaso = $objectReporteCaso->ReporteFechas();
            echo json_encode($resultCaso);
        }

?>