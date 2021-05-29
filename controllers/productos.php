
<?php 

    require_once("../config/conexion.php");
    require_once("../models/Productos.php");

    $productos = new Productos();

    switch( $_GET["op"]) {

        case "listar":

            $datos = $productos->get_productos();
            $data = Array();
            foreach( $datos as $row ) {
                $sub_array = array();
                $sub_array[] = $row["nomproducto"];

                $sub_array[] = '<button type="button" onClick="editar(' . $row["id"] . ');" id="' . $row["id"] . '" class="btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id"] . ');" id="' . $row["id"] . '" class="btn-outline-primary btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[] = $sub_array;

            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);


            break;
    }

?>