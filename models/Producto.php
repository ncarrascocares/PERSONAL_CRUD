<?php

    class Producto extends Conectar{

        //funcion para obtener los productos desde la bd
        public function get_produto(){

            //Creacion de variables que extienden desde la clase Conectar
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_produto_x_id($prod_id){

            //Creacion de variables que extienden desde la clase Conectar
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_produto($prod_id){

            //Creacion de variables que extienden desde la clase Conectar
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_producto SET est = 0, fech_elim = now() WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_produto($prod_nom){

            //Creacion de variables que extienden desde la clase Conectar
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_producto (prod_id, prod_nom, fech_crea, fech_mod, fech_elim, est)
                    VALUES 
                    (NULL, ? , now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prod_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_produto($prod_id, $prod_nom){

            //Creacion de variables que extienden desde la clase Conectar
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_producto SET prod_nom = ?, fech_mod = now() WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $prod_nom);
            $sql->bindValue(2, $prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


    }

?>