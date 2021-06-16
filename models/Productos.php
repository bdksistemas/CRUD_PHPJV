
<?php

    class Productos extends Conectar {

        //? FUNCIÓN PARA OBTENER TODOS LOS PRODUCTOS
        public function get_productos() {

            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "SELECT * FROM tbproductos WHERE estado=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //? FUNCIÓN PARA OBTENER LOS DATOS DE 1 SOLO PRODUCTO
        public function get_productoID( $id ) {

            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "SELECT * FROM tbproductos WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        
        //? FUNCIÓN PARA ELIMINAR UN PRODUCTO
        public function delete_producto( $id ) {

            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "UPDATE tbproductos SET estado=0, feceli=NOW() WHERE id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //? FUNCIÓN PARA AGREGAR UN REGISTRO
        public function insert_producto( $nomproducto, $prod_desc ) {

            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "INSERT INTO tbproductos (id, nomproducto, prod_desc, fecnvo, fecmod, feceli, estado) VALUES (0, ?, ?, NOW(), null, null, 1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nomproducto);
            $sql->bindValue(2, $prod_desc);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        //? FUNCIÓN PARA MODIFICAR UN REGISTRO
        public function update_producto( $id, $nomproducto, $prod_desc ) {

            $conectar = parent::Conexion();
            parent::set_names();

            $sql = "UPDATE tbproductos SET nomproducto=?, prod_desc?, fecmod=NOW() WHERE id=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nomproducto);
            $sql->bindValue(2, $prod_desc);
            $sql->bindValue(3, $id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        
    }

?>