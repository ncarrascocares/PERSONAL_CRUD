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
            $sub_array[] = $row["prod_desc"];
            $sub_array[] = '<button type"button" onClick="editar(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-outline-primary btn-icon"><i class="fa fa-edit"></i></div></button>';
            $sub_array[] = '<button type"button" onClick="eliminar(' . $row["prod_id"] . ');" id="' . $row["prod_id"] . '" class="btn btn-outline-danger btn-sicon"><i class="fa fa-trash"></i></div></button>';

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

    case "guardaryeditar":
        //como desde la vista se vana enviar datos a nuestro controlador, aca se recibiran a traves de un post
        //el parametro que recibiremos es el post_id
        $datos = $producto->get_produto_x_id($_POST["prod_id"]);

        //Luego preguntamos si prod_id esta vacio
        if (empty($_POST["prod_id"])) {

            //Acá hacemos otra validación adicional
            //Si datos no trajo ningún registro o ningún array
            if (is_array($datos) == true and count($datos) == 0) {
                //acá se realiza un insert y se entrega los parametros necesarios, en este caso 1 
                $producto->insert_producto($_POST["prod_nom"], $_POST["prod_desc"]);
            }
            
            }else{
                //caso contrario se realiza un editar y se entregan los parametros necesarios, en este caso necesita 2 para realizar la sentencia creada en el modelo
                $producto->update_producto($_POST["prod_id"], $_POST["prod_nom"], $_POST["prod_desc"]);
            }

    break;

   
    case "mostrar":
     //¿Que va a realizar este case mostrar?
        //Va a traer todos los datos y los va a separar en un json
        $datos = $producto->get_produto_x_id($_POST["prod_id"]);
          //Si datos tiene información
          if (is_array($datos) == true and count($datos) > 0) {
            
            //recorremos con un foreach los datos almacenados en la variable $datos
            foreach ($datos as $row) {
                $salida["prod_id"] = $row["prod_id"];
                $salida["prod_nom"] = $row["prod_nom"];
                $salida["prod_desc"] = $row["prod_desc"];
            }

            //enviamos la información a traves de un json
            echo json_encode($salida);
        }

    break;

    case "eliminar":
        $producto->delete_produto($_POST["prod_id"]);
    break;
    

}
?>