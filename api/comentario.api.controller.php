<?php
require_once("api/comentario.api.model.php");
require_once("api/json.view.php");

class ComentarioApiController {

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new ComentarioModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function  getComentarios($params = null) {
        $comentarios = $this->model->getAll();
        var_dump($comentarios);
        $this->view->response($comentarios, 200);
    }

    public function getComentario($params = null) {
        $id = $params[':ID'];
        
        $comentario = $this->model->get($id);        
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    } 

    public function deleteComentario($params = null) {
        $id = $params[':ID'];
        $comentario = $this->model->get($id);
        if ($comentario) {
            $this->model->delete($id);
            $this->view->response("El comentario fue borrado con exito.", 200);
        } else
            $this->view->response("El comentario con el id={$id} no existe", 404);
    }

    public function crearComentario($params = null) {
        $data = $this->getData();

        //CAMBIAR ESTA LINEA CON LOS CAMPOS DE LA DDBB
        $id = $this->model->save($data->comentario, $data->puntaje, $data->id_jugador);
        
        $comentario = $this->model->get($id);
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario no fue creado", 500);

    }

}