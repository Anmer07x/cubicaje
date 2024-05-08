<?php namespace App\Controllers;

use App\Models\recuperaModel;


class recupera extends BaseController
{
    protected $recuperaModel;
    
    public function __construct()
    {
       $this->recuperaModel = new recuperaModel();
      
    }


    public function index()
    {


        echo view('recupera', $datos);


    }

 
}