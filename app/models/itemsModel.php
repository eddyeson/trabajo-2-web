<?php
class itemsModel{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabajo practica; charset=utf8', 'root','');
    }

    function getJugadores($ordenarPor = null, $orden = null){
        if((isset($ordenarPor) && !isset($orden))){
            $query = $this->db->prepare(" SELECT * FROM jugador ORDER BY $ordenarPor DESC" );
            $query->execute();
            $tarea = $query->fetchAll(PDO::FETCH_OBJ);
            return $tarea;
        }
        else if(isset($ordenarPor) && isset($orden)){ 
            $query = $this->db->prepare(" SELECT * FROM jugador ORDER BY $ordenarPor $orden" );
            $query->execute();
            $tarea = $query->fetchAll(PDO::FETCH_OBJ);
            return $tarea;
        }
        else {
            $query = $this->db->prepare(" SELECT * FROM jugador " );
            $query->execute();
            $tarea = $query->fetchAll(PDO::FETCH_OBJ);
            return $tarea;
        }
    }
    
    function getjugador($id){
        $sentencia = $this->db->prepare(" SELECT * FROM jugador  WHERE id = ?");
        $sentencia->execute([$id]);    
        $tarea = $sentencia->fetch(PDO::FETCH_OBJ);

        return $tarea;
    }
    
    public function guardar($nombre,$sensibilidad,$dpi,$rango,$id_equipo,$rol){
        $query = $this->db->prepare("INSERT INTO jugador(nombre,  sensibilidad, dpi, rango, id_equipo, rol)VALUES(?, ?, ?, ?, ?, ?)");
        $query->execute([$nombre, $sensibilidad, $dpi, $rango, $id_equipo, $rol]); 

        return $this->db->lastInsertId();
    }

    public function deleteTarea($id){
        $query = $this->db->prepare("DELETE FROM jugador WHERE id = ?");
        $query->execute([$id]);
    }

    public function updateTarea($nombre,$sensibilidad,$dpi,$rango,$id_equipo,$rol,$id){
        $query = $this->db->prepare('UPDATE jugador SET nombre = ?, sensibilidad = ?, dpi = ?, rango = ?, id_equipo = ?, rol = ? WHERE id= ?');
        $query->execute([$nombre,$sensibilidad,$dpi,$rango,$id_equipo,$rol,$id]);
    }
}



