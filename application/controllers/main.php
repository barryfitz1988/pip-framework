<?php

class Main extends Controller {

    private $model = null;

    public function __construct()
    {
        $model = $this->loadModel('Example_model');
        $this->model = $model;

    }

	function index()
	{
        $sr = $this->model->selectAllFromSRNumbersTable();
        $srNumberArray = array();
        $x =array();
        $y =array();
		$template = $this->loadView('main_view');
        $template->set('srNumberArray', $srNumberArray);
        $template->set('x', $x);
        $template->set('y', $y);
        $template->set('srnumbers', $sr);
		$template->render();
	}
    
}


