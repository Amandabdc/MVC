<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__. '/../../models/Usuario.php';

class HomeController extends Controller{

    public function index()
    {
        $usuario = new Usuario();
        $userData = $usuario->getUser();

        // retornar a view
        $this->view('home/index', $userData);
    }

    public function contact() {
        $this->view('home/contact');
    }
}