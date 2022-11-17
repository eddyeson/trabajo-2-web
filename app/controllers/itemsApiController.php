<?php
require_once 'app/models/itemsModel.php';
require_once 'app/views/itemsView.php';
class itemsApiController{
    protected $model;
    protected $view;
    protected $data;

    public function __construct(){
        $this->model = new itemsModel();
        $this->view = new itemsView();

        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getJugadores($params = null) {
        if(isset($_GET['ordenarPor'])){
            if(isset($_GET['ordenarPor']) && !isset($_GET['orden'])){
                $jugador = $this->model->getJugadores($_GET['ordenarPor']);
            }
            if(isset($_GET['ordenarPor']) && isset($_GET['orden'])){
                $orden = $_GET['orden'];
                if($orden == "DESC" || $orden == "desc" || $orden = "ASC" || $orden = "asc"){  
                $jugador = $this->model->getJugadores($_GET['ordenarPor'],$_GET['orden']);
                    }
                }
                if($jugador){
                    return $this->view->response($jugador, 200);
                }
                else {
                    $this->view->response("no se encontraron jugadores", 404);
                }
        }
        else{
            $jugador = $this->model->getJugadores();
            if($jugador){
            $this->view->response( $jugador, 200);
            }
            else {
            $this->view->response( "error de solicitud", 404);
            }
        }
    }
    
    public function getjugador($params = null) {
        $id = $params[':ID'];
        $tarea = $this->model->getjugador($id);
        if(!empty($tarea)){
            return $this->view->response($tarea,200);
        }
        else{
            $this->view->response("No existe la tarea con el id={$id}", 404);
        }
        
    }

    public function deletedjugador($params = null){
        $id = $params[':ID'];
        $task = $this->model->getjugador($id);
        if($task){
            $this->model->deleteTarea($id);
            $this->view->response("tarea id = $id eliminada", 200);
        }
        else {
            $this->view->response("tarea id = $id no encontrada", 404);
        }

    }
    private function checkinputs($body){
        foreach($body as $k => $v){
            if(empty($v) || $v==NULL){
                return true;
            }
            else if (!is_numeric($v) && ctype_space($v)){
                return true;
            }
        }
        return false;
    }
    public function addjugador($params = null){
        $body = $this->getdata();
        if($this->checkinputs($body)){
            $this->view->response("La tarea no fue creada", 400);
        }
        else{
            $id = $this->model->guardar($body-> nombre,$body-> sensibilidad,$body-> dpi,$body-> rango,$body-> id_equipo,$body-> rol);
            $jugador = $this->model->getjugador($id);
            $this->view->response($jugador, 200);
        }
    }

    public function updatejugador($params = null){
        $id = $params[':ID'];
        $jugador = $this->model->getjugador($id);
        
        if($jugador){
            $body = $this->getData();
            if($this->checkinputs($body)){  
                
                $this->view->response("data no encontrada", 400);
             }
             else {
                $nombre = $body-> nombre;
                $sensibilidad = $body-> sensibilidad;  
                $dpi = $body-> dpi;
                $rango  = $body-> rango;
                $id_equipo = $body-> id_equipo;
                $rol = $body-> rol;
                $jugador = $this->model->updateTarea($nombre,$sensibilidad,$dpi,$rango,$id_equipo,$rol,$id);
                $this->view->response("tarea id = $id actualizada con exito", 200);
             }
        }
        else {
            $this->view->response("tarea id = $id no encontrada", 404);
        }
        
    }
}