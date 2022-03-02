<?php

require_once("../config/conexion.php");
require_once("../models/Producto.php");

//instanciando un ubjeto de la clase Productos
$producto = new Producto();

switch ($_GET["op"]) {
    case "listar":
        $datos = $producto->get_producto();
        $data = Array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["prod_nom"];
            $sub_array[] = '<button type"button" onClick="ver(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></div></button>';
            $sub_array[] = '<button type"button" onClick="ver(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></div></button>';

            $data[] = $sub_array;
        }

        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data
        );

            echo json_encode($results);

    break;

}
?>