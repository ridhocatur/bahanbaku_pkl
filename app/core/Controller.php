<?php

class Controller {
    public function view($view, $data=[], $data2=[], $data3=[], $data4=[])
    {
        require_once '../app/views/' .$view. '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' .$model. '.php';
        return new $model;
    }
}
