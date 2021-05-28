<?php
 class OrdenesMantenimiento extends Connection{

  public  function selectInsumos(){
    $insumotbl =  $_POST['insumotbl'];
    $insumotbl = explode(",", $insumotbl);
    
    $sql = "SELECT * FROM $insumotbl[0]";
    $resultado = mysqli_query($this->conection, $sql);
    if ($insumotbl[0]=="tblmaterial") {
        $tp_insumo = 'material';
    }else if($insumotbl[0] == 'tblherramienta') {
        $tp_insumo = 'herramienta';
    }else {
      $tp_insumo = 'maquinaria';
    }
    $datos = array();
    while($rows = mysqli_fetch_array($resultado)){
        if($insumotbl[0]=="tblmaterial"){
          $costo_materal=$rows['mat_costo'];
        }
        else{
          $costo_materal =0;
        }
        $datos[] = array(
          "id_insumo"     => $rows[$insumotbl[1]],
          "insumo"         => $rows[$insumotbl[2]],
          "costo_material" => $costo_materal,
          "tp_insumo"      => $tp_insumo,
          "existencia"     => $rows[$insumotbl[3]]
        );  
    }
    return $datos;     
}



   public  function selectPrioridad(){
    $sql = "SELECT * FROM tbltipo_prioridad WHERE tblestado_general_est_gen_id = 1";
    $resultado = mysqli_query($this->conection, $sql);
    $datos = array();
    while($rows = mysqli_fetch_array($resultado)){
      $datos[] = array(
        "id_prioridad"  => $rows['tip_pri_id'],
        "des_prioridad" => $rows['tip_pri_descripcion']
      );  
    }
    return $datos;
  }

  public  function selectTercero(){
            
    $sql = "SELECT * FROM tbltercero WHERE tblestado_general_est_gen_id=1";
    $resultado = mysqli_query($this->conection, $sql);
  
    $datos = array();
    while($rows = mysqli_fetch_array($resultado)){
      $datos[] = array(
        "id_ter" => $rows['ter_id'],
        "ter_nombre" => $rows['ter_nombre1'],
        "ter_apellido1" => $rows['ter_apellido1'],
        "ter_apellido2" => $rows['ter_apellido2']
      );  
    }

    return $datos;
  
  }


  public function listarCasos(){
    $casos[] = array();
    $caso_id = json_decode($_POST['casos_list']);
    for($i =0;$i<count($caso_id);$i++){
      $id = (int) $caso_id[$i];
  
      $sql = "SELECT * FROM tblcaso INNER JOIN tbltipo_daño
      ON tip_dañ_id =tbltipo_daño_tip_dañ_id
      WHERE cas_id = $id";
      $resultado = mysqli_query($this->conection,$sql);
  
      while($row = mysqli_fetch_array($resultado)){
        $casos[] = array(
         "Numero_Tramo"  => $row["cas_numero_caso"],
        "profundidad"    => $row["cas_profundidad"],
        "largo"          => $row["cas_largo"],
        "ancho"          => $row["cas_ancho"],
        "tipo_daño"      => $row["tip_dañ_descripcion"]  
        );
  
      }
  }
  
    return  $casos;
  } 
  





  public function insert_orden(){
    if(isset($_POST['generar_orden'])){

    $orden =json_decode($_POST['insumos']); 
    $prioridad  = $_POST['prioridad'];
    $usuario    = $_POST['usuario'];
    $tercero    = $_POST['tercero'];

  
    $sql = "INSERT INTO tblorden(tbltipo_prioridad_tip_pri_id,tblusuario_usu_id,tbltercero_ter_id,tblestado_est_id)
    VALUES($prioridad,$usuario,$tercero,19)";
    $resultado = mysqli_query($this->conection, $sql);

      if($resultado){
       $sql = "SELECT * FROM tblorden order by ord_id DESC limit 1";

        $queri = mysqli_query($this->conection, $sql);
        while($row = mysqli_fetch_array($queri)){
          $id_ord = $row['ord_id'];
      }
      
      for($i=0;$i<count($orden);$i++){
        $cantidad   =(int) $orden[$i]->cantidad;
        $inventario = explode(",",$orden[$i]->inventario);
        $insumo_id = (int) $inventario[0];
        $costo = (int) $inventario[1];
        $tipo_insumo = $inventario[3];
    
        $sql = "INSERT INTO tblorden_inventario(ord_inv_cantidad,ord_inv_costo_total_material,ord_inv_total_orden,ord_inv_id_insumo,tblorden_ord_id,ord_inv_tip_insumo)
        VALUES($cantidad,$costo,$cantidad*$costo,$insumo_id,$id_ord,'$tipo_insumo')";

        $resultado = mysqli_query($this->conection, $sql);

      }

      $casos = json_decode($_POST['casos']);
      for($i=0;$i<count($casos);$i++){
        $caso_id =(int) $casos[$i][0];
        $sql = "UPDATE tblcaso SET tblorden_ord_id = $id_ord WHERE cas_id = $caso_id";
        $resultado = mysqli_query($this->conection, $sql);

          if ($resultado) {
            $sql = "UPDATE tblcaso SET tblestado_est_id = 15 WHERE cas_id = $caso_id";  
            mysqli_query($this->conection, $sql);
          }
        }
      }
    }
    return var_dump($casos);
  }



  public function aprobar_orden(){
    if (isset($_POST['aprobar_orden']) && isset($_POST['id_aprobar_ord'])){
        $this->id =  $_POST['id_aprobar_ord'];
        $sql = "UPDATE tblorden SET tblestado_est_id = 20 WHERE ord_id =$this->id";
        $resultado = mysqli_query($this->conection, $sql);
        if ($resultado){
            $sql = "UPDATE tblcaso SET tblestado_est_id = 15 WHERE tblorden_ord_id = $this->id"; 
            $resultado = mysqli_query($this->conection, $sql);
        }

        
        $sql = "SELECT ord_inv_id_insumo,ord_inv_tip_insumo,ord_inv_cantidad FROM tblorden_inventario WHERE tblorden_ord_id = $this->id";
        $resultado = mysqli_query($this->conection,$sql);
      
    
        while($rows = mysqli_fetch_array($resultado)){
          $datos_orden[] = array(
            "id_insumo"   => $rows['ord_inv_id_insumo'],
            "tip_insumo"  => $rows['ord_inv_tip_insumo'],
            "cantidad"    => $rows['ord_inv_cantidad']
          );
        }     
        for($i=0;$i<count($datos_orden);$i++){
          $id_insum  = (int)$datos_orden[$i]['id_insumo'];
          $tabla     = $datos_orden[$i]['tip_insumo'];
          $cantidad  = (int)$datos_orden[$i]['cantidad'];

          

          if ($tabla == 'material') {
            $tabla = "tblmaterial";
            $id_insu = "mat_id";
            $existencia = "mat_existencia";
            $foranea ="tblmaterial_mat_id";
          }
          else if ($tabla == 'herramienta') {
            $tabla = "tblherramienta";
            $id_insu = "her_id";
            $existencia = "her_existencia";
            $foranea ="tblherramienta_her_id";
          }
          else{
            $tabla = "tblmaquinaria";
            $id_insu = "maq_id";
            $existencia = "maq_existencia";
            $foranea ="tblmaquinaria_maq_id";
          }
  
          $sql="SELECT $existencia FROM $tabla WHERE $id_insu = $id_insum";
          $consulta = mysqli_query($this->conection,$sql);
  
     
          while ($row = mysqli_fetch_array($consulta)){
            $datos[] = array(
              "existencia" => $row[$existencia]
            );
          }
          $existancia = (int) $datos[0]['existencia'];
          $resta      = $existancia - $cantidad;

          $sql = "UPDATE $tabla SET $existencia = $resta WHERE $id_insu = $id_insum";
          $resultado = mysqli_query($this->conection,$sql);


          if ($resultado){
          $sql = "SELECT inv_id FROM tblinventario WHERE $foranea = $id_insum";
            $resultado_inv = mysqli_query($this->conection,$sql);
  
            while ($rows = mysqli_fetch_array($resultado_inv)){
             
              $inven_id[] = array(
                "inventario_id" => $rows['inv_id']
              );
             
            }
          
            $id_inventario = (int) $inven_id[$i]['inventario_id'];
        
            
            if ($tabla == "tblmaterial") {
                $sql = "SELECT mat_costo FROM $tabla WHERE mat_id = $id_insum";
                $resultado = mysqli_query($this->conection,$sql);
  
                $datos_costo[] = array();
                while ($row = mysqli_fetch_array($resultado)) {
                  $datos_costo[] = array(
                    "costo" => $row['mat_costo']
                  );
                }
                $costo_unitario = (int)$datos_costo[1]['costo'];
                $total = $costo_unitario * $cantidad;
            }else{
              $total = 0;
            }
           
            
            $sql = "UPDATE tblmovimiento_inventario SET mov_inv_cantidad = $cantidad, mov_inv_valor_total = $total, mov_inv_tipo_movimiento = 'SALIDA', mov_inv_concepto = 'Salida por orden de mantenimiento' WHERE tblinventario_inv_id = $id_inventario ORDER BY mov_inv_id DESC LIMIT 1";
             mysqli_query($this->conection,$sql);
            
          }
  
        }

     

    }
   
    }


     //Aprobar orden pendiente
    public function finalizar_orden(){
      if (isset($_POST['finalizar_orden']) && isset($_POST['id_finalizar_ord'])){
          $this->id = $_POST['id_finalizar_ord'];
          $sql = "UPDATE tblorden SET tblestado_est_id = 18 WHERE ord_id = $this->id";
          $resultado = mysqli_query($this->conection, $sql);
              
          if($resultado){
            $sql = "UPDATE tblcaso SET tblestado_est_id = 13 WHERE tblorden_ord_id = $this->id";
            $resultado = mysqli_query($this->conection,$sql);
          }



              $datos  =  array();
              $datos2 =  array();

              $sql = "SELECT ord_inv_cantidad,ord_inv_id_insumo,ord_inv_tip_insumo FROM tblorden_inventario WHERE tblorden_ord_id = $this->id"; 
              $resultado = mysqli_query($this->conection, $sql);

              while ($row = mysqli_fetch_array($resultado)){
                  $datos[] = array(
                      "cantidad"    => $row["ord_inv_cantidad"],
                      "id_insumo"   => $row["ord_inv_id_insumo"],
                      "tipo_insumo" => $row["ord_inv_tip_insumo"]
                  );
              }
              
              for ($i=0; $i<count($datos);$i++) {

                  $id_insumo = (int) $datos[$i]['id_insumo']; 
                  $tabla     =  $datos[$i]['tipo_insumo'];
                 
                if ($tabla == 'material') {
                  $tabla = "tblmaterial";
                  $id_insu = "mat_id";
                  $existencia_n = "mat_existencia";
                  $factura ="mat_numero_factura";
                  $insu_concepto ="mat_concepto";
                }
                else if ($tabla == 'herramienta') {
                  $tabla = "tblherramienta";
                  $id_insu = "her_id";
                  $existencia_n = "her_existencia";
                  $factura ="her_numero_factura";
                  $insu_concepto ="her_concepto";
                }
                else{
                  $tabla = "tblmaquinaria";
                  $id_insu = "maq_id";
                  $existencia_n = "maq_existencia";
                  $factura ="maq_numero_factura";
                  $insu_concepto ="maq_concepto";
          
                }

                  $sql = "SELECT $existencia_n FROM $tabla WHERE $id_insu = $id_insumo"; 
                  $resultado = mysqli_query($this->conection, $sql);

                  while ($row = mysqli_fetch_array($resultado)){
                      $datos2[] = array(
                          "existencia" => $row[$existencia_n]
                      );
                  }
                  $cantidad = (int) $datos[$i]["cantidad"];

                  $existencia = (int) $datos2[$i]["existencia"];

                  $nuevo_stock = $cantidad+$existencia;
                  $concepto = "Devolucion de insumo";
                     $cont='';
                     $cont.= $sql="UPDATE $tabla SET $factura='No aplica',$insu_concepto='$concepto', $existencia_n = $nuevo_stock WHERE $id_insu=$id_insumo"; 
                  
                  $tipo_insumo = $datos[$i]['tipo_insumo'];
                  if ($tipo_insumo!='material'){
                       $resultado = mysqli_query($this->conection,$sql);
                  }
                  
              }
          
      }
  
  }




  }
?>