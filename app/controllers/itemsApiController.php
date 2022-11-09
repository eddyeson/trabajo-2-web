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

    public function getAllItems($params = null) {
        $items = $this->model->getAllItems();
        return $this->view->response($items, 200);
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

    public function addjugador($params = null){
        $data = $this->getdata();

        $id = $this->model->guardar($data-> nombre,$data-> sensibilidad,$data-> dpi,$data-> rango,$data-> id_equipo,$data-> rol);

        $tarea = $this->model->getjugador($id);
        if($tarea){
            var_dump($data);
            $this->view->response($tarea, 200);
        }
        else{
            $this->view->response("La tarea no fue creada", 500);
        }
    }

    public function updatetarea($params = null){
        $id = $params[':ID'];
        $jugador = $this->model->getjugador($id);
        
        if($jugador){
            $body = $this->getData();
            if($body){  
            $nombre = $body-> nombre;
            $sensibilidad = $body-> sensibilidad;  
            $dpi = $body-> dpi;
            $rango  = $body-> rango;
            $id_equipo = $body-> id_equipo;
            $rol = $body-> rol;
            $jugador = $this->model->updateTarea($nombre,$sensibilidad,$dpi,$rango,$id_equipo,$rol,$id);
            $this->view->response("tarea id = $id actualizada con exito", 200);
             }
             else {
                $this->view->response("data no encontrada", 400);
             }
        }
        else {
            $this->view->response("tarea id = $id no encontrada", 404);
        }
        
    }
}