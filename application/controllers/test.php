<?php

class Test extends Controller {

    private $model = null;

    public function __construct()
    {
        $model = $this->loadModel('Example_model');
        $this->model = $model;

    }

    function index()
    {
        echo 'here';
    }

}


