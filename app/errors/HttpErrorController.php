<?php

require_once __DIR__ . '/../../core/Controller.php';

class HttpErrorController extends Controller {
    
    public function index() 
    {
        http_response_code(404);
        $this->view('erros/404');
    }

    public function InternalServerError()
    {
        http_response_code(500);
        $this->view('erros/500');
    }

    public function Aunauthorized()
    {
        http_response_code(403);
        $this->view('erros/403');
    }
}