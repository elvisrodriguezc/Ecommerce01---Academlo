<?php
session_start();
require_once './model.php';
require_once './util/session.php';
try {
  //recuperamos la operacion
  $Op = $_REQUEST["Op"];
  $model = new asignar();
  switch ($Op) {
      // Lanzadores de Menu   //
    case 'products_list':
      $model->setDato01($_REQUEST["limite"]);
      $resp = $model->productos_lista();
      $tabla = "";
      foreach ($resp as $row) {
        $tabla .= '{
          "id":"' . $row['producto_id'] . '",
          "categoria_id":"' . $row['categoria_id'] . '",
          "marca_id":"' . $row['marca_id'] . '",
          "codigo":"' . $row['codigo'] . '",
          "producto":"' . $row['producto'] . '",
          "descripcion":"' . $row['descripcion'] . '",
          "img":"' . $row['img'] . '",
          "cantidad":"' . $row['cantidad'] . '",
          "precio":"' . $row['precio'] . '",
          "estado":"' . $row['estado'] . '"
        },';
      };
      $tabla = substr($tabla, 0, strlen($tabla) - 1);
      echo '[' . $tabla . ']';
      break;



    default:
      break;
  }
} catch (Exception $e) {
  Session::setSesion("mensajeErr", $e->getMessage());
}
?>