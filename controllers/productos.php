
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
        
        case "guardaryeditar": 

            $datos = $productos->get_productoID($_POST["id"]);
            if (empty($_POST["id"])) {
                if( is_array($datos) === true and count($datos) == 0 ) {
                    $productos->insert_producto($_POST["nomproducto"]);
                }
            } else {
                $productos->update_producto($_POST["id"], $_POST["nomproducto"]);
            }
            break;
        
        case "mostrar";

            $datos = $productos->get_productoID($_POST["id"]);
            if( is_array($datos) === true and count($datos) == 0 ) {
                foreach( $datos as $row) {
                    $output["id"] = $row["id"];
                    $output["nomproducto"] = $row["nomproducto"];
                }
            }            
            break;
        
            case "eliminar": 

                $productos->delete_producto( $_POST["id"]);
                break;
    }

?>