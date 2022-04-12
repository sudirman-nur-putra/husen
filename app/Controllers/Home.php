<?php

namespace App\Controllers;
use App\Models\Home_m;
class Home extends BaseController
{
    public function index()
    {
        return view('ui/index.php');
    }
}
