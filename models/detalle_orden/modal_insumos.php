<?php 
class ModalInfo_insumos extends Connection{
  public function read_input_order_peding(){
    if(isset($_POST['id_orden_insumo'])){
      $id = $_POST['id_orden_insumo'];
      $datos = array();
      $sql = "SELECT ord_inv_id_insumo,ord_inv_tip_insumo,ord_inv_cantidad FROM tblorden_inventario WHERE tblorden_ord_id = $id";
      
      $consulta = mysqli_query($this->conection,$sql);

      $id_insumo[] = array();
      while ($row = mysqli_fetch_array($consulta)) {
        $id_insumo[] = array(
          "id_insumo" => $row["ord_inv_id_insumo"],
          "tabla"     => $row["ord_inv_tip_insumo"],
          "cantidad"  => $row["ord_inv_cantidad"]
        );
      }
      
      $datos[] = array();
      for ($i=1; $i<count($id_insumo); $i++) { 
        $id       = $id_insumo[$i]['id_insumo'];
        $tabla    = $id_insumo[$i]['tabla'];
        $cantidad = $id_insumo[$i]['cantidad'];
        if ($tabla == 'material') {
          $tabla = "tblmaterial";
          $id_insu = "mat_id";
          $descripcion = "mat_descripcion";
          $costo = "mat_costo";
        }
        else if ($tabla == 'herramienta') {
          $tabla = "tblherramienta";
          $id_insu = "her_id";
          $descripcion = "her_descripcion";
          $costo = "her_costo";
        }
        else{
          $tabla = "tblmaquinaria";
          $id_insu = "maq_id";
          $descripcion = "maq_descripcion";
          $costo = "maq_costo";
        }
        $sql = "SELECT * FROM $tabla WHERE $id_insu = $id";
        $resultado = mysqli_query($this->conection,$sql);

        while($row = mysqli_fetch_array($resultado)){
          $datos[] = array(
          "descripcion" => $row[$descripcion],
          "existencia"  => $cantidad,
          "costo"       => $row[$costo]
          );
        }
      }
    }
    return $datos;
  }
}
?>