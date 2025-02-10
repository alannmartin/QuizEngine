<?php

namespace Modules\Home\Controllers;

use App\Controllers\BaseController;
//use CodeIgniter\Session\Session;
use Config\Database;
use Modules\Home\Model\HitsModel;

/* use the Templates module for the partial views */
use App\Modules\Templates\Controllers;   


class Home extends BaseController
{
    protected \CodeIgniter\Session\Session $session;
    public $builder;
    private HitsModel $hits;
    
    function __construct()
    {
        helper(['form','url','file','array','text']);
        $db = Database::connect();
        //instantiate the model that will be used in this class
        $this->hits = new HitsModel();
        $this->builder = $db->table('hits');
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    
    public function index(): string
    {
        //destroy any previous sessions
        $this->session->destroy();

        helper(['form','url','file','array','text']);
        $data['title']   = "Alan Martin | hmvc-master project"; //sets the title for the Page
        $data['headline'] = "Home Module"; //sets a heading for the page

        //$data = [ "name" => "Alan Martin", "email" => "alannmartin@gmail.com" ];

        //$data['counter'] = $this->hits->findAll();
        
        //$this->hits->update_row(); //cal to update counter in the hits table by 1
        
        return view('\Modules\Templates\Views\Public\header',$data)
            .view('\Modules\Home\Views\index'); //this view could be a widget

    }
    
    public function downloads(): string
    {
        helper(['form','url','file','array','text']);
        $data['title'] = "Downloads"; //sets the title for the Page
        
        return view('\Modules\Templates\Views\Public\header')
            //.view('\Modules\Templates\Views\Public\public_template')
            .view('\Modules\Downloads\Views\index',$data); //this view could be a widget
            //.view('\Modules\Templates\Views\Public\footer');
    }
    
    
    public function docs(): string
    {
        helper(['form','url','file','array','text']);
        $data['title'] = "Developer Docs"; //sets the title for the Page
        
        return view('\Modules\Templates\Views\Public\header')
        //.view('\Modules\Templates\Views\Public\public_template')
        .view('\Modules\Home\Views\documentation'); //this view could be a widget
        //.view('\Modules\Templates\Views\Public\footer');
    }
    
    
}//end of class
    