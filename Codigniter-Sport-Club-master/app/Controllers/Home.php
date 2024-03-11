<?php

namespace App\Controllers;

use App\Models\ReclamationModel;

class Home extends BaseController
{
    public function index()
    {
        /*$data['title']= 'Page Title';
        $data['heading']= 'Welcome to chirags.in';*/
        $data = [];
        $data['main_content'] = 'Pages/welcome';
        echo view('InnerPages/template', $data);
    }

  
}
